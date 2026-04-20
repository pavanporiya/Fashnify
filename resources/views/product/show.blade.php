@extends('layouts.app')

@section('title', $product->name)

@section('content')

<div class="container py-5">

    <div class="row">

        <!-- PRODUCT IMAGE -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <img src="{{ asset('storage/' . $product->image) }}" 
                     class="img-fluid rounded" 
                     style="height: 500px; object-fit: cover;">
            </div>
        </div>

        <!-- PRODUCT DETAILS -->
        <div class="col-md-6">

            <h2 class="fw-bold mb-3">{{ $product->name }}</h2>

            <h4 class="text-success mb-3">₹{{ $product->price }}</h4>

            <p class="text-muted mb-4">
                {{ $product->description }}
            </p>

            <p>
                <strong>Category:</strong> 
                <span class="badge bg-dark text-uppercase">
                    {{ $product->category }}
                </span>
            </p>

            <!-- BUTTONS -->
            <div class="mt-4">
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf

                    <!-- Quantity -->
                    <input type="number" 
                           name="quantity" 
                           value="1" 
                           min="1" 
                           class="form-control w-25 mb-3">

                    @if($product->stock > 0)
                        <button class="btn btn-dark px-4 me-2">
                            Add to Cart
                        </button>
                    @else
                        <button class="btn btn-secondary" disabled>
                            Out of Stock
                        </button>
                    @endif
                </form>

                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    Back to Shop
                </a>
            </div>

        </div>

    </div>

    <!-- RELATED PRODUCTS -->
    @if(isset($relatedProducts) && $relatedProducts->count())
    <div class="mt-5">
        <h4 class="mb-4">Related Products</h4>

        <div class="row">
            @foreach($relatedProducts as $item)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm">

                        <img src="{{ asset('storage/' . $item->image) }}"
                             class="card-img-top"
                             style="height: 250px; object-fit: cover;">

                        <div class="card-body text-center">

                            <h6>{{ $item->name }}</h6>

                            <p class="text-success mb-2">
                                ₹{{ $item->price }}
                            </p>

                            <a href="{{ route('products.show', $item->id) }}" 
                               class="btn btn-sm btn-dark">
                                View
                            </a>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

</div>

@endsection