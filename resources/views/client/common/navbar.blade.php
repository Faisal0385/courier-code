<nav class="navbar navbar-expand-lg navbar-white bg-white py-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">PackerPanda <small class="text-muted"
                style="font-weight:600; font-size:12px">Courier</small></a>

        <div class="d-flex align-items-center d-lg-none ms-auto">
            <a class="me-3 text-muted" href="#"><i class="fa fa-search"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Coverage</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                <li class="nav-item ms-3"><a class="nav-link text-success" href="#"><i
                            class="fa fa-map-marker-alt me-1"></i> Track Parcel</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="btn btn-sm btn-outline-success ms-2" href="{{ route('register') }}">Sign
                        Up</a></li>
                {{-- <li class="nav-item ms-2"><a class="btn btn-sm btn-outline-secondary" href="#">EN</a></li> --}}
            </ul>
        </div>
    </div>
</nav>