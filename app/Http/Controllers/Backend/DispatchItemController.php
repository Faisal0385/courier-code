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

        $courierStores = CourierStore::get();

        $bookings = Booking::with([
            'store',
            'Merchant',
            'bookingOperator',
            'productType',
            'deliveryType',
            'products.product'   // nested eager loading
        ])
            ->when(
                $request->order_id,
                fn($q, $v) =>
                $q->where('order_id', 'like', "%{$v}%")
            )
            ->when(
                $request->consignment_id,
                fn($q, $v) =>
                $q->where('pathao_consignment_ids', 'like', "%{$v}%")
            )
            ->when(
                $request->recipient_name,
                fn($q, $v) =>
                $q->where('recipient_name', 'like', "%{$v}%")
            )
            ->when(
                $request->recipient_phone,
                fn($q, $v) =>
                $q->where('recipient_phone', 'like', "%{$v}%")
            )
            ->when(
                $request->courier_status,
                fn($q, $v) =>
                $q->where('courier_status', $v)
            )
            ->where('merchant_id', $user_id)
            ->where('pathao_consignment_ids', '!=', null)
            ->where('courier_status', '=', "pending")
            ->orderBy('id', 'desc')
            ->paginate(8)
            ->withQueryString();


        return view('admin.dispatch-item.index', compact('bookings', 'courierStores'));
    }
}
