@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <!--breadcrumb-->
    <!-- ✅ Visible on medium & large screens (hidden on extra-small screens) -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Pathao Store</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:;">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Pathao Store</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('admin.pathao.store.create') }}" class="btn btn-sm btn-dark">
                <i class="fas fa-plus-circle me-1"></i>
                Add Pathao Store Order
            </a>
        </div>
    </div>

    <!-- ✅ Visible only on small & medium screens (hidden on large and up) -->
    <div class="page-breadcrumb d-flex align-items-center mb-3 d-lg-none">
        <div class="breadcrumb-title pe-3">Manage Pathao Store</div>
        <div class="ms-auto">
            <a href="{{ route('admin.booking.create.page') }}" class="btn btn-sm btn-dark">
                <i class="fas fa-plus-circle me-1"></i>
                Add Pathao Store Order
            </a>
        </div>
    </div>
    <hr>


    {{-- <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Order Details</h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Order ID</th>
                            <td>{{ $data["data"]['order_id'] }}</td>
                        </tr>
                        <tr>
                            <th>Consignment ID</th>
                            <td>{{ $data["data"]['order_consignment_id'] }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $data["data"]['order_created_at'] }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $data["data"]['order_description'] }}</td>
                        </tr>
                        <tr>
                            <th>Merchant Order ID</th>
                            <td>{{ $data["data"]['merchant_order_id'] }}</td>
                        </tr>

                        <tr>
                            <th>Recipient Name</th>
                            <td>{{ $data["data"]['recipient_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Recipient Address</th>
                            <td>{{ $data["data"]['recipient_address'] }}</td>
                        </tr>
                        <tr>
                            <th>Recipient Phone</th>
                            <td>{{ $data["data"]['recipient_phone'] }}</td>
                        </tr>
                        <tr>
                            <th>Recipient Secondary Phone</th>
                            <td>{{ $data["data"]['recipient_secondary_phone'] ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>City ID</th>
                            <td>{{ $data["data"]['customer_city_id'] }}</td>
                        </tr>
                        <tr>
                            <th>Zone ID</th>
                            <td>{{ $data["data"]['customer_zone_id'] }}</td>
                        </tr>
                        <tr>
                            <th>Area ID</th>
                            <td>{{ $data["data"]['customer_area_id'] }}</td>
                        </tr>

                        <tr>
                            <th>Order Amount</th>
                            <td>{{ $data["data"]['order_amount'] }}</td>
                        </tr>
                        <tr>
                            <th>Total Fee</th>
                            <td>{{ $data["data"]['total_fee'] }}</td>
                        </tr>
                        <tr>
                            <th>City Name</th>
                            <td>{{ $data["data"]['city_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Zone Name</th>
                            <td>{{ $data["data"]['zone_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Area Name</th>
                            <td>{{ $data["data"]['area_name'] }}</td>
                        </tr>

                        <tr>
                            <th>Promo Discount</th>
                            <td>{{ $data["data"]['promo_discount'] }}</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td>{{ $data["data"]['discount'] }}</td>
                        </tr>
                        <tr>
                            <th>COD Fee</th>
                            <td>{{ $data["data"]['cod_fee'] }}</td>
                        </tr>
                        <tr>
                            <th>Additional Charge</th>
                            <td>{{ $data["data"]['additional_charge'] }}</td>
                        </tr>

                        <tr>
                            <th>Compensation Cost</th>
                            <td>{{ $data["data"]['compensation_cost'] }}</td>
                        </tr>
                        <tr>
                            <th>Delivery Type</th>
                            <td>{{ $data["data"]['delivery_type'] }}</td>
                        </tr>
                        <tr>
                            <th>Delivery Fee</th>
                            <td>{{ $data["data"]['delivery_fee'] }}</td>
                        </tr>
                        <tr>
                            <th>Total Weight</th>
                            <td>{{ $data["data"]['total_weight'] }}</td>
                        </tr>

                        <tr>
                            <th>Cash On Delivery</th>
                            <td>{{ $data["data"]['cash_on_delivery'] }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $data["data"]['order_status'] }}</td>
                        </tr>
                        <tr>
                            <th>Status Updated</th>
                            <td>{{ $data["data"]['order_status_updated_at'] }}</td>
                        </tr>

                        <tr>
                            <th>Store Name</th>
                            <td>{{ $data["data"]['store_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Store ID</th>
                            <td>{{ $data["data"]['store_id'] }}</td>
                        </tr>

                        <tr>
                            <th>Order Type</th>
                            <td>{{ $data["data"]['order_type'] }}</td>
                        </tr>
                        <tr>
                            <th>Item Type</th>
                            <td>{{ $data["data"]['item_type'] }}</td>
                        </tr>
                        <tr>
                            <th>Item Quantity</th>
                            <td>{{ $data["data"]['item_quantity'] }}</td>
                        </tr>
                        <tr>
                            <th>Item Description</th>
                            <td>{{ $data["data"]['item_description'] }}</td>
                        </tr>

                        <tr>
                            <th>Color</th>
                            <td>
                                <span
                                    style="background:{{ $data["data"]['color'] }}; padding:6px 20px; display:inline-block; border-radius:4px;"></span>
                                ({{ $data["data"]['color'] }})
                            </td>
                        </tr>

                        <tr>
                            <th>Billing Status</th>
                            <td>{{ $data["data"]['billing_status'] }}</td>
                        </tr>

                        <tr>
                            <th>Incomplete</th>
                            <td>{{ $data["data"]['is_incomplete'] ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th>Recipient Flagged</th>
                            <td>{{ $data["data"]['is_recipient_flagged'] ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th>Point Delivery</th>
                            <td>{{ $data["data"]['is_point_delivery'] ? 'Yes' : 'No' }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}


    {{-- Admin List Table --}}
    <div class="row justify-content-start mt-5">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white fw-semibold">
                    My Pathao Store list
                </div>
                <div class="card-body table-responsive">
                    {{-- Search --}}
                    {{-- <form method="GET" action="{{ route('admin.register.page') }}" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                placeholder="Search by name, email or phone" value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                    <br> --}}

                    {{-- Table --}}
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Store Name</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($stores as $index => $store)
                                <tr>
                                    <td>{{ $store['store_name'] }}</td>
                                    <td>{{ $store['store_address'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
