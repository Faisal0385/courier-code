<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CourierPlatform;
use App\Models\Kyc;
use App\Models\PaymentDetail;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
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

        return view('admin.index', compact('merchants', 'operators', 'stores', 'kyc', 'courierPlatforms', 'merchant_stores', 'merchant_products', 'merchant_booking_operators','merchant_store_admins'));
    }
}
