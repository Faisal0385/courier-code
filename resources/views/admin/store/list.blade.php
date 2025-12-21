@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <!--breadcrumb-->
    <!-- ✅ Visible on medium & large screens (hidden on extra-small screens) -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Stores</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:;">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Store List</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
        </div>
    </div>

    <!-- ✅ Visible only on small & medium screens (hidden on large and up) -->
    <div class="page-breadcrumb d-flex align-items-center mb-3 d-lg-none">
        <div class="breadcrumb-title pe-3">All Stores</div>
        <div class="ms-auto">
        </div>
    </div>


    <!--end breadcrumb-->
    <hr>

    {{-- Admin List Table --}}
    <div class="row justify-content-start">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white fw-semibold">
                    Store list
                </div>
                <div class="card-body table-responsive">
                    {{-- Search --}}
                    <form method="GET" action="{{ route('admin.store.list.page') }}" class="mb-4">
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
                                <th>Store Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                {{-- <th>Status</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $index => $store)
                                <tr>
                                    <td>{{ $stores->firstItem() + $index }}</td>
                                    <td>{{ $store->name }}</td>
                                    <td>{{ $store->email }}</td>
                                    <td>{{ $store->primary_phone ?? '-' }}</td>
                                    <td>{{ $store->address }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="col-lg-12">
                        <div class="mt-3">
                            @if (!empty($stores))
                                {{ $stores->links('pagination::bootstrap-5') }}
                            @endif
                        </div>
                    </div>
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

        fileInput.addEventListener('change', function () {
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