<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Enan\PathaoCourier\Facades\PathaoCourier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignCourierController extends Controller
{
    public function index(Request $request)
    {

        // $da = PathaoCourier::GET_ACCESS_TOKEN_EXPIRY_DAYS_LEFT();
        // $cities = PathaoCourier::GET_CITIES();
        // $stores = PathaoCourier::GET_STORES();

        $merchant_id = Auth::user()->user_id ?? Auth::user()->id;

        $stores = Store::where('merchant_id', '=', $merchant_id)->paginate(8);

        $products = Product::where('user_id', '=', Auth::user()->id)->get();
        return view('admin.courier-services.index', compact('stores'));
    }
}
