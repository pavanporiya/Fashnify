@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4 px-3 px-lg-5">
    <div class="row g-4 mb-5">
        <div class="col-lg-3 col-md-6">
            <div class="modern-card text-center">
                <div class="card-body">
                    <i class="fas fa-boxes fa-3x text-primary mb-3"></i>
                    <h3 class="text-white mb-1">{{ $productCount }}</h3>
                    <p class="text-white-50 mb-0">Total Products</p>
                    <a href="/admin/products" class="btn btn-outline-light btn-sm mt-2">View All</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="modern-card text-center">
                <div class="card-body">
                    <i class="fas fa-users fa-3x text-success mb-3"></i>
                    <h3 class="text-white mb-1">{{ $userCount }}</h3>
                    <p class="text-white-50 mb-0">Regular Users</p>
                    <a href="/admin/users" class="btn btn-outline-light btn-sm mt-2">Manage Users</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="modern-card text-center">
                <div class="card-body">
                    <i class="fas fa-chart-line fa-3x text-info mb-3"></i>
                    <h3 class="text-white mb-1">₹{{ number_format($totalRevenue, 0) }}</h3>
                    <p class="text-white-50 mb-0">Total Revenue</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="modern-card">
                <div class="card-body">
                    <h4 class="text-white mb-3">Quick Actions</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <a href="/admin/products/create" class="btn btn-primary btn-modern w-100 h-100 d-flex align-items-center justify-content-center">
                                <i class="fas fa-plus fa-2x mb-2 d-block"></i>
                                <span>Add Product</span>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="/admin/products" class="btn btn-info btn-modern w-100 h-100 d-flex align-items-center justify-content-center">
                                <i class="fas fa-list fa-2x mb-2 d-block"></i>
                                <span>View Products</span>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="/admin/users" class="btn btn-warning btn-modern w-100 h-100 d-flex align-items-center justify-content-center">
                                <i class="fas fa-users-cog fa-2x mb-2 d-block"></i>
                                <span>Manage Users</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="modern-card">
                <div class="card-body">
                    <h5 class="text-white mb-3">Recent Activity</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2 p-2 rounded bg-dark bg-opacity-25">
                            <small class="text-white-50">5 min ago</small>
                            <div>Product added</div>
                        </li>
                        <li class="mb-2 p-2 rounded bg-dark bg-opacity-25">
                            <small class="text-white-50">1 hour ago</small>
                            <div>New user registered</div>
                        </li>
                        <li class="p-2 rounded bg-dark bg-opacity-25">
                            <small class="text-white-50">Today</small>
                            <div>Product updated</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
