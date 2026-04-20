@extends('layouts.app')

@section('title', 'Home - Fashnify')

@section('content')

<!-- HERO -->
<section class="hero-overlay position-relative bg-dark" style="height: 70vh; background-image: url('{{ asset('frontend/images/banner-image-1.jpg') }}'); background-size: cover; background-position: center;">
    <div class="hero-content d-flex align-items-center justify-content-center h-100 text-center text-white px-3">
        <div>
            <h1 class="display-3 fw-bold mb-4">New Collections</h1>
            <p class="lead mb-5 fs-4">Discover the latest fashion trends for you</p>
            <a href="#categories" class="btn btn-modern btn-lg">
                Shop Now
            </a>
        </div>
    </div>
</section>

<!-- CATEGORIES -->
<section id="categories" class="container py-5">
    <div class="row g-4">

        <div class="col-lg-6">
            <div class="cat-card modern-card position-relative">
                <img src="{{ asset('frontend/images/cat-item1.jpg') }}">
                <div class="cat-overlay">
                    <h3>Men's Fashion</h3>
                    <a href="/men" class="btn btn-modern">Shop Men</a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="cat-card modern-card position-relative">
                <img src="{{ asset('frontend/images/cat-item2.jpg') }}">
                <div class="cat-overlay">
                    <h3>Women's Fashion</h3>
                    <a href="/women" class="btn btn-modern">Shop Women</a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- PRODUCTS -->
<section class="container-fluid py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Featured Products</h2>

        <div class="row g-4">

            @forelse($products as $product)

                <div class="col-md-6 col-lg-4 col-xl-2">
                    <div class="modern-card h-100">

                        <!-- IMAGE -->
                        <div class="position-relative overflow-hidden" style="height: 280px;">

                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     class="w-100 h-100 object-fit-cover"
                                     alt="{{ $product->name }}">
                            @else
                                <img src="https://via.placeholder.com/300x280?text=No+Image" 
                                     class="w-100 h-100 object-fit-cover">
                            @endif

                        </div>

                        <!-- INFO -->
                        <div class="p-4">
                            <h6>{{ Str::limit($product->name, 25) }}</h6>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 text-danger fw-bold">
                                    ₹{{ number_format($product->price, 0) }}
                                </span>
                            </div>

                            <small class="text-muted">
            {{ ucfirst($product->category) }}
        </small>
        
        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark mt-2">
            View
        </a>
    </div>

                    </div>
                </div>

            @empty

                <div class="col-12 text-center py-5">
                    <h4>No products available</h4>
                </div>

            @endforelse

        </div>

    </div>
</section>

@endsection