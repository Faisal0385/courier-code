<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Service\PathaoService;
use App\Models\Booking;
use App\Models\CourierStore;
use App\Models\Invoice;
use App\Models\SetupCharge;
use Enan\PathaoCourier\Facades\PathaoCourier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AssignCourierController extends Controller
{
    public function index(Request $request)
    {

        $user_id = Auth::user()->id;

        if (Auth::user()->role == "Booking Operator") {
            $user_id = Auth::user()->user_id;
        }

        $courierStores = CourierStore::get();

        if (Auth::user()->role == "Admin") {
            $bookings = Booking::with([
                'store',
                'Merchant',
                'bookingOperator',
                'productType',
                'deliveryType',
                'products.product'   // nested eager loading
            ])
                ->when($request->filled('search'), function ($query) use ($request) {
                    $query->where('bookings.order_id', 'like', '%' . $request->search . '%');
                })
                ->where('pathao_consignment_ids', '=', null)
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();

            return view('admin.courier-services.index', compact('bookings', 'courierStores'));
        } else {
            $bookings = Booking::with([
                'store',
                'Merchant',
                'bookingOperator',
                'productType',
                'deliveryType',
                'products.product'   // nested eager loading
            ])
                ->where('merchant_id', $user_id)
                ->when($request->filled('search'), function ($query) use ($request) {
                    $query->where('bookings.order_id', 'like', '%' . $request->search . '%');
                })
                ->where('pathao_consignment_ids', '=', null)
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();

            return view('admin.courier-services.index', compact('bookings', 'courierStores'));
        }
    }

    public function order(Request $request)
    {
        $courierStore = CourierStore::findOrFail($request->courier);
        $booking = Booking::with([
            'store',
            'Merchant',
            'bookingOperator',
            'productType',
            'deliveryType',
            'products.product' // nested eager loading
        ])->findOrFail($request->booking_id);

        // Prepare bulk order data - create one order per product in the booking
        $bulkOrders = [];

        $weight = 0;
        $item_quantity = 0;

        foreach ($booking->products as $index => $bookingProduct) {
            $weight += $bookingProduct->weight;
            $item_quantity += $bookingProduct->quantity;
        }

        //// Delete this
        $bulkOrders[] = [
            'store_id' => $courierStore->store_id ?? 345173, // Pathao store ID from database
            'merchant_order_id' => $booking->order_id,
            'sender_name' => $booking->merchant->name ?? 'Merchant',
            'sender_phone' => $booking->merchant->phone ?? '01700000000',
            'recipient_name' => $booking->recipient_name,
            'recipient_phone' => $booking->recipient_phone,
            'recipient_address' => $booking->recipient_address,
            // 'recipient_city' => (int) $booking->city_id,
            // 'recipient_zone' => (int) $booking->zone_id,
            // 'recipient_area' => (int) $booking->area_id,
            'delivery_type' => $booking->delivery_type_id ?? 48,
            'item_type' => $booking->product_type_id ?? 2,
            'special_instruction' => $booking->special_instruction ?? null,
            'item_quantity' => (int) $item_quantity,
            'item_weight' => $weight,
            'amount_to_collect' => $booking->amount_to_collect ?? 0,
            'item_description' => $booking->item_description,
        ];

        try {
            $consignmentIds = [];
            $failedOrders = [];

            // Create individual orders for each product
            foreach ($bulkOrders as $index => $orderData) {
                try {
                    // Create order in Pathao using the array data directly
                    $pathaoResponse = (new PathaoService(store: $courierStore))->createOrder($orderData);

                    Log::info("Pathao Order {$index} Creation Response: ", (array) $pathaoResponse);

                    // Check if order creation was successful
                    if ($pathaoResponse->code == 200 && isset($pathaoResponse->data['data']['consignment_id'])) {
                        $consignmentIds[] = $pathaoResponse->data['data']['consignment_id'];
                    } else {
                        $failedOrders[] = $orderData['merchant_order_id'];
                        Log::error("Failed to create order {$orderData['merchant_order_id']}: ", (array) $pathaoResponse);
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
            foreach ($consignmentIds as $key => $consignmentId) {
                # code...

                $data = PathaoCourier::VIEW_ORDER($consignmentId);
                $order = $data['data'];

                $booking->update([
                    'pathao_consignment_ids' => $consignmentId, // Store as JSON array
                    'courier_status' => 'pending',
                    'courier_service' => 'pathao',

                    'order_amount' => $order['order_amount'],
                    'total_fee' => $order['total_fee'],
                    'total_weight' => $order['total_weight'],
                    'billing_status' => $order['billing_status'] ?? 'Unpaid',
                    'discount_amount' => $order['discount'] ?? 0,
                    'cod_fee' => $order['cod_fee'] ?? 0,
                    'delivery_fee' => $order['delivery_fee'] ?? 0,
                ]);
            }

            $successMessage = count($consignmentIds) . ' order(s) created successfully! Consignments: ' . implode(', ', $consignmentIds);

            if (!empty($failedOrders)) {
                $successMessage .= ' | Failed: ' . implode(', ', $failedOrders);
            }

            return back()->with('success', $successMessage);
        } catch (\Exception $e) {
            Log::error('Pathao Order Creation Error: ' . $e->getMessage());
            return back()->with('error', 'Pathao API error: ' . $e->getMessage());
        }
    }

    public function invoice($pathao_consignment_id, $merchant_id, $role)
    {
        $data  = Booking::where('pathao_consignment_ids', '=', $pathao_consignment_id)->first();
        $data2 = PathaoCourier::VIEW_ORDER($pathao_consignment_id);

        $data->update([
            'city_name'       => $data2["data"]["city_name"] ?? null,
            'zone_name'       => $data2["data"]["zone_name"] ?? null,
            'area_name'       => $data2["data"]["area_name"] ?? null,
            'order_status'    => $data2["data"]["order_status"] ?? null,
            'store_name'      => $data2["data"]["store_name"] ?? null,
            'order_amount'    => $data2["data"]["order_amount"] ?? null,
            'order_type'      => $data2["data"]["order_type"] ?? null,
            'item_type'       => $data2["data"]["item_type"] ?? null,
            'item_quantity'   => $data2["data"]["item_quantity"] ?? null,
            'is_incomplete'   => $data2["data"]["is_incomplete"] ?? null,
            'cash_on_delivery' => $data2["data"]["cash_on_delivery"] ?? null,
            'short_link'      => $data2["data"]["short_link"] ?? null,
            'total_weight'    => $data2["data"]["total_weight"] ?? null,
            'total_fee'       => $data2["data"]["total_fee"] ?? null,
            'cod_fee'         => $data2["data"]["cod_fee"] ?? null,
            'delivery_fee'    => $data2["data"]["delivery_fee"] ?? null,
            'billing_status'  => $data2["data"]["billing_status"] ?? null,
        ]);

        $order = $data['data'] ?? null;
        $role  = $role ?? null;
        $setup_change = SetupCharge::first();

        return view('admin.courier-services.invoice', compact('order', 'data', 'setup_change', 'role'));
    }

    public function pod($consignmentId)
    {
        $booking = Booking::where('pathao_consignment_ids', $consignmentId)->first();
        if (!$booking) {
            return back()->with('error', 'Booking not found for Consignment ID: ' . $consignmentId);
        }
        // have to update the user_id based on your application logic
        $pathaoStore = CourierStore::where('user_id', '1')->first();
        if (!$pathaoStore) {
            return back()->with('error', 'Pathao Store not found for User ID: ' . $booking->booking_operator_id);
        }
        $token = $pathaoStore->token;

        $url = "https://merchant.pathao.com/api/v1/orders/{$consignmentId}/pod";

        try {
            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'Authorization' => "Bearer {$token}",
                'Accept' => 'application/pdf',
            ])->timeout(30)->get($url);

            if ($response->successful()) {
                $contentType = $response->header('Content-Type', 'application/pdf') ? 'application/pdf' : $response->header('Content-Type', 'application/octet-stream');
                $filename = "pod_{$consignmentId}.pdf";

                return response($response->body(), 200)
                    ->header('Content-Type', $contentType)
                    ->header('Content-Disposition', "inline; filename=\"{$filename}\"");
            }

            Log::error('POD download failed', [
                'consignment' => $consignmentId,
                'status' => $response->status(),
                'body' => substr($response->body(), 0, 1000),
            ]);

            return back()->with('error', 'Failed to download POD. See logs.');
        } catch (\Exception $e) {
            Log::error('POD Download Error: ' . $e->getMessage(), ['consignment' => $consignmentId]);
            return back()->with('error', 'Error downloading POD: ' . $e->getMessage());
        }
    }
}
