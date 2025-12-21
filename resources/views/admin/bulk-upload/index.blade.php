@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Bulk Order Upload Management</h4>
        </div>

        <hr>

        <div>
            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Error Message --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Validation Error!</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li class="small">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <!-- Search -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0 text-white"><i class="fas fa-folder-plus me-2"></i> Pathao
                                </h5>
                            </div>
                            <div class="card-body">
                                {{-- Form --}}
                                <form action="{{ route('admin.bulk.upload.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!-- Upload File -->
                                    <div class="mb-3">
                                        <label for="csv_file" class="form-label">Upload File</label>
                                        <input type="file" name="csv_file" id="csv_file"
                                            class="form-control form-control-sm"
                                            accept=".csv">
                                    </div>

                                    <!-- Submit -->
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-check-circle me-1"></i> Add File
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0 text-white"><i class="fas fa-folder-plus me-2"></i> Steadfast </h5>
                            </div>
                            <div class="card-body">
                                {{-- Form --}}
                                <form action="{{ route('admin.category.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!-- Upload File -->
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Upload File</label>
                                        <input type="file" name="image" id="image"
                                            class="form-control form-control-sm"
                                            accept="image/png, image/jpg, image/jpeg, image/svg+xml, image/webp"
                                            onchange="showPreview(event)">
                                        <small id="fileError" style="color: red; display: none;"></small>
                                    </div>

                                    <!-- Submit -->
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-check-circle me-1"></i> Add File
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
