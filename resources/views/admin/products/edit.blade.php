@extends('layouts.admin')

@section('content')

    <div class="container py-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Edit Product: {{ $product->name }}</h2>

            <a href="/admin/products" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Card -->
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow">
                    <div class="card-body">

                        <form action="/admin/products/update/{{ $product->id }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- IMAGE -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Current Image</label>

                                @if($product->image)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="img-thumbnail" style="max-height: 200px; width: 100%; object-fit: cover;">
                                    </div>
                                @else
                                    <p>No image available</p>
                                @endif

                                <input type="file" name="image" class="form-control">
                                <small class="text-muted">Upload new image to replace</small>
                            </div>

                            <!-- NAME + CATEGORY -->
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Product Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $product->name) }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Category</label>
                                    <select name="category" class="form-select" required>
                                        <option value="men" {{ old('category', $product->category) == 'men' ? 'selected' : '' }}>Men</option>
                                        <option value="women" {{ old('category', $product->category) == 'women' ? 'selected' : '' }}>Women</option>
                                    </select>
                                </div>

                            </div>

                            <!-- PRICE -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Price (₹)</label>
                                <input type="number" step="0.01" name="price" class="form-control"
                                    value="{{ old('price', $product->price) }}" required>
                            </div>
                            <!-- STOCK -->
                            <div class="mb-3">
                                <label>Stock</label>
                                <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
                            </div>
                            <!-- DESCRIPTION -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" class="form-control"
                                    rows="4">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <!-- SUBMIT -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary px-5">
                                    <i class="fas fa-save me-2"></i> Update Product
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection