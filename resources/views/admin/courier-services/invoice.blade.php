@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">My Store Lists</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Store List</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto"></div>
    </div>
    <!--end breadcrumb-->
    <hr>

    {{-- Admin List Table --}}
    <div class="row justify-content-start">
        <div class="col-lg-12">
            <div class="container py-4">

                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Invoice - {{ $data['order_id'] }}</h5>
                        {{-- <button onclick="window.print()" class="btn btn-primary btn-sm">Print</button> --}}
                    </div>

                    <div class="card-body">

                        {{-- Store Info --}}
                        <h6 class="fw-bold mb-2">{{ $data['store_name'] }}</h6>
                        <p class="mb-4">Store ID: {{ $data['store_id'] }}</p>

                        <div class="row">
                            {{-- Recipient Info --}}
                            <div class="col-md-6">
                                <h5 class="fw-bold mb-3">Recipient Information</h5>
                                <p><strong>Name:</strong> {{ $data['recipient_name'] }}</p>
                                <p><strong>Phone:</strong> {{ $data['recipient_phone'] }}</p>
                                <p><strong>Address:</strong> {{ $data['recipient_address'] }}</p>
                                <p><strong>City:</strong> {{ $data['city_name'] }}</p>
                                <p><strong>Zone:</strong> {{ $data['zone_name'] }}</p>
                            </div>

                            {{-- Order Info --}}
                            <div class="col-md-6">
                                <h5 class="fw-bold mb-3">Order Details</h5>
                                <p><strong>Order ID:</strong> {{ $data['order_id'] }}</p>
                                <p><strong>Merchant Order ID:</strong> {{ $data['merchant_order_id'] }}</p>
                                <p><strong>Created At:</strong> {{ $data['order_created_at'] }}</p>
                                <p><strong>Status:</strong> {{ $data['order_status'] }}</p>
                                <p><strong>Delivery Type:</strong> {{ $data['order_type'] }}</p>
                            </div>
                        </div>

                        <hr>

                        {{-- Item Info --}}
                        <h5 class="fw-bold mb-3">Item Information</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Weight</th>
                                    <th>Item Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Item</td>
                                    <td>{{ $data['item_quantity'] }}</td>
                                    <td>{{ $data['total_weight'] }} kg</td>
                                    <td>{{ $data['item_type'] }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>

                        {{-- Fees + Payment --}}
                        <h5 class="fw-bold mb-3">Payment Summary</h5>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Customer Order Amount</td>
                                    <td class="text-end">{{ $data['order_amount'] }} Tk</td>
                                </tr>
                                <tr>
                                    <td>Courier Delivery Fee</td>
                                    <td class="text-end">{{ $data['total_fee'] ?? null }} Tk</td>
                                </tr>
                                <tr>
                                    <td>Courier COD Fee</td>
                                    <td class="text-end">{{ $data['cod_fee'] ?? null }} Tk</td>
                                </tr>

                                {{-- @if ($role === 'Merchant Fullfillment') --}}
                                <tr>
                                    <td>Full Fillment Fee</td>
                                    <td class="text-end">{{ $setup_change['fulfilment_fee'] ?? 0 }} Tk</td>
                                </tr>
                                {{-- @endif --}}

                                <tr>
                                    <td>Our Delivery Fee</td>
                                    <td class="text-end">{{ $setup_change['delivery_charges'] ?? null }} Tk</td>
                                </tr>
                                <tr>
                                    <td>Our COD Fee</td>
                                    <td class="text-end">{{ $setup_change['cod_fee'] ?? null }} Tk</td>
                                </tr>
                                {{-- <tr>
                                    <td>Promo Discount</td>
                                    <td class="text-end">- {{ $data['promo_discount'] }} Tk</td>
                                </tr> --}}
                                <tr>
                                    <td><strong>Total Fee</strong></td>

                                    @php

                                        $fulfilment_fee =
                                            $role === 'Merchant Fullfillment'
                                            ? $setup_change['fulfilment_fee'] ?? 0
                                            : 0;

                                        $total_amount =
                                            $fulfilment_fee +
                                            ($setup_change['delivery_charges'] ?? 0) +
                                            ($setup_change['cod_fee'] ?? 0) +
                                            $data['order_amount'];
                                    @endphp


                                    <td class="text-end"><strong>{{ $total_amount }} Tk</strong></td>
                                </tr>
                                <tr>
                                    <td>Billing Status</td>
                                    <td class="text-end">{{ $data['billing_status'] }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>

                        <p><strong>Cash on Delivery:</strong> {{ $data['cash_on_delivery'] }}</p>

                        <p class="text-muted mt-4">* This is a system-generated invoice.</p>

                    </div>
                </div>


            </div>
        </div>


@endsection