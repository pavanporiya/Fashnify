@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="container py-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>My Profile</h2>

        <a href="{{ route('products.index') }}" class="btn btn-outline-dark">
            ← Continue Shopping
        </a>
    </div>

    <div class="row g-4">

        <!-- LEFT: PROFILE FORM -->
        <div class="col-lg-7">

            <div class="card border-0 shadow-sm p-4 position-relative">

                <h4 class="mb-4">Account Details</h4>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf

                    <!-- NAME -->
                    <div class="form-floating mb-3">
                        <input type="text" 
                               name="name" 
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', Auth::user()->name) }}"
                               placeholder="Full Name">
                        <label>Full Name</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- EMAIL -->
                    <div class="form-floating mb-3">
                        <input type="email" 
                               class="form-control bg-light"
                               value="{{ Auth::user()->email }}" 
                               placeholder="Email"
                               disabled>
                        <label>Email (cannot change)</label>
                    </div>

                    <!-- PHONE -->
                    <div class="form-floating mb-3">
                        <input type="text" 
                               name="phone" 
                               class="form-control @error('phone') is-invalid @enderror"
                               value="{{ old('phone', Auth::user()->phone) }}"
                               placeholder="Phone">
                        <label>Phone</label>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ADDRESS -->
                    <div class="form-floating mb-3">
                        <textarea name="address" 
                                  class="form-control @error('address') is-invalid @enderror"
                                  placeholder="Address"
                                  style="height: 100px">{{ old('address', Auth::user()->address) }}</textarea>
                        <label>Address</label>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- SAVE BUTTON -->
                    <button class="btn btn-dark w-100 mt-3">
                        Save Changes
                    </button>

                </form>

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-lg-5">

            <!-- USER CARD -->
            <div class="card border-0 shadow-sm p-4 mb-4 text-center">

                <div class="mb-3 position-relative">
                    <i class="fas fa-user-circle fa-5x text-secondary"></i>
                </div>

                <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                <small class="text-muted">{{ Auth::user()->email }}</small>

                <hr>

                <div class="d-flex justify-content-between text-muted small">
                    <span>Member since</span>
                    <span>{{ Auth::user()->created_at->format('d M Y') }}</span>
                </div>

            </div>

            <!-- QUICK ACTIONS -->
            <div class="card border-0 shadow-sm p-4">

                <h5 class="mb-3">Quick Actions</h5>

                <a href="{{ route('orders.my') }}" 
                   class="btn btn-outline-dark w-100 mb-2">
                    <i class="fas fa-box me-1"></i> My Orders
                </a>

                <a href="{{ route('cart.index') }}" 
                   class="btn btn-outline-secondary w-100 mb-2">
                    <i class="fas fa-shopping-cart me-1"></i> My Cart
                </a>

                <a href="{{ route('products.index') }}" 
                   class="btn btn-outline-primary w-100">
                    <i class="fas fa-store me-1"></i> Shop More
                </a>

            </div>

        </div>

    </div>

</div>

@endsection