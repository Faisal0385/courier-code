@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('style')
    <style>
        .toggle-password {
            float: right;
            cursor: pointer;
            margin-right: 10px;
            margin-top: 0px;
        }
    </style>
@endsection

@section('content')

    <div class="card shadow-sm p-4 rounded-3">
        <div class="row mb-2">
            <div class="col">
                <h3 class="mb-0">Connect Your Pathao Store</h3>
            </div>
        </div>
        <hr>

        {{-- Alert Message --}}
        @if (session('message'))
            <div class="alert 
                    @if (session('alert-type') == 'error') alert-danger
                    @elseif (session('alert-type') == 'success') alert-success
                    @elseif (session('alert-type') == 'warning') alert-warning
                    @else alert-info @endif
                ">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('admin.store.connect.post') }}" method="POST">
            @csrf

            <div class="row g-3">

                {{-- Client Id --}}
                <div class="col-md-6">
                    <label class="form-label">Client ID</label>
                    <input class="form-control" type="text" name="client_id" value="{{ old('client_id') }}"
                        placeholder="Enter Client ID">
                    @error('client_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Client Secret --}}
                <div class="col-md-6">
                    <label class="form-label">Client Secret</label>
                    <input class="form-control" type="text" name="client_secret" value="{{ old('client_secret') }}"
                        placeholder="Enter Client Secret">
                    @error('client_secret')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Username --}}
                <div class="col-md-6">
                    <label class="form-label">Username / Email</label>
                    <input class="form-control" type="text" name="username" value="{{ old('username') }}"
                        placeholder="Enter Username or Email">
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="col-md-6">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Enter Password">
                        <span class="input-group-text">
                            <i class="fa fa-eye-slash toggle-password" style="cursor:pointer;"></i>
                        </span>
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Store ID --}}
                <div class="col-md-6">
                    <label class="form-label">Store ID</label>
                    <input class="form-control" type="text" name="store_id" value="{{ old('store_id') }}"
                        placeholder="Enter Store ID">
                    @error('store_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Store Name --}}
                <div class="col-md-6">
                    <label class="form-label">Store Name</label>
                    <input class="form-control" type="text" name="store_name" value="{{ old('store_name') }}"
                        placeholder="Enter Store Name">
                    @error('store_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div class="col-md-12 text-end mt-3">
                    <button type="submit" class="btn btn-success w-25">
                        Connect
                    </button>
                </div>

            </div>
        </form>
    </div>

    {{-- Password Toggle Script --}}
    <script>
        document.querySelector(".toggle-password").addEventListener("click", function () {
            let input = document.getElementById("password");
            if (input.type === "password") {
                input.type = "text";
                this.classList.remove("fa-eye-slash");
                this.classList.add("fa-eye");
            } else {
                input.type = "password";
                this.classList.add("fa-eye-slash");
                this.classList.remove("fa-eye");
            }
        });
    </script>


    {{-- <script>
        document.querySelectorAll(".toggle-password").forEach(element => {
            element.addEventListener("click", () => {
                element.classList.toggle("fa-eye");
                element.classList.toggle("fa-eye-slash");

                const input = element.parentElement.querySelector("input");
                input.type = (input.type === "password") ? "text" : "password";
            });
        });
    </script> --}}


@endsection