@extends('layouts.app')

@section('title', 'About Fashnify')

@section('content')

<!-- HERO -->
<section class="position-relative text-white" 
    style="background: linear-gradient(135deg, rgba(30,30,60,0.85), rgba(108,99,255,0.85)), 
    url('{{ asset('frontend/images/collection-banner.jpg') }}') center/cover no-repeat; padding: 100px 0;">

    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3">About Fashnify</h1>
        <p class="lead">Where fashion meets modern lifestyle</p>
    </div>
</section>

<!-- COMPANY INFO -->
<section class="container py-5">
    <div class="row align-items-center g-5">

        <div class="col-lg-6">
            <h2 class="fw-bold mb-3">Welcome to Fashnify</h2>
            <p class="text-muted mb-4">
                Fashnify is not just another fashion store. We bring curated styles, premium quality,
                and global trends into one seamless experience.
            </p>

            <div class="row g-3">

                <!-- FEATURE CARD -->
                <div class="col-6">
                    <div class="p-3 shadow-sm rounded bg-white h-100 text-center feature-card">
                        <i class="fas fa-truck fa-2x text-primary mb-2"></i>
                        <h6 class="fw-bold">Fast Shipping</h6>
                        <small class="text-muted">2-5 days delivery</small>
                    </div>
                </div>

                <div class="col-6">
                    <div class="p-3 shadow-sm rounded bg-white h-100 text-center feature-card">
                        <i class="fas fa-shield-alt fa-2x text-success mb-2"></i>
                        <h6 class="fw-bold">Secure Payments</h6>
                        <small class="text-muted">100% safe checkout</small>
                    </div>
                </div>

                <div class="col-6">
                    <div class="p-3 shadow-sm rounded bg-white h-100 text-center feature-card">
                        <i class="fas fa-sync-alt fa-2x text-warning mb-2"></i>
                        <h6 class="fw-bold">Easy Returns</h6>
                        <small class="text-muted">30-day returns</small>
                    </div>
                </div>

                <div class="col-6">
                    <div class="p-3 shadow-sm rounded bg-white h-100 text-center feature-card">
                        <i class="fas fa-headset fa-2x text-info mb-2"></i>
                        <h6 class="fw-bold">24/7 Support</h6>
                        <small class="text-muted">Always here</small>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-6 text-center">
            <img src="{{ asset('frontend/images/post-large-image2.jpg') }}" 
                 class="img-fluid rounded shadow-lg" 
                 style="max-height: 400px; object-fit: cover;">
        </div>

    </div>
</section>

<!-- MISSION -->
<section class="py-5" style="background: #f8f9ff;">
    <div class="container text-center">

        <h2 class="fw-bold mb-3">Our Mission</h2>
        <p class="text-muted mb-5">
            Making fashion accessible, sustainable, and expressive for everyone.
        </p>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm mission-card">
                    <h5 class="fw-bold">Premium Quality</h5>
                    <p class="text-muted small">Top-tier curated designs</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm mission-card">
                    <h5 class="fw-bold">Sustainable</h5>
                    <p class="text-muted small">Eco-conscious fashion</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm mission-card">
                    <h5 class="fw-bold">Global Trends</h5>
                    <p class="text-muted small">Latest worldwide styles</p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- CONTACT -->
<section class="container py-5 text-center">

    <h2 class="fw-bold mb-5">Get In Touch</h2>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="p-4 rounded shadow-sm contact-card">
                <i class="fas fa-map-marker-alt fa-2x text-primary mb-3"></i>
                <h6 class="fw-bold">Visit Us</h6>
                <small class="text-muted">Ahmedabad, Bopal Gam</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 rounded shadow-sm contact-card">
                <i class="fas fa-phone fa-2x text-success mb-3"></i>
                <h6 class="fw-bold">Call Us</h6>
                <small class="text-muted">+91 9427601247</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 rounded shadow-sm contact-card">
                <i class="fas fa-envelope fa-2x text-warning mb-3"></i>
                <h6 class="fw-bold">Email</h6>
                <small class="text-muted">pavanjack1432@gmail.com</small>
            </div>
        </div>

    </div>

</section>

@endsection