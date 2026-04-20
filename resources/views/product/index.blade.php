@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <h2 class="mb-4">All Products</h2>

        <!-- FILTER BAR -->
        <form method="GET" action="{{ route('products.index') }}" class="row g-3 align-items-center mb-4">

            <!-- Search -->
            <div class="col-md-4 position-relative">
                <input type="text" name="search" id="searchInput" value="{{ request('search') }}" class="form-control"
                    placeholder="🔍 Search products..." autocomplete="off">

                <!-- Suggestions Dropdown -->
                <div id="suggestionsBox" class="list-group position-absolute w-100 shadow"
                    style="z-index: 1000; display: none;">
                </div>
            </div>

            <!-- Category -->
            <div class="col-md-3">
                <select name="category" class="form-select" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    <option value="men" {{ request('category') == 'men' ? 'selected' : '' }}>Men</option>
                    <option value="women" {{ request('category') == 'women' ? 'selected' : '' }}>Women</option>
                </select>
            </div>

            <!-- Sort -->
            <div class="col-md-3">
                <select name="sort" class="form-select" onchange="this.form.submit()">
                    <option value="">Sort By</option>
                    <option value="low-high" {{ request('sort') == 'low-high' ? 'selected' : '' }}>
                        Price: Low → High
                    </option>
                    <option value="high-low" {{ request('sort') == 'high-low' ? 'selected' : '' }}>
                        Price: High → Low
                    </option>
                </select>
            </div>

            <!-- Reset Button -->
            <div class="col-md-2">
                <a href="{{ route('products.index') }}" class="btn btn-light">
                    Reset
                </a>
            </div>

        </form>

        <!-- PRODUCTS GRID -->
        <div class="row g-4">

            @forelse($products as $product)
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm">

                        <!-- IMAGE -->
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                            style="height: 250px; object-fit: cover;">

                        <!-- INFO -->
                        <div class="card-body text-center">
                            <h6>{{ $product->name }}</h6>

                            <p class="text-success mb-2">
                                ₹{{ $product->price }}
                            </p>

                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark">
                                View
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h4>No products found</h4>
                </div>
            @endforelse

        </div>

        <!-- PAGINATION -->
        <div class="mt-4">
            {{ $products->links() }}
        </div>

    </div>
@endsection
@section('scripts')
<script>
let debounceTimer;

const input = document.getElementById('searchInput');
const box = document.getElementById('suggestionsBox');

input.addEventListener('keyup', function () {
    const query = this.value;

    clearTimeout(debounceTimer);

    if (query.length < 2) {
        box.style.display = 'none';
        return;
    }

    debounceTimer = setTimeout(() => {
        fetch(`{{ url('/search-suggestions') }}?query=${query}`)
            .then(res => res.json())
            .then(data => {
                box.innerHTML = '';

                if (!data.length) {
                    box.innerHTML = `<div class="list-group-item">No results</div>`;
                } else {
                    data.forEach(item => {
                        box.innerHTML += `
                            <a href="/products/${item.id}" 
                               class="list-group-item list-group-item-action">
                                ${item.name}
                            </a>
                        `;
                    });
                }

                box.style.display = 'block';
            })
            .catch(err => console.error(err));
    }, 300);
});

// FIXED CLICK OUTSIDE
document.addEventListener('click', function(e) {
    if (!input.contains(e.target) && !box.contains(e.target)) {
        box.style.display = 'none';
    }
});
</script>
@endsection