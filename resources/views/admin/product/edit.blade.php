@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="row mb-3">
        <div class="col-lg-12">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.product.index') }}">
                <i class="fa fa-arrow-left"></i> Back to Product List
            </a>
        </div>
    </div>
    <!--end breadcrumb-->
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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-semibold">
                    Edit Product
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.product.update', $product->id) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <label for="name" class="col-form-label">Product Name</label>
                                <input type="text" id="name" name="name" class="form-control form-control-sm"
                                    value="{{ old('name', $product->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Category --}}
                            <div class="col-sm-4">
                                <label for="category" class="col-form-label">Category</label>
                                <input type="text" id="category" name="category" class="form-control form-control-sm"
                                    value="{{ old('category', $product->category) }}">
                                @error('category')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- weight --}}
                            <div class="col-sm-4">
                                <label for="weight" class="col-form-label">Weight (in kg)</label>
                                <input type="text" id="weight" name="weight" class="form-control form-control-sm"
                                    value="{{ old('weight', $product->weight) }}">
                                @error('weight')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- dimensions --}}
                            <div class="col-sm-4">
                                <label for="dimensions" class="col-form-label">Dimensions</label>
                                <input type="text" id="dimensions" name="dimensions" class="form-control form-control-sm"
                                    value="{{ old('dimensions', $product->dimensions) }}">
                                @error('dimensions')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Product Image --}}
                            <div class="col-sm-12">
                                <hr>
                                <label for="image" class="form-label">Product Image</label>
                                <input type="file" id="image" name="image" onchange="showPreview(event)"
                                    class="form-control">
                                @error('image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Preview --}}
                            <div class="col-sm-12 mt-2">
                                <img id="file-ip-1-preview"
                                    src="{{ !empty($product->image) ? url($product->image) : url('no_image.jpg') }}"
                                    alt="Admin" class="img-thumbnail rounded" width="110">
                            </div>
                        </div>

                        <hr>

                        {{-- Submit --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-sm btn-success px-4">
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


@section('script')
    <script>
        function showPreview(event) {
            const input = event.target;
            const file = input.files[0];

            // Check file size (limit: 50MB)
            if (file && file.size > 50 * 1024 * 1024) {
                alert("File size exceeds 50MB limit.");
                input.value = ""; // Clear file input
                return; // Stop preview generation
            }

            const preview = document.getElementById('file-ip-1-preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = () => URL.revokeObjectURL(preview.src); // Free memory
        }
    </script>

    <script>
        const fileInput = document.getElementById('image');
        const fileError = document.getElementById('fileError');

        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image/svg+xml'];
        const maxSizeInKB = 2048;

        fileInput.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const fileType = file.type;
                const fileSizeInKB = file.size / 1024;

                // Validate MIME type
                if (!allowedTypes.includes(fileType)) {
                    fileError.textContent = 'Only JPEG, JPG, PNG, WEBP, or SVG files are allowed.';
                    fileError.style.display = 'inline';
                    this.value = '';
                    return;
                }

                // Validate file size
                if (fileSizeInKB > maxSizeInKB) {
                    fileError.textContent = 'File size must be less than 2MB.';
                    fileError.style.display = 'inline';
                    this.value = '';
                    return;
                }

                // If valid
                fileError.style.display = 'none';
            }
        });
    </script>
@endsection
