<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductManageController extends Controller
{
    public function index(Request $request, $id)
    {
        $stores = Store::where('store_admin_id', '=', Auth::user()->id)->paginate(8);
        return view('admin.product-manage.index', compact('stores'));
    } ## End Mehtod

    public function add(Request $request, $id)
    {
        $stores = Store::where('store_admin_id', '=', Auth::user()->id)->paginate(8);
        return view('admin.product-manage.add', compact('stores'));
    } ## End Mehtod
}
