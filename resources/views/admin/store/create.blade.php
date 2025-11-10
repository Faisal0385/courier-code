@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.store.index', $id) }}">
                    <i class="fa fa-arrow-left"></i> Back to Store List
                </a>
            </div>
        </div>
        <hr>

        <div class="row justify-content-start">
            <div class="col-lg-8">

                {{-- Success Flash Message --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>✅ Success!</strong> {{ session('success') }}
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
                        Create Store
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.store.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                {{-- Store Name --}}
                                <div class="col-sm-6">
                                    <label for="name" class="col-form-label">Store Name</label>
                                    <input type="hidden" value="{{ $id }}" name="merchant_id">
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Shop Name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Phone --}}
                                <div class="col-sm-6">
                                    <label for="phone" class="col-form-label">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        placeholder="Phone" value="{{ old('phone') }}">
                                </div>

                            </div>

                            <div class="mb-3 row">
                                {{-- Email --}}
                                <div class="col-sm-12">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <label for="address" class="col-form-label">Address</label>
                                    <textarea id="address" name="address" rows="3" class="form-control" placeholder="Address">{{ old('address') }}</textarea>
                                </div>
                            </div>

                            <!-- Shop Logo -->
                            <div class="mb-3 row">
                                <label for="image" class="form-label">Shop Logo</label>
                                <div class="col-sm-12">
                                    <input type="file" name="image" id="image" class="form-control form-control-sm"
                                        accept="image/png, image/jpg, image/jpeg, image/svg+xml, image/webp"
                                        onchange="showPreview(event)">
                                    <small id="fileError" style="color: red; display: none;"></small>
                                    <div class="mt-3">
                                        <img id="file-ip-1-preview" src="{{ asset('no_image.jpg') }}" class="img-thumbnail"
                                            style="width: 100px; height: 80px;" alt="Image Preview">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            {{-- Submit --}}
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-sm btn-success px-4">
                                        <i class="bx bx-save"></i> Save
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
