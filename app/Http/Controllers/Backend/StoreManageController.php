<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreManageController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $role = $user->role;

        if ($role === 'Admin') {
            $stores = Store::where('merchant_id', '=', $user->id)->paginate(8);
        }

        if ($role === 'Merchant') {
            $stores = Store::where('merchant_id', '=', $user->id)->paginate(8);
        }

        if ($role === 'Store Admin') {
            $stores = Store::where('store_admin_id', '=', $user->id)->paginate(8);
        }

        return view('admin.store-manage.index', compact('stores'));
    }
}
