@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

    <div class="container py-5">

        <h2 class="mb-4">Checkout</h2>

        <div class="row">

            <!-- FORM -->
            <div class="col-lg-6">

                <form action="{{ route('place.order') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Payment Method</label>

                        <select name="payment_method" class="form-control">
                            <option value="cod">Cash on Delivery</option>
                            <option value="online">Online Payment</option>
                        </select>
                    </div>
                    <button class="btn btn-dark w-100">
                        Place Order
                    </button>

                </form>

            </div>

            <!-- SUMMARY -->
            <div class="col-lg-6">

                <div class="card p-4 shadow-sm">

                    <h4>Order Summary</h4>
                    <hr>

                    @php $total = 0; @endphp

                    @foreach($cart as $item)
                        @php 
                                                $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <div class="d-flex justify-content-between">
                                <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                                <span>₹{{ $subtotal }}</span>
                            </div>
                    @endforeach

                    <hr>

                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total</span>
                        <span>₹{{ $total }}</span>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection