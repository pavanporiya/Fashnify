@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Manage Users ({{ $users->total() }})</h2>
            <a href="/admin" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
            </a>
        </div>

        <!-- Search Form -->
        <form method="GET" class="mb-4">
            <div class="row g-3">
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control modern-input"
                        placeholder="Search by name or email..." value="{{ $search ?? '' }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100 btn-modern">
                        <i class="fas fa-search me-1"></i>Search
                    </button>
                </div>
                <div class="col-md-2">
                    <a href="/admin/users" class="btn btn-outline-secondary w-100">
                        Clear
                    </a>
                </div>
            </div>
        </form>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Users Table -->
        <div class="modern-card">
            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td>
                                    <form action="/admin/users/delete/{{ $user->id }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <i class="fas fa-users fa-3x mb-3"></i>
                                    <p>No users found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection