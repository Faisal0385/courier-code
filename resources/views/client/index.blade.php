@extends('client.master-layout')

@section('content')
    <!-- HERO -->
    <section class="hero position-relative overflow-hidden">
        <!-- decorative shapes -->
        <div class="position-absolute top-0 start-0 translate-middle d-none d-md-block"
            style="width:180px; height:180px; background:rgba(0,174,239,0.08); border-radius:50%"></div>
        <div class="position-absolute bottom-0 end-0 translate-middle d-none d-md-block"
            style="width:260px; height:260px; background:rgba(42,54,147,0.06); border-radius:50%"></div>

        <div class="container position-relative" style="z-index:3;">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <span class="eyebrow">Fast • Safe • Nationwide</span>
                    <h1 class="mt-2">We are <span style="color:var(--primary);">Packer Panda</span> - Your Reliable <span
                            style="color:var(--primary);">Fulfillment</span> Partner with Rapid, 365-Day Delivery.</h1>
                    <p class="lead mt-3">Easy tracking, faster payment, and safe delivery across the entire country.</p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="{{ route('register') }}" class="btn btn-success btn-lg"
                            style="background:var(--primary); border:none">Become
                            a Merchant</a>
                        {{-- <a href="#" class="btn btn-outline-secondary btn-lg">How it Works</a> --}}
                    </div>

                    {{-- <div class="mt-4 d-flex align-items-start">
                        <div class="promo-card w-100">
                            <div class="stat-item"><i class="fa fa-user-circle fa-2x text-muted"></i>
                                <div class="stats">
                                    <span class="num">300k+ </span>
                                    <small class="text-muted">
                                        Registered Merchants
                                    </small>
                                </div>
                            </div>
                            <div class="stat-item"><i class="fa fa-motorcycle fa-2x text-muted"></i>
                                <div class="stats"><span class="num">10k+ </span><small class="text-muted">Delivery
                                        Riders</small></div>
                            </div>
                            <div class="stat-item"><i class="fa fa-map-pin fa-2x text-muted"></i>
                                <div class="stats"><span class="num">500+ </span><small class="text-muted">Delivery
                                        Points</small></div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="col-lg-6 text-lg-end text-center mt-4 mt-lg-0">
                    <img src="https://www.steadfast.com.bd/landing-page/asset/images/rider.svg" alt="illustration"
                        class="illustration img-fluid" style="max-width:560px;">
                </div>

            </div>
        </div>
    </section>

    <!-- BRANDS -->
    {{-- <section class="py-5">
        <div class="container text-center">
            <h5 class="fw-bold mb-4">Brands Love to Work With Us</h5>
            <div class="row align-items-center justify-content-center brands gy-3">
                <div class="col-6 col-sm-4 col-md-2"><img
                        src="https://www.steadfast.com.bd/landing-page/asset/images/partner_img/akash.png" class="img-fluid"
                        alt="logo"></div>
                <div class="col-6 col-sm-4 col-md-2"><img
                        src="https://www.steadfast.com.bd/landing-page/asset/images/partner_img/apex-shoes.png"
                        class="img-fluid" alt="logo"></div>
                <div class="col-6 col-sm-4 col-md-2"><img
                        src="https://www.steadfast.com.bd/landing-page/asset/images/partner_img/walton.png"
                        class="img-fluid" alt="logo"></div>
                <div class="col-6 col-sm-4 col-md-2"><img
                        src="https://www.steadfast.com.bd/landing-page/asset/images/partner_img/Ifad.png" class="img-fluid"
                        alt="logo"></div>
                <div class="col-6 col-sm-4 col-md-2"><img
                        src="https://www.steadfast.com.bd/landing-page/asset/images/partner_img/jamuna.png"
                        class="img-fluid" alt="logo"></div>
            </div>
        </div>
    </section> --}}

    <!-- SERVICES -->
    <section class="py-5 bg-soft">
        <div class="container text-center">
            <h3 class="fw-bold mb-4">Our Service</h3>
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-3 text-center service-card">
                    <div class="service-icon"><img src="https://cdn-icons-png.flaticon.com/512/2920/2920244.png"
                            alt="ecom" style="max-width:70px"></div>
                    <h6 class="mt-3">Ecommerce Delivery</h6>
                </div>
                <div class="col-6 col-md-3 text-center service-card">
                    <div class="service-icon"><img src="https://cdn-icons-png.flaticon.com/512/1021/1021183.png"
                            alt="pick" style="max-width:70px"></div>
                    <h6 class="mt-3">Pick and Drop</h6>
                </div>
                <div class="col-6 col-md-3 text-center service-card">
                    <div class="service-icon"><img src="https://cdn-icons-png.flaticon.com/512/4792/4792929.png"
                            alt="pack" style="max-width:70px"></div>
                    <h6 class="mt-3">Packaging</h6>
                </div>
                <div class="col-6 col-md-3 text-center service-card">
                    <div class="service-icon"><img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                            alt="ware" style="max-width:70px"></div>
                    <h6 class="mt-3">Warehousing</h6>
                </div>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE -->
    <section class="py-5">
        <div class="container text-center mb-4">
            <h3 class="fw-bold">Why you should choose Packer Panda?</h3>
        </div>
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="why-box text-center"><i class="fa fa-box-open fa-2x mb-2 text-success"></i>
                        <div class="title">Daily pickup, no limits</div><small>Packer Panda Courier gives you the
                            opportunity of unlimited pickup.</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="why-box text-center"><i class="fa fa-hand-holding-dollar fa-2x mb-2 text-success"></i>
                        <div class="title">Cash on Delivery</div><small>At Packer Panda Courier we will collect the cash on
                            behalf of you.</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="why-box text-center"><i class="fa fa-credit-card fa-2x mb-2 text-success"></i>
                        <div class="title">Faster Payment Service</div><small>We provide multiple payment methods such
                            as cash, Bank or Mobile Banking.</small>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="why-box text-center"><i class="fa fa-desktop fa-2x mb-2 text-success"></i>
                        <div class="title">Online Management</div><small>You can get all the information you need in
                            your own user dashboard.</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="why-box text-center"><i class="fa fa-map-marked-alt fa-2x mb-2 text-success"></i>
                        <div class="title">Real-Time Tracking</div><small>Packer Panda Courier provides an unique tracking
                            code for every consignment.</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="why-box text-center"><i class="fa fa-headset fa-2x mb-2 text-success"></i>
                        <div class="title">24/7 Customer Service</div><small>Our Call Center Executives are always ready
                            24/7 to help you with your problems.</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-5 bg-soft">
        <div class="container">
            <h5 class="fw-bold text-center mb-4">Frequently asked Questions</h5>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faq">
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="q1"><button class="accordion-button collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#c1">Why Packer Panda
                                    Courier?</button></h2>
                            <div id="c1" class="accordion-collapse collapse" data-bs-parent="#faq">
                                <div class="accordion-body">Packer Panda Courier is a licensed, reliable and fast courier
                                    service across the country.</div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="q2"><button class="accordion-button collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#c2">What is the coverage
                                    area of Packer Panda Courier?</button></h2>
                            <div id="c2" class="accordion-collapse collapse" data-bs-parent="#faq">
                                <div class="accordion-body">We serve most major cities and many rural areas. Coverage
                                    varies by service.</div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="q3"><button class="accordion-button collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#c3">What services does
                                    Packer Panda Courier provide?</button></h2>
                            <div id="c3" class="accordion-collapse collapse" data-bs-parent="#faq">
                                <div class="accordion-body">Ecommerce delivery, pick & drop, packaging, warehousing, and
                                    cash-collection services.</div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="q4"><button class="accordion-button collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#c4">Want to know about your
                                    delivery charges ?</button></h2>
                            <div id="c4" class="accordion-collapse collapse" data-bs-parent="#faq">
                                <div class="accordion-body">Use our rate calculator or contact support for exact pricing
                                    based on weight and distance.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-5 text-center">
        <div class="container">
            <div class="cta p-5">
                <div class="row align-items-center">
                    <div class="col-md-9 text-md-start">
                        <h3 class="mb-1">Grow Your Business with Packer Panda</h3>
                        <p class="mb-0">Start Your first step with Packer Panda</p>
                    </div>
                    <div class="col-md-3 text-md-end mt-3 mt-md-0">
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg">Become a Merchant</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LICENSE / MEMBERSHIP -->
    {{-- <section class="py-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-6 text-center text-md-start">
                    <small class="text-success">Licensed</small>
                    <h6 class="fw-bold">A licensed courier service of GPO</h6>
                    <img src="https://via.placeholder.com/140x80?text=GPO+Seal" class="mt-2" alt="gpo">
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <small class="text-success">Membership</small>
                    <h6 class="fw-bold">We are Member of</h6>
                    <img src="https://via.placeholder.com/220x60?text=CSA+-+e-CAB" class="mt-2" alt="members">
                </div>
            </div>
        </div>
    </section> --}}
@endsection
