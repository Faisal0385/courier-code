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
