@extends('layouts.app')

@section('title', 'Processing Payment')

@section('content')

<div class="container py-5 text-center">

    <h2 class="mb-4">Processing Payment...</h2>

    <div class="card p-5 shadow-sm">

        <h4>Order #{{ $order->id }}</h4>
        <p>Total: ₹{{ $order->total }}</p>

        <div class="my-4">
            <div class="spinner-border text-dark" role="status"></div>
        </div>

        <p>Please wait while we process your payment...</p>

        <!-- Fake Payment Button -->
        <form action="{{ route('payment.success', $order->id) }}" method="POST">
            @csrf
            <button class="btn btn-success mt-3">
                Simulate Payment Success
            </button>
        </form>

    </div>

</div>

@endsection