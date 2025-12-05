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
        $role = strtolower($user->role);

        // Determine parent merchant ID
        $ownerId = ($role === 'store admin')
            ? $user->user_id
            : $user->id;

        // Base query
        $query = Store::query()->where('status', 1);

        // Apply role-based filtering
        switch ($role) {
            case 'merchant':
            case 'admin':
                $query->where('merchant_id', $ownerId);
                break;

            case 'store admin':
                $query->where('store_admin_id', $user->id);
                break;

            default:
                // Unknown role → return empty results page
                return view('admin.store-manage.index', ['stores' => collect([])]);
        }

        // Paginate
        $stores = $query->paginate(8);

        return view('admin.store-manage.index', compact('stores'));
    }
}
