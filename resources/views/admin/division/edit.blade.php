@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="row mb-3">
        <div class="col-lg-12">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.division.index') }}">
                <i class="fa fa-arrow-left"></i> Back to Division List
            </a>
        </div>
    </div>


    <!--breadcrumb-->
    {{-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Division</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Division</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto"></div>
    </div> --}}
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
                    Edit Division
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.division.update', $division->id) }}">
                        @csrf

                        <div class="mb-3 row">
                            {{-- Division Name --}}
                            <div class="col-sm-12">
                                <label for="name" class="col-sm-3 col-form-label">Division Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Division Name"
                                    value="{{ $division->name }}" required>
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
