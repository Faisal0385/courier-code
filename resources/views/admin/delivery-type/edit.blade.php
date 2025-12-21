@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="row mb-3">
        <div class="col-lg-12">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.delivery.type.index') }}">
                <i class="fa fa-arrow-left"></i> Back to Delivery Types List
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

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>⚠️ Error!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-semibold">
                    Edit Delivery Types
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.delivery.type.update', $deliveryType->id) }}">
                        @csrf

                        <div class="mb-3 row">
                            {{-- Delivery Type Name --}}
                            <div class="col-sm-12">
                                <label for="name" class="col-sm-3 col-form-label">Delivery Type Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Delivery Type Name" value="{{ $deliveryType->name }}" required>
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
