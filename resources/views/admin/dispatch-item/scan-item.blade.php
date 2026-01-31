@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Scan Dispatch Items</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Scan Dispatch Item</li>
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
                <div class="card-header bg-dark text-white fw-semibold">
                    Scan Dispatch Item
                </div>
                <div class="card-body">
                    {{-- Search --}}
                    <form method="get" action="{{ route('admin.scan.dispatch.item.status') }}" class="mb-4">
                        <div class="row g-2 align-items-end">
                            <!-- Order ID -->
                            <div class="col-md-4">
                                <label class="form-label">Scan ID</label>
                                <input type="text" name="order_id" class="form-control" placeholder="Scan ID"
                                    value="{{ request('order_id') }}">
                            </div>

                            <!-- Buttons -->
                            <div class="col-md-2 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
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
                                    <th>Courier</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $key => $booking)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $booking->order_id }}</td>
                                        <td>
                                            {{ $booking->pathao_consignment_ids }}
                                        </td>
                                        <td>{{ strtoupper($booking->store->name) }}</td>
                                        <td>
                                            {{ strtoupper($booking->courier_service) }}
                                        </td>
                                        <td>
                                            @if ($booking->dispatch_status == 0)
                                                <span class="badge bg-danger p-2">Pending</span>
                                            @else
                                                <span class="badge bg-success p-2">Dispatched</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
