@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="row mb-3">
        <div class="col-lg-12">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.district.index') }}">
                <i class="fa fa-arrow-left"></i> Back to District List
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
                    Edit District
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.district.update', $district->id) }}">
                        @csrf

                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <label for="division_id" class="col-sm-3 col-form-label">Division Name</label>
                                <select class="form-select form-select-md" name="division_id"
                                    aria-label="Small select example" required>
                                    <option value="">Select Division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}" {{ $division->id == $district->division_id ? "selected" :"" }}>{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            {{-- District Name --}}
                            <div class="col-sm-12">
                                <label for="name" class="col-sm-3 col-form-label">District Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="District Name"
                                    value="{{ $district->name }}" required>
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
