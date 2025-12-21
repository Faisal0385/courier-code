@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <!--breadcrumb-->
    <!-- ✅ Visible on medium & large screens (hidden on extra-small screens) -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Store</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:;">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Available Couriers</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
        </div>
    </div>

    <!-- ✅ Visible only on small & medium screens (hidden on large and up) -->
    <div class="page-breadcrumb d-flex align-items-center mb-3 d-lg-none">
        <div class="breadcrumb-title pe-3">All Available Couriers</div>
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
                    All Available Couriers List
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="m-0 mb-3 fw-bold">Available Couriers</h3>

                            <div class="row g-4">
                                @forelse ($courier_platforms as $courier_platform)
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <a href="{{ route('admin.store.connect', [$courier_platform]) }}"
                                            class="courier-card d-block text-center p-4 border rounded-4 shadow-sm bg-white">
                                            <img src="{{ asset($courier_platform->logo) }}" alt="{{ $courier_platform->name }}"
                                                class="img-fluid courier-logo">
                                        </a>
                                    </div>
                                @empty
                                    <div class="col-lg-12 text-center">
                                        <h4 class="bg-danger text-white px-4 py-3 rounded-3 d-inline-block">
                                            <i class="fa-solid fa-store"></i> No Courier Platform Found
                                        </h4>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="position-relative mb_20">
        <div class="card-body mt-2">
            <div class="row flex-nowrap flex-row gap-3">
                @forelse ($my_stores as $my_store)
                    <div class="col-lg-4 card rounded-3 p-4" style="border: 1px solid rgb(200, 197, 197)">

                        @php
                           $platform = $courier_platforms->where('id', $my_store->courier_platform_id)->first(); 
                        @endphp

                        <img src="{{ asset($platform->logo) }}"
                            alt="{{ $platform->name }}" class="img-fluid mx-auto d-block">

                        {{-- @if ($my_store?->store?->courierPlatform?->value ==
                        \App\Models\CourierPlatform::COURIER_PLATFORM_PATHAO_VALUE)
                        @livewire('connect-store.update-token', ['my_store' => $my_store], key($my_store->id))
                        @endif --}}

                        <div class="single-pro-detail">
                            <h3 class="pro-title">{{ $my_store->store_name }}</h3>
                            <p class="text-muted mb-0">
                                Owner:
                                {{ auth()->user()->id == $my_store->user_id ? auth()->user()->name : "" }}
                            </p>
                            @if (auth()->user()->id == $my_store->user_id)
                                <p class="text-muted mb-0">
                                    Store Token:
                                    <span id="storeToken_{{ $my_store->id }}">{{ $my_store->store_token }}</span>
                                    <i class="fa-solid fa-copy ms-4 fs-4 clickToCopy" style="cursor: pointer" title="Click to copy"
                                        data-store-id="{{ $my_store->id }}"></i>
                                </p>
                            @endif
                            {{-- <a class="btn btn-primary mt-3">
                                Create Order
                            </a> --}}
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 align-self-center border-danger border-2 rounded-3"
                        style="display: flex; justify-content: center;">
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.fa-copy').forEach(function (copyIcon) {
                copyIcon.addEventListener('click', function () {
                    const storeId = this.dataset.storeId;
                    const textToCopy = document.getElementById(`storeToken_${storeId}`).textContent;

                    // Create a temporary element to execute the copy command
                    const tempElement = document.createElement("textarea");
                    tempElement.value = textToCopy;
                    document.body.appendChild(tempElement);
                    tempElement.select();
                    document.execCommand("copy");
                    document.body.removeChild(tempElement);

                    // Show copy animation
                    const animationElement = document.getElementById(`copyAnimation_${storeId}`);
                    animationElement.style.display = "inline";
                    setTimeout(() => {
                        animationElement.style.display = "none";
                    }, 3000);
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const copyButtons = document.querySelectorAll(".clickToCopy");

            copyButtons.forEach((button) => {
                button.addEventListener("click", function () {
                    const storeId = this.getAttribute("data-store-id");
                    const storeToken = document.getElementById(`storeToken_${storeId}`).innerText;

                    // Copy the token to the clipboard
                    navigator.clipboard.writeText(storeToken).then(() => {
                        // Replace the copy icon with a "Copied!" icon and animate
                        this.classList.remove("fa-copy");
                        this.classList.add("fa-check", "copied-animation");

                        // Revert back to the original icon after the animation
                        setTimeout(() => {
                            this.classList.remove("fa-check", "copied-animation");
                            this.classList.add("fa-copy");
                        }, 2000); // Adjust timing to match the animation duration
                    });
                });
            });
        });
    </script>


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