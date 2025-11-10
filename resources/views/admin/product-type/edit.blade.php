@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="row mb-3">
        <div class="col-lg-12">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.product.type.index') }}">
                <i class="fa fa-arrow-left"></i> Back to Product Types List
            </a>
        </div>
    </div>

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
                    Edit Product Types
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.product.type.update', $productType->id) }}">
                        @csrf

                        <div class="mb-3 row">
                            {{-- Product Type Name --}}
                            <div class="col-sm-12">
                                <label for="name" class="col-sm-3 col-form-label">Product Type Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Product Type Name"
                                    value="{{ $productType->name }}" required>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
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
