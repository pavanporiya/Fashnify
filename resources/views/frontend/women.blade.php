@extends('layouts.app')

@section('title', 'Women Collection')

@section('content')

<div class="container py-5">
    <h2 class="text-center mb-5">Women's Collection</h2>

    <div class="row g-4">

        @forelse($products as $product)

            <div class="col-md-4 col-lg-3">
                <div class="modern-card h-100">

                    <div style="height:250px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="w-100 h-100 object-fit-cover">
                    </div>

                    <div class="p-3">
                        <h6>{{ $product->name }}</h6>
        <p class="text-danger fw-bold">₹{{ $product->price }}</p>
        
        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark mt-2">
            View
        </a>
    </div>

                </div>
            </div>

        @empty

            <div class="text-center">
                <h4>No Women's products found</h4>
            </div>

        @endforelse

    </div>
</div>

@endsection