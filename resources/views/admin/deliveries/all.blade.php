@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Deliveries</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Deliveries</li>
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
            <div class="card shadow-sm">
                <div class="card-header bg-dark">
                    <h6 class="text-white fw-semibold m-0">Deliveries List || {{ $counts }} orders</h6>
                </div>
                <div class="card-body">
                    {{-- Search --}}
                    <form method="GET" action="{{ route('admin.all.page') }}" class="mb-4">
                        <div class="row g-2 align-items-end">

                            <!-- Order ID -->
                            <div class="col-md-2">
                                <label class="form-label">Order ID</label>
                                <input type="text" name="order_id" class="form-control" placeholder="Order ID"
                                    value="{{ request('order_id') }}">
                            </div>

                            <!-- Consignment ID -->
                            <div class="col-md-2">
                                <label class="form-label">Consignment ID</label>
                                <input type="text" name="consignment_id" class="form-control" placeholder="Consignment ID"
                                    value="{{ request('consignment_id') }}">
                            </div>

                            <!-- Recipient Name -->
                            <div class="col-md-2">
                                <label class="form-label">Recipient Name</label>
                                <input type="text" name="recipient_name" class="form-control" placeholder="Recipient"
                                    value="{{ request('recipient_name') }}">
                            </div>

                            <!-- Recipient Phone -->
                            <div class="col-md-2">
                                <label class="form-label">Recipient Phone</label>
                                <input type="text" name="recipient_phone" class="form-control" placeholder="Phone"
                                    value="{{ request('recipient_phone') }}">
                            </div>

                            <!-- Courier Status -->
                            <div class="col-md-2">
                                <label class="form-label">Courier Status</label>
                                <select name="courier_status" class="form-select">
                                    <option value="">All</option>
                                    <option value="pending" {{ request('courier_status') == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="picked" {{ request('courier_status') == 'picked' ? 'selected' : '' }}>
                                        Picked</option>
                                    <option value="in_transit"
                                        {{ request('courier_status') == 'in_transit' ? 'selected' : '' }}>In Transit
                                    </option>
                                    <option value="delivered"
                                        {{ request('courier_status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="Pickup Cancel"
                                        {{ request('courier_status') == 'Pickup Cancel' ? 'selected' : '' }}>Pickup Cancel
                                    </option>
                                </select>
                            </div>

                            <!-- Buttons -->
                            <div class="col-md-2 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Filter
                                </button>
                                <a href="{{ route('admin.all.page') }}" class="btn btn-outline-secondary mt-1">
                                    Reset
                                </a>
                            </div>

                        </div>
                    </form>
                    <br>

                    {{-- Table --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Consignment ID</th>
                                    <th>Store Name</th>
                                    <th>Recipient Info</th>
                                    {{-- <th>Booking Operator</th> --}}
                                    {{-- <th class="text-center">Booking</th> --}}
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Payment</th>
                                    <th>Courier</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $key => $booking)
                                    {{-- @dd($booking) --}}
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $booking->order_id }}</td>
                                        <td>
                                            {{ $booking->pathao_consignment_ids }}
                                        </td>
                                        <td>{{ strtoupper($booking->store->name) }}</td>
                                        <td>
                                            {{ $booking->recipient_name }} <br>
                                            {{ $booking->recipient_phone }} <br>
                                            {{ $booking->recipient_address }} <br>
                                        </td>
                                        <td>
                                            {{-- @php
                                                $invoice_data = App\Models\Invoice::where('order_consignment_id', '=', $booking->pathao_consignment_ids)->first(["order_amount", "total_fee", "discount", "cod_fee", "billing_status"]);
                                            @endphp --}}

                                            Order Amount : ৳ {{ $booking->order_amount ?? 'N/A' }} <br>
                                            Total Fee : ৳ {{ $booking->total_fee ?? 'N/A' }} <br>
                                            Discount : ৳ {{ $booking->discount_amount ?? 'N/A' }} <br>
                                            COD : ৳ {{ $booking->cod_fee ?? 'N/A' }} <br>

                                        </td>

                                        <td>{{ $booking->billing_status ?? 'N/A' }} </td>

                                        <td>
                                            {{ strtoupper($booking->courier_service ?? null) }}
                                        </td>

                                        <td>
                                            @if (!empty($booking->pathao_consignment_ids))
                                                <div class="bg-danger p-2 rounded text-white" role="alert">
                                                    {{ $booking->courier_status ?? null }}
                                                </div>
                                            @else
                                                <p>Assign Courier Pending</p>
                                            @endif
                                        </td>
                                        {{-- <td>
                                            @if (!empty($booking->pathao_consignment_ids))
                                            <a class="btn btn-sm btn-warning d-flex align-item-center"
                                                href="{{ route('admin.assign.courier.services.invoice.page', $booking->pathao_consignment_ids) }}">Invoice</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if (!empty($booking->pathao_consignment_ids))
                                            <a class="btn btn-sm btn-success d-flex align-item-center"
                                                href="{{ route('admin.assign.courier.services.pod.page', $booking->pathao_consignment_ids) }}">POD</a>
                                            @endif
                                        </td> --}}
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination --}}
                    <div class="col-lg-12">
                        <div class="mt-3">
                            {{ $bookings->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
