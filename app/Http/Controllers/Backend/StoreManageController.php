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

        // Normalize role to lower-case for consistent checking
        $role = $user->role;


        if ($role === 'Admin') {
            $stores = Store::where('merchant_id', '=', $user->user_id)->paginate(8);
        }

        if ($role === 'Merchant') {
            $stores = Store::where('merchant_id', '=', $user->id)->paginate(8);
        }

        if ($role === 'Store Admin') {
            $stores = Store::where('store_admin_id', '=', $user->id)->paginate(8);
        }


        // Determine parent merchant ID
        // $ownerId = ($role === 'Store Admin' || $role === 'Merchant')
        //     ? $user->user_id
        //     : $user->id;

        // // Base query
        // $query = Store::query()->where('status', 1);

        // // Apply role-based filtering
        // switch ($role) {
        //     case 'Merchant':
        //     case 'Admin':
        //         $query->where('merchant_id', $ownerId);
        //         break;

        //     case 'Store Admin':
        //         $query->where('store_admin_id', $user->id);
        //         break;

        //     default:
        //         // Unknown role → return empty results page
        //         return view('admin.store-manage.index', ['stores' => collect([])]);
        // }

        // // Paginate
        // $stores = $query->paginate(8);


        return view('admin.store-manage.index', compact('stores'));
    }
}
