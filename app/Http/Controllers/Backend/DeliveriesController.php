<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\CourierStore;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveriesController extends Controller
{
    public function all(Request $request)
    {
        $user_id = Auth::user()->id;
        $courierStores = CourierStore::get();
        $counts = 0;

        if (Auth::user()->role == "Admin") {
            $counts = Booking::where('pathao_consignment_ids', '!=', null)->count();

            $bookings = Booking::with([
                'store',
                'merchant',
                'bookingOperator',
                'productType',
                'deliveryType',
                'products.product',
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
                ->whereNotNull('pathao_consignment_ids')
                ->latest()
                ->paginate(8)
                ->withQueryString();

            return view('admin.deliveries.all', compact('bookings', 'courierStores', 'counts'));
        } else {
            $counts = Booking::where('pathao_consignment_ids', '!=', null)->where('merchant_id', '=', $user_id)->count();

            $bookings = Booking::with([
                'store',
                'merchant',
                'bookingOperator',
                'productType',
                'deliveryType',
                'products.product',
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
                ->whereNotNull('pathao_consignment_ids')
                ->latest()
                ->paginate(8)
                ->withQueryString();

            return view('admin.deliveries.all', compact('bookings', 'courierStores', 'counts'));
        }
    }

    public function active(Request $request)
    {
        $user_id = Auth::user()->id;

        $courierStores = CourierStore::get();

        if (Auth::user()->role == "Booking Operator") {
            $user_id = Auth::user()->user_id;
        }

        if (Auth::user()->role == "Admin") {

            $at_sorting = Booking::where('courier_status', '=', "At sorting")->count();
            $in_transit = Booking::where('courier_status', '=', "In transit")->count();
            $at_delivery_hub = Booking::where('courier_status', '=', "On the Way To Delivery Hub")->count();
            $assigned_for_delivery = Booking::where('courier_status', '=', "Assigned for delivery")->count();
            $delivery_on_hold = Booking::where('courier_status', '=', "Delivery on hold")->count();
            $collectable_amount = Booking::where('courier_status', '!=', "Delivered")->sum('amount_to_collect');

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
                ->where('pathao_consignment_ids', '!=', null)
                ->where('courier_status', '!=', "Pickup Cancel")
                ->where('courier_status', '!=', "Assigned for delivery")
                ->where('courier_status', '!=', "Delivered")
                ->where('courier_status', '!=', "Returned")
                ->where('courier_status', '!=', "Paid Return")
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();

            return view('admin.deliveries.active', compact('bookings', 'courierStores', 'at_sorting', 'in_transit', 'at_delivery_hub', 'assigned_for_delivery', 'delivery_on_hold', 'collectable_amount'));
        } else {

            $at_sorting = Booking::where('courier_status', '=', "At sorting")->where('merchant_id', $user_id)->count();
            $in_transit = Booking::where('courier_status', '=', "In transit")->where('merchant_id', $user_id)->count();
            $at_delivery_hub = Booking::where('courier_status', '=', "On the Way To Delivery Hub")->where('merchant_id', $user_id)->count();
            $assigned_for_delivery = Booking::where('courier_status', '=', "Assigned for delivery")->where('merchant_id', $user_id)->count();
            $delivery_on_hold = Booking::where('courier_status', '=', "Delivery on hold")->where('merchant_id', $user_id)->count();
            $collectable_amount = Booking::where('courier_status', '!=', "Delivered")->where('merchant_id', $user_id)->sum('amount_to_collect');

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
                ->where('courier_status', '!=', "Pickup Cancel")
                ->where('courier_status', '!=', "Assigned for delivery")
                ->where('courier_status', '!=', "Delivered")
                ->where('courier_status', '!=', "Returned")
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();


            return view('admin.deliveries.active', compact('bookings', 'courierStores', 'at_sorting', 'in_transit', 'at_delivery_hub', 'assigned_for_delivery', 'delivery_on_hold', 'collectable_amount'));
        }
    }

    public function delivered(Request $request)
    {
        $user_id = Auth::user()->id;
        $courierStores = CourierStore::get();

        if (Auth::user()->role == "Booking Operator") {
            $user_id = Auth::user()->user_id;
        }

        if (Auth::user()->role == "Admin") {

            $delivered = Booking::where('courier_status', '=', "Delivered")->count();
            $partial_delivery = Booking::where('courier_status', '=', "Partial Delivery")->count();
            $exchange = Booking::where('courier_status', '=', "Exchange")->count();
            $collected_amount = Booking::where('courier_status', '=', "Delivered")->sum('amount_to_collect');
            $total = $delivered + $partial_delivery + $exchange;

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
                ->where('pathao_consignment_ids', '!=', null)
                ->where('courier_status', '=', "Delivered")
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();

            return view('admin.deliveries.delivered', compact('bookings', 'courierStores', 'delivered', 'partial_delivery', 'exchange', 'collected_amount', 'total'));
        } else {

            $delivered = Booking::where('courier_status', '=', "Delivered")->where('merchant_id', $user_id)->count();
            $partial_delivery = Booking::where('courier_status', '=', "Partial Delivery")->where('merchant_id', $user_id)->count();
            $exchange = Booking::where('courier_status', '=', "Exchange")->where('merchant_id', $user_id)->count();
            $collected_amount = Booking::where('courier_status', '=', "Delivered")->where('merchant_id', $user_id)->sum('amount_to_collect');
            $total = $delivered + $partial_delivery + $exchange;

            $bookings = Booking::with([
                'store',
                'Merchant',
                'bookingOperator',
                'productType',
                'deliveryType',
                'products.product'   // nested eager loading
            ])
                ->where('merchant_id', $user_id)
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
                ->where('pathao_consignment_ids', '!=', null)
                ->where('courier_status', '=', "Delivered")
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();

            return view('admin.deliveries.delivered', compact('bookings', 'courierStores', 'delivered', 'partial_delivery', 'exchange', 'collected_amount', 'total'));
        }
    }

    public function cancelled(Request $request)
    {
        $user_id = Auth::user()->id;

        if (Auth::user()->role == "Booking Operator") {
            $user_id = Auth::user()->user_id;
        }

        if (Auth::user()->role == "Admin") {

            $pickup_cancel = Booking::where('courier_status', '=', "Pickup Cancel")->count();
            $total = Booking::where('courier_status', '!=', null)->count();

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
                ->where('pathao_consignment_ids', '!=', null)
                ->where('courier_status', '=', "Pickup Cancel")
                ->orWhere('courier_status', '=', "Cancelled")
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();

            $courierStores = CourierStore::get();

            return view('admin.deliveries.cancelled', compact('bookings', 'courierStores', 'pickup_cancel', 'total'));
        } else {
            $pickup_cancel = Booking::where('courier_status', '=', "Pickup Cancel")->where('merchant_id', $user_id)->count();

            $bookings = Booking::with([
                'store',
                'Merchant',
                'bookingOperator',
                'productType',
                'deliveryType',
                'products.product'   // nested eager loading
            ])
                ->where('merchant_id', $user_id)
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
                ->where('pathao_consignment_ids', '!=', null)
                ->where('courier_status', '=', "Pickup Cancel")
                ->orWhere('courier_status', '=', "Cancelled")
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();

            $courierStores = CourierStore::get();

            return view('admin.deliveries.cancelled', compact('bookings', 'courierStores', 'pickup_cancel'));
        }
    }

    public function returned(Request $request)
    {

        $user_id = Auth::user()->id;
        $courierStores = CourierStore::get();

        if (Auth::user()->role == "Booking Operator") {
            $user_id = Auth::user()->user_id;
        }

        if (Auth::user()->role == "Admin") {

            $paid_returned = Booking::where('courier_status', '=', "Paid Return")->count();

            $returned = Booking::where('courier_status', '=', "Returned")->count();
            $total_returned = $paid_returned + $returned;

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
                ->where('pathao_consignment_ids', '!=', null)
                ->where('courier_status', '=', "Returned")
                ->orWhere('courier_status', '=', "Paid Return")
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();

            return view('admin.deliveries.returned', compact('bookings', 'courierStores', 'total_returned', 'paid_returned', 'returned'));
        } else {

            $paid_returned = Booking::where('courier_status', '=', "Paid Return")->where('merchant_id', $user_id)->count();
            $returned = Booking::where('courier_status', '=', "Returned")->where('merchant_id', $user_id)->count();
            $total_returned = $paid_returned + $returned;

            $bookings = Booking::with([
                'store',
                'Merchant',
                'bookingOperator',
                'productType',
                'deliveryType',
                'products.product'   // nested eager loading
            ])
                ->where('merchant_id', $user_id)
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
                ->where('pathao_consignment_ids', '!=', null)
                ->where('courier_status', '=', "Returned")
                ->orWhere('courier_status', '=', "Paid Return")
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();

            return view('admin.deliveries.returned', compact('bookings', 'courierStores', 'delivered', 'total_returned', 'paid_returned', 'returned'));
        }
    }

    public function invoice(Request $request)
    {
        $user_id = Auth::user()->id;

        if (Auth::user()->role == "Booking Operator") {
            $user_id = Auth::user()->user_id;
        }

        if (Auth::user()->role == "Admin") {
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
                    $request->courier_status,
                    fn($q, $v) =>
                    $q->where('courier_status', $v)
                )
                ->where('pathao_consignment_ids', '!=', null)
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();

            $courierStores = CourierStore::get();

            return view('admin.deliveries.invoices', compact('bookings', 'courierStores'));
        } else {
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
                    $request->courier_status,
                    fn($q, $v) =>
                    $q->where('courier_status', $v)
                )
                ->where('pathao_consignment_ids', '!=', null)
                ->where('merchant_id', $user_id)
                ->orderBy('id', 'desc')
                ->paginate(8)
                ->withQueryString();

            $courierStores = CourierStore::get();

            return view('admin.deliveries.invoices', compact('bookings', 'courierStores'));
        }
    }

    public function invoicePdf($orderId)
    {
        $booking = Booking::with([
            'store',
            'Merchant',
            'bookingOperator',
            'productType',
            'deliveryType',
            'products.product'
        ])->where('order_id', $orderId)->first();

        // 3x3 inch = 216 x 216 points (72 points per inch)
        $pdf = Pdf::loadView('admin.deliveries.invoice-pdf', compact('booking'))
            ->setPaper([0, 0, 216, 216], 'portrait');
        return $pdf->stream('Invoice_' . $booking->order_id . '.pdf');
    }

    public function bulk(Request $request)
    {
        // dd($request->orders);
        $orderIds = explode(',', $request->orders);

        $bookings = Booking::with([
            'store',
            'Merchant',
            'bookingOperator',
            'productType',
            'deliveryType',
            'products.product'
        ])
            ->whereIn('order_id', $orderIds)
            ->get();

        $pdf = Pdf::loadView(
            'admin.deliveries.bulk-invoice-pdf',
            compact('bookings')
        )->setPaper([0, 0, 216, 216], 'portrait');

        return $pdf->stream('Bulk_Invoices.pdf');
    }
}
