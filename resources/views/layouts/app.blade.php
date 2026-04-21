<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fashnify - Fashion Ecommerce')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Frontend CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    
    <!-- Modern CSS -->
    <link href="{{ asset('css/modern.css') }}" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-modern">
    <div class="container-fluid">
        <a class="navbar-brand navbar-brand-modern" href="/">
            <i class="fas fa-shopping-bag me-2"></i>Fashnify
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-modern @if(request()->routeIs('home'))active @endif" href="/">
                        <i class="fas fa-home me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-modern @if(request()->routeIs('products.index')) active @endif" href="{{ route('products.index') }}">
                        <i class="fas fa-store me-1"></i>Shop
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-modern @if(request()->routeIs('about'))active @endif" href="/about">
                        <i class="fas fa-info-circle me-1"></i>About
                    </a>
                </li>

                @if(count(session('cart', [])) > 0)
                <li class="nav-item">
                    <a href="{{ route('cart.index') }}" 
                        class="nav-link nav-link-modern d-inline-block">
                            <i class="fas fa-shopping-cart me-1"></i>
                            Cart ({{ count(session('cart', [])) }})
                    </a>
                </li>
                @endif
                
                @if(Auth::check())

                    <!-- 🔥 NEW: MY PROFILE -->
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern @if(request()->routeIs('profile')) active @endif" href="{{ route('profile') }}">
                            <i class="fas fa-user me-1"></i>My Profile
                        </a>
                    </li>

                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link nav-link-modern" href="/admin">
                                <i class="fas fa-tachometer-alt me-1"></i>Admin Panel
                            </a>
                        </li>
                    @endif
                    
                    <li class="nav-item">
                        <form action="/logout" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="nav-link nav-link-modern btn btn-link p-0">
                                <i class="fas fa-sign-out-alt me-1"></i>Logout
                            </button>
                        </form>
                    </li>

                @else
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern" href="/register">
                            <i class="fas fa-user-plus me-1"></i>Join
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern" href="/login">
                            <i class="fas fa-sign-in-alt me-1"></i>Sign In
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- PAGE CONTENT -->
<main class="animate-slide">
    @if(session('error'))
        <div class="alert alert-danger text-center m-0">
        {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success text-center m-0">
            {{ session('success') }}
        </div>
    @endif
    @yield('content')
</main>

<!-- JS -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugins.js') }}"></script>
<script src="{{ asset('frontend/js/script.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>