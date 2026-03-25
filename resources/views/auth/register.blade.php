@extends('layouts.auth')

@section('title', 'Register - Fashnify')

@section('content')
<div class="auth-container">
    <div class="logo">
        <img src="{{ asset('frontend/images/main-logo.png') }}" alt="Fashnify" onerror="this.style.display='none'">
    </div>
    
    <h1 class="auth-title">
        <i class="fas fa-user-plus me-2"></i>Create Account
    </h1>
    
    @if($errors->any())
        <div class="alert alert-danger mb-4">
            <i class="fas fa-exclamation-circle me-2"></i>Please fix the errors below.
        </div>
    @endif
    
    <form method="POST" action="/register">
        @csrf
        
        <div class="form-floating">
            <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" placeholder="Full Name" value="{{ old('name') }}" required>
            <label for="name">
                <i class="fas fa-user input-icon"></i>
                Full Name
            </label>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email-reg" placeholder="name@example.com" value="{{ old('email') }}" required>
            <label for="email-reg">
                <i class="fas fa-envelope input-icon"></i>
                Email Address
            </label>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-floating">
            <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="password-reg" placeholder="Password" required>
            <label for="password-reg">
                <i class="fas fa-lock input-icon"></i>
                Password
            </label>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-floating">
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation')is-invalid @enderror" id="password-confirm" placeholder="Confirm Password" required>
            <label for="password-confirm">
                <i class="fas fa-lock-open input-icon"></i>
                Confirm Password
            </label>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-login mt-3">
            <i class="fas fa-user-check me-2"></i>Create Account
        </button>
    </form>
    
    <div class="text-center mt-4">
        <span class="text-white-50">Already have an account?</span> 
        <a href="/login" class="link fs-6">
            <i class="fas fa-sign-in-alt me-1"></i>Sign In
        </a>
    </div>
</div>
@endsection
