<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\CourierPlatform;
use App\Models\Kyc;
use App\Models\PaymentDetail;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $merchants = User::where('role', '=', 'Merchant')->count();
        $operators = User::where('role', '=', 'Booking Operator')->count();
        $stores = Store::count();
        $courierPlatforms = CourierPlatform::count();

        $kyc = Kyc::where('user_id', '=', Auth::user()->id)->first('status');
        $paymentDetail = PaymentDetail::where('user_id', '=', Auth::user()->id)->first('status');

        ## For Merchant

        $merchant_stores = 0;
        if (Auth::user()->role == "Merchant" || Auth::user()->role == "Merchant Fullfillment") {
            $merchant_stores = Store::where('merchant_id', '=', Auth::user()->id)->count();
        };

        $merchant_products = 0;
        if (Auth::user()->role == "Merchant" || Auth::user()->role == "Merchant Fullfillment") {
            $merchant_products = Product::where('user_id', '=', Auth::user()->id)->count();
        };

        $merchant_store_admins = 0;
        if (Auth::user()->role == "Merchant" || Auth::user()->role == "Merchant Fullfillment") {
            $merchant_store_admins = User::where('role', '=', "Store Admin")->where('user_id', '=', Auth::user()->id)->count();
        };

        $merchant_booking_operators = 0;
        if (Auth::user()->role == "Merchant" || Auth::user()->role == "Merchant Fullfillment") {
            $merchant_booking_operators = User::where('role', '=', "Booking Operator")->where('user_id', '=', Auth::user()->id)->count();
        };


        $user_id = Auth::user()->id;
        $counts = 0;

        if (Auth::user()->role == "Admin") {
            $counts = Booking::where('pathao_consignment_ids', '!=', null)->count();
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
                ->where('pathao_consignment_ids', '!=', null)
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();

            // $courierStores = CourierStore::get();

            // return view('admin.deliveries.all', compact('bookings', 'courierStores', 'counts'));
        } else {
            $counts = Booking::where('pathao_consignment_ids', '!=', null)->where('merchant_id', '=', $user_id)->count();
            $bookings = Booking::with([
                'store',
                'Merchant',
                'bookingOperator',
                'productType',
                'deliveryType',
                'products.product'   // nested eager loading
            ])
                ->where('merchant_id', $user_id)
                ->where('pathao_consignment_ids', '!=', null)
                ->when($request->filled('search'), function ($query) use ($request) {
                    $query->where('bookings.order_id', 'like', '%' . $request->search . '%');
                })
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();

            // $courierStores = CourierStore::get();

            // return view('admin.deliveries.all', compact('bookings', 'courierStores', 'counts'));
        }

        return view('admin.index', compact('merchants', 'bookings', 'counts', 'operators', 'stores', 'kyc', 'courierPlatforms', 'merchant_stores', 'merchant_products', 'merchant_booking_operators', 'merchant_store_admins'));
    }
}
