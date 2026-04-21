@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Add New Product</h2>
            <a href="/admin/products" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i>Back to Products
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="modern-card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="/admin/products/store" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label fw-bold">Product Image</label>
                                <input type="file" name="image" class="form-control modern-input" required>
                                <small class="text-muted">JPG, PNG (Max 2MB)</small>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Product Name</label>
                                    <input type="text" name="name" class="form-control modern-input"
                                        placeholder="Enter product name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Category</label>
                                    <select name="category" class="form-select modern-input" required>
                                        <option value="">Select Category</option>
                                        <option value="men">Men</option>
                                        <option value="women">Women</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Price (₹)</label>
                                    <input type="number" step="0.01" name="price" class="form-control modern-input"
                                        placeholder="0.00" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Stock</label>
                                <input type="number" name="stock" class="form-control modern-input"
                                    placeholder="Enter stock quantity" required>
                            </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control modern-input" rows="4"
                            placeholder="Enter product description..."></textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-modern px-5">
                            <i class="fas fa-plus me-2"></i>Add Product
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection