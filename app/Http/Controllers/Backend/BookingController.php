<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Booking;
use App\Models\BookingProduct;
use App\Models\City;
use App\Models\DeliveryType;
use App\Models\Division;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Store;
use App\Models\Zone;
use Enan\PathaoCourier\Facades\PathaoCourier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

ini_set('max_execution_time', 300); // 300 seconds = 5 minutes


class BookingController extends Controller
{
    public function index(Request $request)
    {

        // $get_cities = PathaoCourier::GET_CITIES();
        // $cities = $get_cities["data"]["data"];

        // $get_zones = PathaoCourier::GET_ZONES(10);
        // $zones = $get_zones["data"]["data"];

        // dd($zones);

        // foreach ($cities as $value) {
        //     City::create([
        //         'city_id'   => $value['city_id'],
        //         'city_name' => $value['city_name'],
        //     ]);
        // }

        // foreach ($cities as $value) {
        //     // City::create([
        //     //     'city_id'   => $value['city_id'],
        //     //     'city_name' => $value['city_name'],
        //     // ]);
        //     $get_zones = PathaoCourier::GET_ZONES($value['city_id']);
        //     $zones = $get_zones["data"]["data"] ?? [];

        //     // foreach ($zones as $key => $zone) {
        //     //     # code...
        //     //     // dd($value["city_id"],  $zone["zone_id"], $zone["zone_name"]);
        //     //     Zone::create([
        //     //         'city_id'   => $value['city_id'],
        //     //         'zone_id'   => $zone['zone_id'],
        //     //         'zone_name' => $zone['zone_name'],
        //     //     ]);
        //     // }

        //     foreach ($zones as $key => $zone) {
        //         # code...
        //         // dd($value["city_id"],  $zone["zone_id"], $zone["zone_name"]);
        //         $get_areas = PathaoCourier::GET_AREAS($zone["zone_id"]);
        //         $areas = $get_areas["data"]["data"] ?? [];

        //         foreach ($areas as $key => $area) {
        //             Area::create([
        //                 'zone_id'   => $zone['zone_id'],
        //                 'area_id'   => $area['area_id'],
        //                 'area_name' => $area['area_name'],
        //             ]);
        //         }
        //     }





        //     // dd($zones);
        // }











        $store = Store::where('merchant_id', '=', Auth::user()->id)->where('status', '=', 1)->first();
        $products = Product::where('user_id', '=', Auth::user()->id)->get();

        $get_cities = PathaoCourier::GET_CITIES();
        $cities = $get_cities['data']['data'] ?? [];

        $bookingOrders = Booking::where('merchant_id', '=', Auth::user()->id)->orderBy('id', 'desc')->paginate(8);
        return view('admin.booking.index', compact('store', 'products', 'bookingOrders', 'cities'));
    }

    /**
     * Show the booking creation form.
     */
    public function create()
    {
        $user_id = Auth::user()->id;

        if (Auth::user()->role == "booking-operator") {
            $user_id = Auth::user()->user_id;
        }

        // ✅ Load data for dropdowns
        $stores   = Store::select('id', 'name')->where('merchant_id', '=', $user_id)->orderBy('name')->get();
        $products = Product::select('id', 'name')->where('user_id', '=', $user_id)->orderBy('name')->get();


        $productTypes = ProductType::where('status', '=', 1)->orderBy('name')->get();
        $deliveryTypes = DeliveryType::where('status', '=', 1)->orderBy('name')->get();

        $get_cities = PathaoCourier::GET_CITIES();
        $cities = $get_cities['data']['data'] ?? [];

        // ✅ Pass the data to the view
        return view('admin.booking.create', compact(
            'stores',
            'products',
            'cities',
            'productTypes',
            'deliveryTypes'
        ));
    }

    public function store(Request $request)
    {
        // ------------------------------
        // Step 1: Validate Request
        // ------------------------------
        $validatedData = $request->validate([
            'store_id'                  => 'required|integer',
            'product_type_id'           => 'required|string',
            'delivery_type_id'          => 'required|string',
            'recipient_name'            => 'required|string|max:100',
            'recipient_phone'           => 'required|string|max:20',
            'recipient_secondary_phone' => 'nullable|string|max:20',
            'recipient_address'         => 'required|string|min:10|max:255',
            'city_id'                   => 'required|integer',
            'zone_id'                   => 'required|integer',
            'area_id'                   => 'required|integer',
            'products'                  => 'required',  // product list JSON
        ]);

        // Convert product JSON to PHP array
        $products = json_decode($request->products, true);

        if (!is_array($products) || count($products) === 0) {
            return back()->with('error', 'Please add at least one product.');
        }

        // Create order ID
        $datetime = date('YmdHis');
        $random = $this->base62(6);

        // -------------------------------------
        // Step 2: Use DB Transaction
        // -------------------------------------
        DB::beginTransaction();

        try {

            // ------------------------------
            // Save Booking
            // ------------------------------
            $booking = Booking::create([
                'merchant_id'               => Auth::user()->user_id ?? Auth::user()->id,
                'booking_operator_id'       => (Auth::user()->role == "booking-operator") ? Auth::user()->user_id : Auth::user()->id,
                'order_id'                  => $datetime . strtoupper($random),
                'store_id'                  => $validatedData['store_id'],
                'product_type_id'           => $validatedData['product_type_id'],
                'delivery_type_id'          => $validatedData['delivery_type_id'],
                'recipient_name'            => $validatedData['recipient_name'],
                'recipient_phone'           => $validatedData['recipient_phone'],
                'recipient_secondary_phone' => $validatedData['recipient_secondary_phone'] ?? null,
                'recipient_address'         => $validatedData['recipient_address'],
                'city_id'                   => $validatedData['city_id'],
                'zone_id'                   => $validatedData['zone_id'],
                'area_id'                   => $validatedData['area_id'],
            ]);

            // Get ID
            $booking_id = $booking->id;

            // Step 1: Get all product IDs
            $productIds = collect($products)->pluck('product_id')->toArray();

            // Step 2: Get all product info (weight + stock) in ONE QUERY
            $productData = Product::whereIn('id', $productIds)
                ->get(['id', 'weight', 'stock'])
                ->keyBy('id');

            // Step 3: Prepare bulk insert array
            $bookingProductInsert = [];

            foreach ($products as $item) {
                $pid = $item['product_id'];

                // Get product object
                $product = $productData[$pid];

                // Reduce stock in memory
                $product->stock -= $item['quantity'];

                // Prepare booking product insert
                $bookingProductInsert[] = [
                    'booking_id' => $booking_id,
                    'product_id' => $pid,
                    'quantity'   => $item['quantity'],
                    'weight'     => $product->weight,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Step 4: BULK update stock (only one query)
            foreach ($productData as $product) {
                Product::where('id', $product->id)->update([
                    'stock' => $product->stock
                ]);
            }

            // Step 5: BULK insert booking products (one query)
            BookingProduct::insert($bookingProductInsert);
            
            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();
            return back()->with('error', 'Something went wrong! ');
        }

        // ------------------------------
        // Step 3: Return Success
        // ------------------------------
        return redirect()->back()->with('success', 'Booking created successfully!');
    }


    // public function store(Request $request)
    // {
    //     // ✅ Step 1: Validate the incoming request
    //     $validatedData = $request->validate([
    //         'store_id'                  => 'required|integer',
    //         'product_type_id'           => 'required|string',
    //         'delivery_type_id'          => 'required|string',
    //         'recipient_name'            => 'required|string|max:100',
    //         'recipient_phone'           => 'required|string|max:20',
    //         'recipient_secondary_phone' => 'nullable|string|max:20',
    //         'recipient_address'         => 'required|string|min:10|max:255',
    //         'city_id'                   => 'required|integer',
    //         'zone_id'                   => 'required|integer',
    //         'area_id'                   => 'required|integer',
    //     ]);

    //     // Current date and time: YYYYMMDDHHIISS
    //     $datetime = date('YmdHis');
    //     // Random BASE62 segment
    //     $random = $this->base62(6);

    //     // ✅ Step 2: Create the booking record
    //     $booking = new Booking();
    //     $booking->merchant_id               = Auth::user()->user_id ?? Auth::user()->id;
    //     $booking->booking_operator_id       = (Auth::user()->role == "booking-operator") ? Auth::user()->user_id : Auth::user()->id;
    //     $booking->order_id                  = $datetime . strtoupper($random); // Combine
    //     $booking->store_id                  = $validatedData['store_id'];
    //     $booking->product_type_id           = $validatedData['product_type_id'];
    //     $booking->delivery_type_id          = $validatedData['delivery_type_id'];
    //     $booking->recipient_name            = $validatedData['recipient_name'];
    //     $booking->recipient_phone           = $validatedData['recipient_phone'];
    //     $booking->recipient_secondary_phone = $validatedData['recipient_secondary_phone'] ?? null;
    //     $booking->recipient_address         = $validatedData['recipient_address'];
    //     $booking->city_id                   = $validatedData['city_id'];
    //     $booking->zone_id                   = $validatedData['zone_id'];
    //     $booking->area_id                   = $validatedData['area_id'];
    //     $booking->save();

    //     $booking_id = $booking->save() ? $booking->id : null;

    //     $product_array = json_decode($request->products, true);

    //     foreach ($product_array as $key => $value) {
    //         $bookingProduct = new BookingProduct();
    //         $bookingProduct->booking_id = $booking_id;
    //         $bookingProduct->product_id = $value["product_id"];
    //         $bookingProduct->quantity   = $value["quantity"];
    //         $bookingProduct->save();
    //     }

    //     // ✅ Step 3: Redirect with a success message
    //     return redirect()->back()->with('success', 'Booking created successfully!');
    // }

    public function bookingIndex(Request $request, $orderId)
    {
        // $store = Store::where('merchant_id', '=', Auth::user()->id)->where('status', '=', 1)->first();
        $products       = Product::where('user_id', '=', Auth::user()->id)->get();
        $bookingOrders  = Booking::where('id', '=', $orderId)->paginate(8);
        $bookinProducts = BookingProduct::where('booking_id', '=', $orderId)->get();

        return view('admin.booking.add_product', compact('orderId', 'products', 'bookingOrders', 'bookinProducts'));
    }

    public function addProduct(Request $request)
    {
        $validated = $request->validate([
            'booking_id'        => 'required|exists:bookings,id',
            'product_id'        => 'required|exists:products,id',
            'weight'            => 'nullable|numeric|min:0',
            'quantity'          => 'required|integer|min:1',
            'amount'            => 'required|numeric|min:0',
            'description_price' => 'nullable|string|max:255',
        ]);

        $bookingProduct = BookingProduct::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Product added successfully!',
            'data'    => $bookingProduct
        ]);
    }

    public function destroy($id)
    {
        try {
            $product = BookingProduct::findOrFail($id);
            $product->delete();

            return redirect()->back()->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete product.');
        }
    }

    function base62($length = 6)
    {
        $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $id = '';
        for ($i = 0; $i < $length; $i++) {
            $id .= $chars[random_int(0, strlen($chars) - 1)];
        }
        return $id;
    }
}
