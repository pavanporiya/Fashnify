@extends('layouts.admin')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between mb-3">
        <h2>Products</h2>
        <a href="/admin/products/create" class="btn btn-primary">+ Add Product</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach($products as $product)
            <tr>

                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" width="60" style="object-fit:cover;">
                    @else
                        No Image
                    @endif
                </td>

                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td>₹{{ $product->price }}</td>

                <td>
                    <a href="/admin/products/edit/{{ $product->id }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="/admin/products/{{ $product->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $products->links() }}

</div>

@endsection