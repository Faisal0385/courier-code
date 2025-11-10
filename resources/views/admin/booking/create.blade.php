@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.booking.page') }}">
                    <i class="fa fa-arrow-left"></i> Back to Booking List
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
                        Create Booking
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.booking.store') }}">
                            @csrf

                            <div class="mb-3 row">
                                {{-- Store Name --}}
                                <div class="col-sm-12">
                                    <label for="store_id" class="col-form-label">Store Name</label>
                                    <select class="form-select form-select-md" id="store_id" name="store_id"
                                        aria-label="Small select example" required>
                                        <option value="" selected>Select Store</option>
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-12">
                                    <label for="product_type" class="col-sm-3 col-form-label">Product Type</label>
                                    <select class="form-select form-select-md" name="product_type"
                                        aria-label="Small select example" required>
                                        <option value="">Product Type</option>
                                        <option value="1">Parcel</option>
                                        {{-- @foreach ($hubLists as $hubList)
                                    <option value="{{ $hubList->id }}">{{ $hubList->name }}</option>
                                    @endforeach --}}
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="delivery_type" class="col-sm-3 col-form-label">Delivery Type</label>
                                    <select class="form-select form-select-md" name="delivery_type"
                                        aria-label="Small select example" required>
                                        <option value="">Delivery Type</option>
                                        <option value="1">Normal Delivery</option>
                                        {{-- @foreach ($hubLists as $hubList)
                                    <option value="{{ $hubList->id }}">{{ $hubList->name }}</option>
                                    @endforeach --}}
                                    </select>
                                </div>
                            </div>

                            {{-- Recipient Details --}}
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <h4>Recipient Details</h4>
                                    <hr>
                                </div>

                                {{-- Recipient's name --}}
                                <div class="col-sm-12">
                                    <label for="recipient_name" class="col-form-label">Recipient's name</label>
                                    <input type="recipient_name" id="recipient_name" name="recipient_name"
                                        class="form-control @error('recipient_name') is-invalid @enderror"
                                        placeholder="Recipient's name" value="{{ old('recipient_name') }}">
                                </div>

                                {{-- Recipient's Phone --}}
                                <div class="col-sm-12">
                                    <label for="recipient_phone" class="col-form-label">Recipient's Phone</label>
                                    <input type="recipient_phone" id="recipient_phone" name="recipient_phone"
                                        class="form-control @error('recipient_phone') is-invalid @enderror"
                                        placeholder="Recipient's Phone" value="{{ old('recipient_phone') }}">
                                </div>

                                {{-- Recipient's Secondary Phone --}}
                                <div class="col-sm-12">
                                    <label for="recipient_secondary_phone" class="col-form-label">Recipient's Secondary
                                        Phone</label>
                                    <input type="recipient_secondary_phone" id="recipient_secondary_phone"
                                        name="recipient_secondary_phone"
                                        class="form-control @error('recipient_secondary_phone') is-invalid @enderror"
                                        placeholder="Recipient's Secondary Phone"
                                        value="{{ old('recipient_secondary_phone') }}">
                                </div>

                                <div class="col-sm-12">
                                    <label for="recipient_address" class="col-form-label">Recipient Address</label>
                                    <textarea id="recipient_address" name="recipient_address" rows="3" class="form-control"
                                        placeholder="Recipient Address">{{ old('recipient_address') }}</textarea>
                                </div>

                                {{-- Division --}}
                                <div class="col-sm-4">
                                    <label for="division_id" class="col-form-label">Division</label>
                                    <select class="form-select form-select-md" id="division_id" name="division_id"
                                        aria-label="Small select example" required>
                                        <option value="" selected>Select Division</option>
                                        <option value="1">Chattogram</option>
                                        <option value="2">Dhaka</option>
                                    </select>
                                </div>

                                {{-- District --}}
                                <div class="col-sm-4">
                                    <label for="district_id" class="col-form-label">District</label>
                                    <select class="form-select form-select-md" id="district_id" name="district_id"
                                        aria-label="Small select example" required>
                                        <option value="" selected>Select District</option>
                                        <option value="3">Chattogram</option>
                                        <option value="4">Dhaka</option>
                                    </select>
                                </div>

                                {{-- Thana --}}
                                <div class="col-sm-4">
                                    <label for="thana_id" class="col-form-label">Thana</label>
                                    <select class="form-select form-select-md" id="thana_id" name="thana_id"
                                        aria-label="Small select example" required>
                                        <option value="" selected>Select Thana</option>
                                        <option value="5">Chattogram</option>
                                        <option value="6">Dhaka</option>
                                    </select>
                                </div>

                            </div>

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
