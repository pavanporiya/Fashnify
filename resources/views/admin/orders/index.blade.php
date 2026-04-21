@extends('layouts.admin')

@section('content')

<div class="container py-4">

    <h2 class="mb-4">All Orders</h2>

    @foreach($orders as $order)

        <div class="card mb-4 shadow-sm">

            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>Order #{{ $order->id }}</strong><br>
                        User: {{ $order->user->name ?? 'N/A' }}<br>
                        Total: ₹{{ $order->total }}
                    </div>

                    <div>
                        <form action="/admin/orders/{{ $order->id }}/status" method="POST">
                            @csrf

                            <select name="status" class="form-select mb-2">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="out_for_delivery" {{ $order->status == 'out_for_delivery' ? 'selected' : '' }}>Out for Delivery</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>

                            <button class="btn btn-dark btn-sm w-100">
                                Update
                            </button>
                        </form>
                    </div>
                </div>

                <hr>

                <!-- ITEMS -->
                @foreach($order->items as $item)
                    <div class="d-flex justify-content-between">
                        <span>{{ $item->product->name ?? 'Deleted Product' }} (x{{ $item->quantity }})</span>
                        <span>₹{{ $item->price }}</span>
                    </div>
                @endforeach

            </div>

        </div>

    @endforeach

</div>

@endsection