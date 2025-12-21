@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <!--breadcrumb-->
    <!-- ✅ Visible on medium & large screens (hidden on extra-small screens) -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Thana</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:;">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Thana</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('admin.thana.create') }}" class="btn btn-sm btn-dark">
                <i class="fas fa-plus-circle me-1"></i>
                Create Thana
            </a>
        </div>
    </div>

    <!-- ✅ Visible only on small & medium screens (hidden on large and up) -->
    <div class="page-breadcrumb d-flex align-items-center mb-3 d-lg-none">
        <div class="breadcrumb-title pe-3">Manage Thana</div>
        <div class="ms-auto">
            <a href="{{ route('admin.thana.create') }}" class="btn btn-sm btn-dark">
                <i class="fas fa-plus-circle me-1"></i>
                Create Thana
            </a>
        </div>
    </div>


    <!--end breadcrumb-->
    <hr>

    {{-- Admin List Table --}}
    <div class="row justify-content-start">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white fw-semibold">
                    Thana List
                </div>
                <div class="card-body table-responsive">
                    {{-- Search --}}
                    <form method="GET" action="{{ route('admin.thana.index') }}" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search by name"
                                value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                    <br>

                    {{-- Table --}}
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>District</th>
                                <th>Thana</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($thanas as $index => $thana)
                                <tr>
                                    <td>{{ $thanas->firstItem() + $index }}</td>
                                    <td>{{ $thana->district->name ?? null }}</td>
                                    <td>{{ $thana->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.thana.toggle.status', $thana->id) }}"
                                            class="btn btn-sm d-inline-flex align-items-center {{ $thana->status ? 'btn-success' : 'btn-danger' }}"
                                            onclick="return confirm('Are you sure you want to toggle status?')">
                                            <i
                                                class="bx {{ $thana->status ? 'bx-toggle-right' : 'bx-toggle-left' }} me-1"></i>
                                            {{ $thana->status ? 'Active' : 'Inactive' }}
                                        </a>

                                        <a href="{{ route('admin.thana.edit', $thana->id) }}"
                                            class="btn btn-sm d-inline-flex align-items-center btn-warning">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.thana.delete', $thana->id) }}"
                                            class="btn btn-sm btn-danger">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="col-lg-12">
                        <div class="mt-3">
                            {{ $thanas->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
