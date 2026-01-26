<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CourierStore;
use App\Models\Kyc;
use App\Models\MerchantCourier;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class MerchantController extends Controller
{
    public function manageMerchant(Request $request)
    {
        $courierStores = CourierStore::get();
        
        $merchants = User::query()
            ->leftJoin('kycs', 'users.id', '=', 'kycs.user_id')
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                $q->where(function ($query) use ($search) {
                    $query->where('users.name', 'like', "%{$search}%")
                        ->orWhere('users.email', 'like', "%{$search}%")
                        ->orWhere('users.phone', 'like', "%{$search}%");
                });
            })
            ->where('users.role', '=', 'Merchant')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.phone',
                'users.status',
                'users.role',
                'users.image',
                'users.nid',
                'users.created_at',
                'kycs.status as kyc_status'
            )
            ->latest('users.id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.admin_register_merchant', compact('merchants','courierStores'));
    } ## End Method

    public function manageMerchantFullfillment(Request $request)
    {
        $merchant_fullfillments = User::query()
            ->leftJoin('kycs', 'users.id', '=', 'kycs.user_id')
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                $q->where(function ($query) use ($search) {
                    $query->where('users.name', 'like', "%{$search}%")
                        ->orWhere('users.email', 'like', "%{$search}%")
                        ->orWhere('users.phone', 'like', "%{$search}%");
                });
            })
            ->where('users.role', '=', 'Merchant Fullfillment')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.phone',
                'users.status',
                'users.role',
                'users.image',
                'users.nid',
                'users.created_at',
                'kycs.status as kyc_status'
            )
            ->latest('users.id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.admin_register_merchant_fullfillments', compact('merchant_fullfillments'));
    } ## End Method

    public function manageMerchantStoreAdmin(Request $request)
    {
        $merchant_fullfillments = User::query()
            ->leftJoin('kycs', 'users.id', '=', 'kycs.user_id')
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                $q->where(function ($query) use ($search) {
                    $query->where('users.name', 'like', "%{$search}%")
                        ->orWhere('users.email', 'like', "%{$search}%")
                        ->orWhere('users.phone', 'like', "%{$search}%");
                });
            })
            ->where('users.role', '=', 'Store Admin')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.phone',
                'users.status',
                'users.role',
                'users.image',
                'users.nid',
                'users.created_at',
                'kycs.status as kyc_status'
            )
            ->latest('users.id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.admin_register_store_admin', compact('merchant_fullfillments'));
    } ## End Method

    public function manageMerchantHubIncharge(Request $request)
    {
        $merchant_fullfillments = User::query()
            ->leftJoin('kycs', 'users.id', '=', 'kycs.user_id')
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                $q->where(function ($query) use ($search) {
                    $query->where('users.name', 'like', "%{$search}%")
                        ->orWhere('users.email', 'like', "%{$search}%")
                        ->orWhere('users.phone', 'like', "%{$search}%");
                });
            })
            ->where('users.role', '=', 'Hub Incharge')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.phone',
                'users.status',
                'users.role',
                'users.image',
                'users.nid',
                'users.created_at',
                'kycs.status as kyc_status'
            )
            ->latest('users.id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.admin_register_hub_incharge', compact('merchant_fullfillments'));
    } ## End Method

    public function manageMerchantStoreIncharge(Request $request)
    {
        $merchant_fullfillments = User::query()
            ->leftJoin('kycs', 'users.id', '=', 'kycs.user_id')
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                $q->where(function ($query) use ($search) {
                    $query->where('users.name', 'like', "%{$search}%")
                        ->orWhere('users.email', 'like', "%{$search}%")
                        ->orWhere('users.phone', 'like', "%{$search}%");
                });
            })
            ->where('users.role', '=', 'Store Incharge')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.phone',
                'users.status',
                'users.role',
                'users.image',
                'users.nid',
                'users.created_at',
                'kycs.status as kyc_status'
            )
            ->latest('users.id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.admin_register_store_incharge', compact('merchant_fullfillments'));
    } ## End Method

    public function manageMerchantDispatchIncharge(Request $request)
    {
        $merchant_fullfillments = User::query()
            ->leftJoin('kycs', 'users.id', '=', 'kycs.user_id')
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                $q->where(function ($query) use ($search) {
                    $query->where('users.name', 'like', "%{$search}%")
                        ->orWhere('users.email', 'like', "%{$search}%")
                        ->orWhere('users.phone', 'like', "%{$search}%");
                });
            })
            ->where('users.role', '=', 'Dispatch Incharge')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.phone',
                'users.status',
                'users.role',
                'users.image',
                'users.nid',
                'users.created_at',
                'kycs.status as kyc_status'
            )
            ->latest('users.id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.admin_register_dispatch_incharge', compact('merchant_fullfillments'));
    } ## End Method


    public function manageMerchantBookingOperator(Request $request)
    {
        $merchant_fullfillments = User::query()
            ->leftJoin('kycs', 'users.id', '=', 'kycs.user_id')
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                $q->where(function ($query) use ($search) {
                    $query->where('users.name', 'like', "%{$search}%")
                        ->orWhere('users.email', 'like', "%{$search}%")
                        ->orWhere('users.phone', 'like', "%{$search}%");
                });
            })
            ->where('users.role', '=', 'Booking Operator')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.phone',
                'users.status',
                'users.role',
                'users.image',
                'users.nid',
                'users.created_at',
                'kycs.status as kyc_status'
            )
            ->latest('users.id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.admin_register_booking_operator', compact('merchant_fullfillments'));
    } ## End Method



    // 
}
