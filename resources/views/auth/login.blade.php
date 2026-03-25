@extends('layouts.auth')

@section('title', 'Login - Fashnify')

@section('content')
<div class="auth-container">
    <div class="logo">
        <img src="{{ asset('frontend/images/main-logo.png') }}" alt="Fashnify" onerror="this.style.display='none'">
    </div>
    
    <h1 class="auth-title">
        <i class="fas fa-sign-in-alt me-2"></i>Welcome Back
    </h1>
    
    @if(session('error'))
        <div class="alert alert-danger mb-4">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
        </div>
    @endif
    
    @if(session('success'))
        <div class="alert alert-success mb-4">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif
    
    <form method="POST" action="/login">
        @csrf
        
        <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
            <label for="email">
                <i class="fas fa-envelope input-icon"></i>
                Email Address
            </label>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-floating">
            <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="password" placeholder="Password" required>
            <label for="password">
                <i class="fas fa-lock input-icon"></i>
                Password
            </label>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="forgot-password">
            <a href="#" class="link fs-6">
                <i class="fas fa-key me-1"></i>Forgot Password?
            </a>
        </div>
        
        <button type="submit" class="btn btn-login mt-3">
            <i class="fas fa-arrow-right me-2"></i>Sign In
        </button>
    </form>
    
    <div class="text-center mt-4">
        <span class="text-white-50">Don't have an account?</span> 
        <a href="/register" class="link fs-6">
            <i class="fas fa-user-plus me-1"></i>Sign Up
        </a>
    </div>
</div>
@endsection
