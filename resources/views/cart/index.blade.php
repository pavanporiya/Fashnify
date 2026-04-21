@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">Shopping Cart</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    @if(count($cart) > 0)

        <div class="row">

            <!-- CART TABLE -->
            <div class="col-lg-8">

                <table class="table table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $total = 0; @endphp

                        @foreach($cart as $id => $item)
                            @php 
                                $subtotal = $item['price'] * $item['quantity'];
                                $total += $subtotal;
                            @endphp

                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $item['image']) }}" width="80">
                                </td>

                                <td>{{ $item['name'] }}</td>

                                <td>₹{{ $item['price'] }}</td>

                                <td>
                                    <form action="{{ route('cart.update', $id) }}" method="POST">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control">
                                        <button class="btn btn-sm btn-primary mt-2">Update</button>
                                    </form>
                                </td>

                                <td>₹{{ $subtotal }}</td>

                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>

            <!-- ORDER SUMMARY -->
            <div class="col-lg-4">

                <div class="card shadow-sm p-4">

                    <h4 class="mb-3">Order Summary</h4>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span>₹{{ $total }}</span>
                    </div>

                    <div class="d-flex justify-content-between mt-2">
                        <span>Delivery</span>
                        <span class="text-success">FREE</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total</span>
                        <span>₹{{ $total }}</span>
                    </div>

                    <!-- CHECKOUT BUTTON -->
                    <a href="{{ route('checkout') }}" class="btn btn-dark w-100 mt-4">
                        Proceed to Checkout
                    </a>

                </div>

            </div>

        </div>

    @else

        <div class="text-center py-5">
            <h4>Your cart is empty 😔</h4>
            <a href="{{ route('products.index') }}" class="btn btn-dark mt-3">
                Continue Shopping
            </a>
        </div>

    @endif

</div>

@endsection