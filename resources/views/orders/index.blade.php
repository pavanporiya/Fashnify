@extends('layouts.app')

@section('title', 'My Orders')

@section('content')

<div class="container py-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>My Orders</h2>

        <a href="{{ route('products.index') }}" class="btn btn-outline-dark">
            ← Back to Shop
        </a>
    </div>

    @forelse($orders as $order)

        <div class="card mb-4 shadow-sm border-0">

            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-start mb-3">

                    <div>
                        <h5 class="mb-1">Order #{{ $order->id }}</h5>
                        <small class="text-muted">
                            Total: ₹{{ $order->total }} | 
                            Payment: {{ strtoupper($order->payment_method) }}
                        </small>
                    </div>

                    <div class="text-end">

                        @php
                            $statusColor = match($order->status) {
                                'pending' => 'secondary',
                                'pending_payment' => 'warning',
                                'confirmed' => 'info',
                                'shipped' => 'primary',
                                'out_for_delivery' => 'primary',
                                'delivered' => 'success',
                                default => 'dark'
                            };
                        @endphp

                        <span class="badge bg-{{ $statusColor }}">
                            {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                        </span>

                        <br>

                        <small class="text-muted">
                            Est: {{ \Carbon\Carbon::parse($order->estimated_delivery)->format('d M') }}
                        </small>
                    </div>

                </div>

                <hr>

                <!-- PRODUCTS -->
                @foreach($order->items as $item)

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div>
                            <strong>{{ $item->product->name ?? 'Product removed' }}</strong>
                            <br>
                            <small class="text-muted">Qty: {{ $item->quantity }}</small>
                        </div>

                        <div class="fw-bold">
                            ₹{{ $item->price }}
                        </div>

                    </div>

                @endforeach

                <hr>

                <!-- STATUS TRACK -->
                <div class="mt-3">

                    @php
                        $progress = match ($order->status) {
                            'pending' => 20,
                            'pending_payment' => 30,
                            'confirmed' => 50,
                            'shipped' => 70,
                            'out_for_delivery' => 85,
                            'delivered' => 100,
                            default => 10
                        };
                    @endphp

                    <div class="progress mb-2" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: {{ $progress }}%"></div>
                    </div>

                    <small class="text-muted">
                        Status: {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                    </small>

                </div>

                <!-- ACTIONS -->
                <div class="d-flex justify-content-end gap-2 mt-3">

                    @if($order->status === 'delivered')
                        <button class="btn btn-sm btn-outline-danger">
                            Return Item
                        </button>
                    @endif

                    @if($order->status === 'pending_payment')
                        <a href="{{ route('payment.page', $order->id) }}" class="btn btn-sm btn-warning">
                            Complete Payment
                        </a>
                    @endif

                </div>

            </div>

        </div>

    @empty

        <div class="text-center py-5">
            <h4>No orders yet 😐</h4>
            <a href="{{ route('products.index') }}" class="btn btn-dark mt-3">
                Start Shopping
            </a>
        </div>

    @endforelse

</div>

@endsection