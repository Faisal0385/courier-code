<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreManageController extends Controller
{
    public function index(Request $request)
    {
        $stores = Store::where('store_admin_id', '=', Auth::user()->id)->paginate();

        $products = Product::where('user_id', '=', Auth::user()->id)->get();
        return view('admin.store-manage.index', compact('stores'));
    } ## End Mehtod
}
