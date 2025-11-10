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
                        Connect Your Pathao Store
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.pathao.store.store') }}">
                            @csrf

                            {{-- Connect Your Pathao Store --}}
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <h4>Connect Your Pathao Store</h4>
                                    <hr>
                                </div>

                                {{-- Client ID --}}
                                <div class="col-sm-12">
                                    <label for="client_id" class="col-form-label">Client ID</label>
                                    <input type="client_id" id="client_id" name="client_id"
                                        class="form-control @error('client_id') is-invalid @enderror"
                                        placeholder="Client ID" value="{{ old('client_id') }}">
                                </div>

                                {{-- client_secret --}}
                                <div class="col-sm-12">
                                    <label for="client_secret" class="col-form-label">client_secret</label>
                                    <input type="client_secret" id="client_secret" name="client_secret"
                                        class="form-control @error('client_secret') is-invalid @enderror"
                                        placeholder="client_secret" value="{{ old('client_secret') }}">
                                </div>

                                {{-- email --}}
                                <div class="col-sm-12">
                                    <label for="email" class="col-form-label">email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="email"
                                        value="{{ old('email') }}">
                                </div>

                                {{-- Password --}}
                                <div class="col-sm-12">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                        value="{{ old('password') }}">
                                </div>

                                {{-- Store ID --}}
                                <div class="col-sm-12">
                                    <label for="store_id" class="col-form-label">store_id</label>
                                    <input type="store_id" id="store_id" name="store_id"
                                        class="form-control @error('store_id') is-invalid @enderror"
                                        placeholder="store_id Phone" value="{{ old('store_id') }}">
                                </div>


                                {{-- Store Name --}}
                                <div class="col-sm-12">
                                    <label for="store_name" class="col-form-label">store_name</label>
                                    <input type="store_name" id="store_name" name="store_name"
                                        class="form-control @error('store_name') is-invalid @enderror"
                                        placeholder="store_name Phone" value="{{ old('store_name') }}">
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


    <!-- Axios Script -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const citySelect = document.getElementById('city_id');
            const areaSelect = document.getElementById('area_id');
            const zoneSelect = document.getElementById('zone_id');

            // Load Cities on Page Load
            try {
                const response = await axios.get('/pathao/cities');
                const cities = response.data.cities;

                cities.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.city_id;
                    option.textContent = city.city_name;
                    citySelect.appendChild(option);
                });
            } catch (error) {
                console.error('Error loading cities:', error);
            }


            // On Area Change → Load Zones
            citySelect.addEventListener('change', async () => {
                const cityId = citySelect.value;
                zoneSelect.innerHTML = '<option value="">Select Zone</option>'; // Reset
                areaSelect.innerHTML = '<option value="">Select Area</option>'; // Reset

                if (!cityId) return;

                try {
                    const response = await axios.get(`/pathao/zones/${cityId}`);
                    const zones = response.data.zones;

                    zones.forEach(zone => {
                        const option = document.createElement('option');
                        option.value = zone.zone_id;
                        option.textContent = zone.zone_name;
                        zoneSelect.appendChild(option);
                    });
                } catch (error) {
                    console.error('Error loading zones:', error);
                }

            });

            // On City Change → Load Areas
            zoneSelect.addEventListener('change', async () => {
                const zoneId = zoneSelect.value;
                areaSelect.innerHTML = '<option value="">Select Area</option>'; // Reset

                if (!zoneId) return;

                try {
                    const response = await axios.get(`/pathao/areas/${zoneId}`);
                    const areas = response.data.areas;

                    areas.forEach(area => {
                        const option = document.createElement('option');
                        option.value = area.area_id;
                        option.textContent = area.area_name;
                        areaSelect.appendChild(option);
                    });
                } catch (error) {
                    console.error('Error loading areas:', error);
                }
            });


        });
    </script>

@endsection
