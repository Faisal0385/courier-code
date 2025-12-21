@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.hub.inchage.index') }}">
                    <i class="fa fa-arrow-left"></i> Back to Hub Incharge List
                </a>
            </div>
        </div>
        <hr>

        <div class="row justify-content-start">
            <div class="col-lg-8">

                {{-- Success Flash Message --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
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
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0 text-white"><i class="fas fa-folder-plus me-2"></i> Edit Hub Incharge</h5>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.hub.inchage.update', $hubIncharge->id) }}">
                            @csrf

                            {{-- Full Name --}}
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Full Name"
                                        value="{{ old('name', $hubIncharge->name) }}" required>
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        placeholder="Phone" value="{{ old('phone', $hubIncharge->phone) }}">
                                </div>
                            </div>

                            {{-- hub_id --}}
                            <div class="mb-3 row">
                                <label for="hub_id" class="col-sm-3 col-form-label">Hub</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-select-md" name="hub_id"
                                        aria-label="Small select example" required>
                                        <option value="">Select Hub</option>
                                        @foreach ($hubLists as $hubList)
                                            <option value="{{ $hubList->id }}"
                                                {{ $hubIncharge->hub_id == $hubList->id ? 'selected' : '' }}>{{ $hubList->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            {{-- Address --}}
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea id="address" name="address" rows="3" class="form-control" placeholder="Address">{{ old('address', $hubIncharge->address) }}</textarea>
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
        </div>
    </div>
@endsection
