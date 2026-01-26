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

            <!-- HEADER -->
            <div class="card mb-4">
                <div class="card-body d-flex justify-content-between align-items-start flex-wrap">
                    <div>
                        <div class="mb-2">
                            <span class="badge bg-danger">{{ ucwords($data['order_status']) }}</span>
                            <span class="badge bg-primary">{{ $data['billing_status'] }}</span>
                            {{-- <span class="badge bg-warning text-dark">Incomplete</span> --}}
                        </div>

                        <h6 class="mb-1">
                            Consignment ID <strong>#{{ $data['pathao_consignment_ids'] }}</strong>
                            <i class="bi bi-clipboard ms-1"></i>
                        </h6>

                        <small class="text-muted">
                            {{ $data['store_name'] }} [ Order ID - {{ $data['order_id'] }} ]
                        </small>
                    </div>

                    <div class="mt-2 mt-md-0">
                        {{-- <button class="btn btn-outline-danger btn-sm me-2">Report Issue</button>
                        <button class="btn btn-outline-danger btn-sm">Send Notes</button> --}}
                    </div>
                </div>
            </div>

            <div class="row g-4">

                <!-- LEFT COLUMN -->
                <div class="col-lg-8">

                    <!-- RECIPIENT DETAILS -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <strong>Recipient Details</strong>
                            {{-- <a href="#" class="text-danger text-decoration-none">
                                <i class="bi bi-flag-fill"></i> Report Customer
                            </a> --}}
                        </div>

                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <small class="text-muted">Name</small>
                                    <p class="mb-0">{{ $data['recipient_name'] }} </p>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted">Phone</small>
                                    <p class="mb-0">{{ $data['recipient_phone'] }} </p>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted">Secondary Phone</small>
                                    <p class="mb-0">{{ $data['recipient_secondary_phone'] }} </p>
                                </div>

                                <div class="col-md-4">
                                    <small class="text-muted">City</small>
                                    <p class="mb-0">{{ $data['city_name'] }}</p>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted">Zone</small>
                                    <p class="mb-0">{{ $data['zone_name'] }}</p>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted">Area</small>
                                    <p class="mb-0">{{ $data['area_name'] }}</p>
                                </div>

                                <div class="col-md-8">
                                    <small class="text-muted">Address</small>
                                    <p class="mb-0">{{ $data['recipient_address'] }}</p>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted">Amount to Collect</small>
                                    <p class="fw-bold mb-0">৳ {{ $data['amount_to_collect'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIMELINE -->
                    {{-- <div class="card">
                        <div class="card-header">
                            <strong>Timeline</strong>
                        </div>

                        <div class="card-body">
                            <div class="d-flex justify-content-between text-center position-relative">
                                <div class="timeline-step active">
                                    <i class="bi bi-box-seam"></i>
                                    <p>Accepted</p>
                                </div>
                                <div class="timeline-step">
                                    <i class="bi bi-cart-check"></i>
                                    <p>Picked</p>
                                </div>
                                <div class="timeline-step">
                                    <i class="bi bi-truck"></i>
                                    <p>In Transit</p>
                                </div>
                                <div class="timeline-step">
                                    <i class="bi bi-bicycle"></i>
                                    <p>Out for Delivery</p>
                                </div>
                                <div class="timeline-step">
                                    <i class="bi bi-hand-thumbs-up"></i>
                                    <p>Delivered</p>
                                </div>
                            </div>

                            <hr>

                            <div class="mt-3">
                                <span class="text-success fw-bold">●</span>
                                New order pickup requested
                                <br>
                                <small class="text-muted">Jan 8, 2026 3:55 PM</small>
                            </div>
                        </div>
                    </div> --}}

                    <!-- DELIVERY INFO -->
                    <div class="card">
                        <div class="card-header">
                            <strong>Delivery Info</strong>
                            <span class="badge bg-secondary ms-2"> COD</span>
                        </div>

                        <div class="card-body">
                            <p><strong>Product Type:</strong> {{ $data['item_type'] }}</p>
                            <p><strong>Weight:</strong> {{ $data['total_weight'] }} kg</p>
                            <p><strong>Delivery Type:</strong>
                                {{ $data['delivery_type_id'] == 48 ? 'Normal Delivery' : 'Demand Delivery' }}</p>
                            <p><strong>Amount to Collect:</strong> ৳ {{ $data['amount_to_collect'] }}</p>
                            <p><strong>Description:</strong> {{ $data['item_description'] }}</p>
                            {{-- <p><strong>Special Instruction:</strong> -</p>
                            <p><strong>Modification Notes:</strong> -</p> --}}
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-4">

                    <!-- COST -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <strong>Cost of Delivery</strong>
                            <span class="badge bg-primary">{{ $data['billing_status'] }}</span>
                        </div>

                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    Amount to Collect: <span>৳ {{ $data['amount_to_collect'] }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    Merchant Fullfilment Amount: <span>৳ {{ $setup_change['fulfilment_fee'] ?? 0 }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    Delivery Fee: <span>৳ {{ $data['delivery_fee'] }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    COD Fee: <span>৳ {{ $data['cod_fee'] }}</span>
                                </li>
                            </ul>

                            <hr>
                            


                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    @php
                                        $our_cod_price =
                                            $data['cod_fee'] + ($data['cod_fee'] * $setup_change['cod_fee']) / 100;

                                        $merchant_fullfilment_amount =
                                            $data['order_amount'] +
                                            $setup_change['fulfilment_fee'] +
                                            $setup_change['delivery_charges'] +
                                            $our_cod_price;
                                    @endphp

                                    <strong>Merchant Fullfilment Amount:</strong> <span>৳
                                        {{ $merchant_fullfilment_amount }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    @php
                                        $our_cod_price =
                                            $data['cod_fee'] + ($data['cod_fee'] * $setup_change['cod_fee']) / 100;

                                        $merchant_amount =
                                            $data['order_amount'] + $setup_change['delivery_charges'] + $our_cod_price;

                                    @endphp

                                    <strong>Merchant Amount:</strong> <span>৳ {{ $merchant_amount }}</span>
                                </li>
                            </ul>


                            <div class="d-flex justify-content-between fw-bold fs-5">
                                <span>Total Cost</span>
                                <span>৳ {{ $data['total_fee'] }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
