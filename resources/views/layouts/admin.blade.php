<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Fashnify')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/modern.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar-modern p-4" style="width: 250px; min-height: 100vh;">
        <div class="text-center mb-4">
            <h4 class="text-white mb-0">
                <i class="fas fa-crown me-2"></i>Admin Panel
            </h4>
        </div>
        <hr class="text-white-50">
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="/admin" class="nav-link nav-link-admin {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="/" class="nav-link nav-link-admin" target="_blank">
                    <i class="fas fa-external-link-alt me-2"></i>View Website
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/products" class="nav-link nav-link-admin {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="fas fa-box me-2"></i>Products
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/users" class="nav-link nav-link-admin">
                    <i class="fas fa-users me-2"></i>Users
                </a>
            </li>
<li class="nav-item mt-auto">
                <form action="/logout" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger nav-link nav-link-admin text-danger p-0">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="flex-grow-1 p-4">
        <div class="content-card">
            <h3 class="mb-4">
                <i class="fas fa-{{ isset($icon) ? $icon : 'chart-bar' }} me-2 text-primary"></i>
                @yield('title', 'Admin Panel')
            </h3>
            @yield('content')
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
