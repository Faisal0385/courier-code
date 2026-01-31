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

        if (Auth::user()->role == "Dispatch Incharge") {
            $user_id = Auth::user()->user_id;
        }

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
            ->where('dispatch_status', '=', 0)
            ->orderBy('id', 'desc')
            ->paginate(8)
            ->withQueryString();


        return view('admin.dispatch-item.index', compact('bookings'));
    }

    public function list(Request $request)
    {
        $user_id = Auth::user()->id;

        if (Auth::user()->role == "Dispatch Incharge") {
            $user_id = Auth::user()->user_id;
        }

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
            ->where('dispatch_status', '=', 1)
            ->orderBy('id', 'desc')
            ->paginate(8)
            ->withQueryString();


        return view('admin.dispatch-item.list', compact('bookings'));
    }

    public function scanItem(Request $request)
    {
        $user_id = Auth::user()->id;

        if (Auth::user()->role == "Dispatch Operator") {
            $user_id = Auth::user()->user_id;
        }

        $bookings = Booking::with([
            'store',
            'Merchant',
            'bookingOperator',
            'productType',
            'deliveryType',
            'products.product' // nested eager loading
        ])
            ->when(
                $request->order_id,
                fn($q, $v) =>
                $q->where('order_id', 'like', "%{$v}%")
            )
            ->where('courier_status', '=', 'pending')
            ->where('dispatch_status', '=', 0)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.dispatch-item.scan-item', compact('bookings'));
    }

    public function scanItemUpdate(Request $request)
    {
        $exists = Booking::where('order_id', $request->order_id)->exists();

        if (!$exists) {
            return redirect()->back()
                ->with('error', 'Order ID not found');
        }

        $updated = Booking::where('order_id', $request->order_id)
            ->where('dispatch_status', 0)
            ->update(['dispatch_status' => 1]);

        $bookings = Booking::where('order_id', $request->order_id)->get();

        return redirect()->back()
            ->with(
                $updated ? 'success' : 'info',
                $updated ? 'Dispatch status updated successfully' : 'Dispatch already updated'
            )
            ->with('bookings', $bookings);
    }
}
