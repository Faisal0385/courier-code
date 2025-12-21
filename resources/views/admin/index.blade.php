@extends('admin.master-layout')

@section('content')
    @if (empty($kyc->status))
        <div class="row">
            <div class="col">
                <div class="alert alert-warning" role="alert">
                    Pls complete your KYC verification <a class="btn btn-primary btn-sm"
                        href="{{ route('admin.kyc.verification.page') }}">Click Here</a>
                </div>
            </div>
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        @if (Auth::user()->status == 1 && Auth::user()->role == 'Admin')
            <div class="col">
                <a href="{{ route('admin.register.merchant.page') }}">
                    <div class="card radius-10 bg-gradient-deepblue">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white">{{ $merchants ?? 0 }}</h5>
                                <div class="ms-auto">
                                    <i class='bx bx-user fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Total No. Merchant</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('admin.booking.operator.list.page') }}">
                    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white">{{ $operators ?? 0 }}</h5>
                                <div class="ms-auto">
                                    <i class='bx bx-dollar fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Total No. Booking Operator</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('admin.store.list.page') }}">
                    <div class="card radius-10 bg-gradient-deepblue">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white">{{ $stores ?? 0 }}</h5>
                                <div class="ms-auto">
                                    <i class='bx bx-dollar fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Total No. Store</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('admin.courier.list.page') }}">
                    <div class="card radius-10 bg-gradient-deepblue">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white">{{ $courierPlatforms ?? 0 }}</h5>
                                <div class="ms-auto">
                                    <i class='bx bx-dollar fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Total No. Courier</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif


        @if ((Auth::user()->status == 1 && Auth::user()->role == 'Merchant') || Auth::user()->role == 'Merchant Fullfillment')
            <div class="col">
                <a href="{{ route('admin.product.index') }}">
                    <div class="card radius-10 bg-gradient-deepblue">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white">{{ $merchant_products ?? 0 }}</h5>
                                <div class="ms-auto">
                                    <i class='bx bx-user fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Total No. Product</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('admin.store.index') }}">
                    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white">{{ $merchant_stores ?? 0 }}</h5>
                                <div class="ms-auto">
                                    <i class='bx bx-dollar fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Total No. Store</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('admin.store.admin.index') }}">
                    <div class="card radius-10 bg-gradient-deepblue">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white">{{ $merchant_store_admins ?? 0 }}</h5>
                                <div class="ms-auto">
                                    <i class='bx bx-dollar fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Total No. Store Admin</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('admin.booking.operator.page') }}">
                    <div class="card radius-10 bg-gradient-deepblue">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white">{{ $merchant_booking_operators ?? 0 }}</h5>
                                <div class="ms-auto">
                                    <i class='bx bx-dollar fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p class="mb-0">Total No. Booking Operator</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    </div><!--end row-->
@endsection
