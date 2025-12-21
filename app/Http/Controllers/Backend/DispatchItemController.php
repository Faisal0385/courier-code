<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\CourierStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DispatchItemController extends Controller
{
    public function index(Request $request)
    {

        $user_id = Auth::user()->id;

        if (Auth::user()->role == "Booking Operator") {
            $user_id = Auth::user()->user_id;
        }

        // if (Auth::user()->role == "Admin") {
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
            ->where('courier_service','!=', null)
            ->orderBy('id', 'desc')
            ->paginate(8)
            ->withQueryString();

        $courierStores = CourierStore::get();

        return view('admin.dispatch-item.index', compact('bookings', 'courierStores'));
        // } else {
        //     $bookings = Booking::with([
        //         'store',
        //         'Merchant',
        //         'bookingOperator',
        //         'productType',
        //         'deliveryType',
        //         'products.product'   // nested eager loading
        //     ])
        //         ->where('merchant_id', $user_id)
        //         ->when($request->filled('search'), function ($query) use ($request) {
        //             $query->where('bookings.order_id', 'like', '%' . $request->search . '%');
        //         })
        //         ->orderBy('id', 'desc')
        //         ->paginate(8)
        //         ->withQueryString();

        //     $courierStores = CourierStore::get();

        //     return view('admin.courier-services.index', compact('bookings', 'courierStores'));
        // }
    }
}
