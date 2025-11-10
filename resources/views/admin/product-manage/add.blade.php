@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto"></div>
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

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-semibold">
                    Manage Product - Beg
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.store.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            {{-- Category --}}
                            <div class="col-sm-4">
                                <label for="category" class="col-form-label">Type</label>
                                <select class="form-select form-select-sm" id="admin_id" name="admin_id" required>
                                    <option value="">Select Type...</option>

                                    <option value="#" selected> Purchase </option>
                                    <option value="#"> Sell </option>
                                    <option value="#"> Return </option>

                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="stock" class="col-form-label">Current Stock</label>
                                <input type="text" id="stock" name="stock" readonly
                                    class="form-control form-control-sm" value="12">
                                @error('stock')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- purchase_qty --}}
                            <div class="col-sm-2">
                                <label for="purchase_qty" class="col-form-label">In</label>
                                <input type="text" id="purchase_qty" name="purchase_qty"
                                    class="form-control form-control-sm @error('purchase_qty') is-invalid @enderror"
                                    placeholder="Purchase Qty" value="{{ old('purchase_qty') }}">
                                @error('purchase_qty')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <label for="sell_qty" class="col-form-label">Out</label>
                                <input type="text" id="sell_qty" name="sell_qty"
                                    class="form-control form-control-sm @error('sell_qty') is-invalid @enderror"
                                    placeholder="Sell Qty" value="{{ old('sell_qty') }}">
                                @error('sell_qty')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <label for="return_qty" class="col-form-label">Return</label>
                                <input type="text" id="return_qty" name="return_qty"
                                    class="form-control form-control-sm @error('return_qty') is-invalid @enderror"
                                    placeholder="Return Qty" value="{{ old('return_qty') }}">
                                @error('return_qty')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
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

    {{-- Admin List Table --}}
    <div class="row justify-content-start mt-5">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white fw-semibold">
                    My Product List
                </div>
                <div class="card-body table-responsive">
                    {{-- Search --}}
                    <form method="GET" action="{{ route('admin.register.page') }}" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                placeholder="Search by name, email or phone" value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                    <br>

                    {{-- Table --}}
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>IN</th>
                                <th>OUT</th>
                                <th>Return</th>
                                <th>Stock</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $index => $store)
                                <tr>
                                    <td>{{ $stores->firstItem() + $index }}</td>
                                    <td>10-09-25</td>
                                    <td>{{ $store->name }}</td>
                                    <td>Lotion</td>
                                    <td>12.11</td>
                                    <td>10</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>87</td>
                                    <td>
                                        <a href="{{ route('admin.product.manage.add', $store->id) }}"
                                            class="btn btn-sm d-inline-flex align-items-center btn-warning">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
