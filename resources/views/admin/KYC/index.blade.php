@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')

    <!--breadcrumb-->
    <!-- ✅ Visible on medium & large screens (hidden on extra-small screens) -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">KYC Verification</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:;">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">KYC Verification</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto"></div>
    </div>

    <!-- ✅ Visible only on small & medium screens (hidden on large and up) -->
    <div class="page-breadcrumb d-flex align-items-center mb-3 d-lg-none">
        <div class="breadcrumb-title pe-3">KYC Verification</div>
        <div class="ms-auto"></div>
    </div>
    <!--end breadcrumb-->
    <hr>


    <div class="row g-4">

        {{-- KYC Form --}}
        <div class="col-lg-6">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
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

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-semibold">
                    KYC Verification Form
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.kyc.verification.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- BIN --}}
                        <div class="mb-3 row">
                            <label for="bin" class="col-sm-3 col-form-label">BIN (optional)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('bin') is-invalid @enderror" name="bin"
                                    id="bin" placeholder="BIN (optional)"
                                    value="{{ old('bin', $data->bin ?? null) }}">
                                @error('bin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- trade --}}
                        <div class="mb-3 row">
                            <label for="trade" class="col-sm-3 col-form-label">Trade (optional)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('trade') is-invalid @enderror"
                                    name="trade" id="trade" placeholder="Trade (optional)"
                                    value="{{ old('trade', $data->trade ?? null) }}">
                                @error('trade')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        {{-- NID --}}
                        <div class="mb-3 row">
                            <label for="nid" class="col-sm-3 col-form-label">NID</label>
                            <div class="col-sm-9">
                                <input type="file" id="nid" name="nid" onchange="showPreview1(event)"
                                    class="form-control @error('nid') is-invalid @enderror">
                                @error('nid')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Preview --}}
                        <div class="mb-3 row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <img id="file-ip-2-preview"
                                    src="{{ !empty($data->nid) ? url($data->nid) : url('no_image.jpg') }}" alt="Admin"
                                    class="img-thumbnail rounded" width="110">
                            </div>
                        </div>

                        {{-- Selfie --}}
                        <div class="mb-3 row">
                            <label for="selfie" class="col-sm-3 col-form-label">Selfie</label>
                            <div class="col-sm-9">
                                <button type="button" onclick="openCamera()" class="btn btn-sm btn-warning">
                                    <!-- Camera SVG (24x24) - outline version -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" aria-hidden="true" role="img">
                                        <title>Camera</title>
                                        <rect x="2" y="5" width="20" height="14" rx="2" ry="2"
                                            stroke="currentColor" stroke-width="1.5" fill="none" />
                                        <path d="M8 5l1.2-1.8A1 1 0 0110 2h4a1 1 0 01.8.2L16 5" stroke="currentColor"
                                            stroke-width="1.5" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <circle cx="12" cy="12" r="3.2" stroke="currentColor"
                                            stroke-width="1.5" fill="none" />
                                        <circle cx="17.2" cy="7.8" r="0.6" fill="currentColor" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Preview --}}
                        <div class="mb-3 row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <img id="file-ip-1-preview"
                                    src="{{ !empty($data->selfie) ? url($data->selfie) : url('no_image.jpg') }}"
                                    alt="Admin" class="img-thumbnail rounded" width="110">
                            </div>
                        </div>

                        <div>
                            <!-- Camera Button -->
                            <!-- Captured Photo Preview -->
                            <input type="hidden" name="selfie" id="captured-photo" value="{{ old('selfie') }}">
                            <img id="photo-preview" name="photo-preview" class="hidden mt-2 rounded-md max-h-24" />

                            <!-- Camera Modal -->
                            <div id="camera-container"
                                style="display:none; text-align:center; background:rgba(0,0,0,0.8); position:fixed; top:0; left:0; width:100%; height:100%; z-index:1000; padding-top:50px;">
                                <div style="background:white; padding:20px; border-radius:10px; display:inline-block;">
                                    <h2>Webcam Capture</h2>
                                    <video id="video" width="400" height="300" autoplay></video>
                                    <br>
                                    <button type="button" id="capture">📸 Capture</button>
                                    <button type="button" onclick="closeCamera()">❌ Close</button>
                                    <canvas id="canvas" width="400" height="300" style="display:none;"></canvas>
                                </div>
                            </div>
                        </div>

                        <hr>


                        {{-- Submit --}}
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-sm btn-primary px-4">
                                    <i class="bx bx-save"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Payment Form --}}
        <div class="col-lg-6">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white fw-semibold">
                    Payment Details
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.kyc.payment.details.store') }}">
                        @csrf

                        {{-- bkash --}}
                        <div class="mb-3 row">
                            <label for="bkash" class="col-sm-3 col-form-label">Bkash</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('bkash') is-invalid @enderror"
                                    name="bkash" id="bkash" placeholder="Bkash"
                                    value="{{ old('bkash', $paymentDetail->bkash ?? null) }}">
                                @error('bkash')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- nagod --}}
                        <div class="mb-3 row">
                            <label for="nagod" class="col-sm-3 col-form-label">Nagod</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nagod') is-invalid @enderror"
                                    name="nagod" id="nagod" placeholder="Nagod"
                                    value="{{ old('nagod', $paymentDetail->nagod ?? null) }}">
                                @error('nagod')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        {{-- Bank Name --}}
                        <div class="mb-3 row">
                            <label for="bank_name" class="col-sm-3 col-form-label">Bank Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="bank_name" id="bank_name"
                                    placeholder="Bank Name"
                                    value="{{ old('bank_name', $paymentDetail->bank_name ?? null) }}">
                            </div>
                        </div>

                        {{-- bank_account --}}
                        <div class="mb-3 row">
                            <label for="bank_account" class="col-sm-3 col-form-label">Bank Account</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('bank_account') is-invalid @enderror"
                                    name="bank_account" id="bank_account" placeholder="Bank Account"
                                    value="{{ old('bank_account', $paymentDetail->bank_account ?? null) }}">
                                @error('bank_account')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Branch Name --}}
                        <div class="mb-3 row">
                            <label for="branch_name" class="col-sm-3 col-form-label">Branch Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="branch_name" id="branch_name"
                                    placeholder="Branch Name"
                                    value="{{ old('branch_name', $paymentDetail->branch_name ?? null) }}">
                            </div>
                        </div>

                        {{-- account_holder --}}
                        <div class="mb-3 row">
                            <label for="account_holder" class="col-sm-3 col-form-label">Account Holder</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="account_holder" id="account_holder"
                                    placeholder="Account Holder"
                                    value="{{ old('account_holder', $paymentDetail->account_holder ?? null) }}">
                            </div>
                        </div>

                        {{-- account_no --}}
                        <div class="mb-3 row">
                            <label for="account_no" class="col-sm-3 col-form-label">Account No.</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="account_no" id="account_no"
                                    placeholder="Account No."
                                    value="{{ old('account_no', $paymentDetail->account_no ?? null) }}">
                            </div>
                        </div>

                        <hr>

                        {{-- Submit --}}
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-sm btn-primary px-4">
                                    <i class="bx bx-save"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- KYC Form --}}
        <div class="col-lg-6">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
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

            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white fw-semibold">
                    Verify Phone
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.phone.verify') }}">
                        @csrf

                        {{-- Phone --}}
                        <div class="mb-3 row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone" id="phone"
                                    placeholder="Phone" value="{{ old('phone', $data->phone ?? null) }}">
                            </div>
                        </div>
                        <hr>

                        {{-- Submit --}}
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-sm btn-primary px-4">
                                    <i class="bx bx-save"></i> Verify Phone
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white fw-semibold">
                    Verify Email
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.email.verify') }}">
                        @csrf

                        {{-- email --}}
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="Email" value="{{ old('email', $data->email ?? null) }}">
                            </div>
                        </div>

                        <hr>

                        {{-- Submit --}}
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-sm btn-primary px-4">
                                    <i class="bx bx-save"></i> Verify Email
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

            // Show preview if valid
            if (file) {
                const src = URL.createObjectURL(file);
                const preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreview1(event) {
            const input = event.target;
            const file = input.files[0];

            // Check file size (limit: 50MB)
            if (file && file.size > 50 * 1024 * 1024) {
                alert("File size exceeds 50MB limit.");
                input.value = ""; // Clear file input
                return; // Stop preview generation
            }

            // Show preview if valid
            if (file) {
                const src = URL.createObjectURL(file);
                const preview = document.getElementById("file-ip-2-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const outputImg = document.getElementById('photo-preview');
        const context = canvas.getContext('2d');
        let stream;

        // Open camera
        function openCamera() {
            document.getElementById('camera-container').style.display = 'block';

            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(s => {
                    stream = s;
                    video.srcObject = stream;
                })
                .catch(err => {
                    console.error("Error accessing webcam:", err);
                    alert("Could not access camera.");
                });
        }

        // Close camera
        function closeCamera() {
            document.getElementById('camera-container').style.display = 'none';
            if (stream) {
                let tracks = stream.getTracks();
                tracks.forEach(track => track.stop());
            }
        }

        document.getElementById('capture').addEventListener('click', () => {
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            const imageData = canvas.toDataURL('image/png');

            // Show preview
            outputImg.src = imageData;
            outputImg.classList.remove('hidden');

            // Save to hidden input for form submit
            document.getElementById('captured-photo').value = imageData;

            closeCamera();
        });
    </script>
@endsection
