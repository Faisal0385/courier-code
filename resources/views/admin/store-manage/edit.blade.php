@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="row mb-3">
        <div class="col-lg-12">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.shop.index') }}">
                <i class="fa fa-arrow-left"></i> Back to Shop List
            </a>
        </div>
    </div>


    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Shop</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Shop</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto"></div>
    </div>
    <!--end breadcrumb-->
    <hr>

    <div class="row justify-content-start">
        <div class="col-lg-6">

            {{-- Success Flash Message --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-semibold">
                    Edit Shop
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.register.store') }}">
                        @csrf

                        <div class="mb-3 row">
                            {{-- Shop Name --}}
                            <div class="col-sm-6">
                                <label for="name" class="col-sm-3 col-form-label">Shop Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Shop Name"
                                    value="{{ $shop->name }}">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Phone --}}
                            <div class="col-sm-6">
                                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone"
                                    value="{{ $shop->phone }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            {{-- Hot Phone --}}
                            <div class="col-sm-6">
                                <label for="hot_phone" class="col-sm-3 col-form-label">Hot Number</label>
                                <input type="text" id="hot_phone" name="hot_phone" class="form-control"
                                    placeholder="Hot Number" value="{{ $shop->hot_phone }}">
                            </div>

                            {{-- Email --}}
                            <div class="col-sm-6">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                    value="{{ $shop->email }}">
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                <textarea id="address" name="address" rows="3" class="form-control" placeholder="Address">{{ $shop->address }}</textarea>
                            </div>
                        </div>

                        <hr>

                        {{-- Submit --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-sm btn-warning px-4">
                                    <i class="bx bx-save"></i> Update
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection
