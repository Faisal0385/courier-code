<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Zone;
use Enan\PathaoCourier\Facades\PathaoCourier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BulkUploadController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.bulk-upload.index', compact('categories'));
    }


    public function store(Request $request)
    {

        // Validate file
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();

        // Read all lines
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (!$lines) {
            return back()->with('error', 'File is empty or unreadable.');
        }

        // First line = header row
        $headers = explode(',', $lines[0]);

        // Remaining lines = data rows
        $data = [];
        foreach (array_slice($lines, 1) as $line) {
            $data[] = explode(',', $line);
        }


        // dd($data);


        // Prepare bulk order data - create one order per product in the booking
        $bulkOrders = [];


        foreach ($data as $index => $item) {

            // Safely extract values with trimming
            $senderName     = trim($item[0] ?? 'Merchant');
            $senderPhone    = isset($item[1]) ? "0" . trim($item[1]) : '01700000000';
            $recipientName  = trim($item[2] ?? '');
            $recipientPhone = "0" . trim($item[3] ?? '');
            $recipientAddr  = trim($item[4] ?? '');
            $zoneName       = trim($item[6] ?? '');
            $cityName       = trim($item[5] ?? '');
            $itemQty        = intval($item[7] ?? 1);
            $itemWeight     = floatval($item[8] ?? 0);
            $collectAmount  = floatval($item[9] ?? 0);
            $description    = trim($item[10] ?? null);

            // Get city
            $city = City::where('city_name', $cityName)->first();

            if (!$city) {
                // Prevent error on missing city
                throw new Exception("City not found: $cityName (Row: $index)");
            }

            // Get zone
            $zone = Zone::where('city_id', $city->city_id)
                ->where('zone_name', $zoneName)
                ->first();

            // dd($zone);

            if (!$zone) {
                throw new Exception("Zone '$zoneName' not found in city '$cityName' (Row: $index)");
            }

            // Build bulk order array
            $bulkOrders[] = [
                'store_id'            => 345173, // Pathao store ID from database
                'merchant_order_id'   => uniqid("ORD_"), // Unique ID
                'sender_name'         => $senderName,
                'sender_phone'        => $senderPhone,
                'recipient_name'      => $recipientName,
                'recipient_phone'     => $recipientPhone,
                'recipient_address'   => $recipientAddr,
                'recipient_city'      => $city->city_id,
                'recipient_zone'      => $zone->zone_id,
                'recipient_area'      => null,
                'delivery_type'       => 48,
                'item_type'           => 2,
                'special_instruction' => $description,
                'item_quantity'       => $itemQty,
                'item_weight'         => $itemWeight,
                'amount_to_collect'   => $collectAmount,
                'item_description'    => $description,
            ];
        }




        // dd($bulkOrders);



        // foreach ($data as $index => $item) {

        //     $city       = City::where('city_name', '=', $item[6])->first();
        //     $zone_name  = trim($item[5]);
        //     $zone_names = Zone::where('city_id', '=', $city["city_id"])->where('zone_name', '=', $zone_name)->first();

        //     // dd(trim($item[5]));


        //     //// Delete this
        //     $bulkOrders[] = [
        //         'store_id'            => 345173, // Pathao store ID from database
        //         'merchant_order_id'   => "12312312",
        //         'sender_name'         => $item[0] ?? 'Merchant',
        //         'sender_phone'        => "0" . $item[1] ?? '01700000000',
        //         'recipient_name'      => $item[2],
        //         'recipient_phone'     => "0" . $item[3],
        //         'recipient_address'   => $item[4],
        //         'recipient_city'      => 2,
        //         'recipient_zone'      => 78,
        //         'recipient_area'      => null,
        //         'delivery_type'       => 48,
        //         'item_type'           => 2,
        //         'special_instruction' => $item[10] ?? null,
        //         'item_quantity'       => $item[7],
        //         'item_weight'         => $item[8],
        //         'amount_to_collect'   => $item[9] ?? 0,
        //         'item_description'    => $item[10],
        //     ];
        // }




        try {
            $consignmentIds = [];
            $failedOrders = [];

            // Create individual orders for each product
            foreach ($bulkOrders as $index => $orderData) {
                try {
                    // Create PathaoOrderRequest for each order
                    $pathaoOrderRequest = new \Enan\PathaoCourier\Requests\PathaoOrderRequest();
                    $pathaoOrderRequest->merge($orderData);

                    // Create order in Pathao
                    $pathaoResponse = PathaoCourier::CREATE_ORDER($pathaoOrderRequest);

                    Log::info("Pathao Order {$index} Creation Response: ", $pathaoResponse);

                    // Check if order creation was successful
                    if (isset($pathaoResponse['data']['data']['consignment_id'])) {
                        $consignmentIds[] = $pathaoResponse['data']['data']['consignment_id'];
                    } else {
                        $failedOrders[] = $orderData['merchant_order_id'];
                        Log::error("Failed to create order {$orderData['merchant_order_id']}: ", $pathaoResponse);
                    }
                } catch (\Exception $e) {
                    $failedOrders[] = $orderData['merchant_order_id'];
                    Log::error("Exception creating order {$orderData['merchant_order_id']}: " . $e->getMessage());
                }
            }

            // If all orders failed
            if (empty($consignmentIds)) {
                return back()->with('error', 'Failed to create any orders in Pathao. Please check logs.');
            }

            // Update booking record with Pathao consignment details
            // $booking->update([
            //     'pathao_consignment_ids' => json_encode($consignmentIds), // Store as JSON array
            //     'courier_status'         => 'pending',
            //     'courier_service'        => 'pathao',
            // ]);

            $successMessage = count($consignmentIds) . ' order(s) created successfully! Consignments: ' . implode(', ', $consignmentIds);

            if (!empty($failedOrders)) {
                $successMessage .= ' | Failed: ' . implode(', ', $failedOrders);
            }

            return back()->with('success', $successMessage);
        } catch (\Exception $e) {
            Log::error('Pathao Order Creation Error: ' . $e->getMessage());
            return back()->with('error', 'Pathao API error: ' . $e->getMessage());
        }














        // return view('admin.bulk.preview', [
        //     'headers' => $headers,
        //     'data'    => $data,
        // ]);
    }
}
