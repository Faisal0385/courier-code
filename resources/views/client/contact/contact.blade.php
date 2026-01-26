@extends('client.master-layout')

@section('content')
    <!-- WHY CHOOSE -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="fw-bold">Contact Packer Panda</h3>
                <p class="text-muted">We’re here to help you with packaging & logistics</p>
            </div>

            <div class="row g-4">
                <!-- Address -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm text-center contact-card">
                        <div class="card-body">
                            <div class="icon mb-3">
                                <i class="fa fa-location-dot fa-2x text-success"></i>
                            </div>
                            <h5 class="fw-semibold">Address</h5>
                            <p class="text-muted mb-0">
                                House 12, Road 5<br>
                                Dhaka, Bangladesh
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Phone -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm text-center contact-card">
                        <div class="card-body">
                            <div class="icon mb-3">
                                <i class="fa fa-phone fa-2x text-success"></i>
                            </div>
                            <h5 class="fw-semibold">Phone</h5>
                            <p class="text-muted mb-0">
                                +880 1234 567 890<br>
                                +880 9876 543 210
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm text-center contact-card">
                        <div class="card-body">
                            <div class="icon mb-3">
                                <i class="fa fa-envelope fa-2x text-success"></i>
                            </div>
                            <h5 class="fw-semibold">Email</h5>
                            <p class="text-muted mb-0">
                                support@packerpanda.com<br>
                                info@packerpanda.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h4 class="fw-bold">Find Us on Map</h4>
                <p class="text-muted">Visit our office location</p>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm">
                        <iframe src="https://www.google.com/maps?q=Dhaka,Bangladesh&output=embed" width="100%"
                            height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h4 class="fw-bold">Send Us a Message</h4>
                <p class="text-muted">We usually respond within 24 hours</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <form action="#" method="POST">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" placeholder="Your name" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" placeholder="your@email.com" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="+880..." required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Subject</label>
                                        <input type="text" class="form-control" placeholder="How can we help?" required>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Message</label>
                                        <textarea class="form-control" rows="4" placeholder="Write your message here..." required></textarea>
                                    </div>

                                    <div class="col-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success px-5">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
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
@endsection
