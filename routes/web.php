<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Frontend
Route::get('/', [ProductController::class, 'index']);

// Auth
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'dashboard']);

    // Products
    Route::get('/admin/products', [ProductController::class, 'adminIndex']);
    Route::get('/admin/products/create', [ProductController::class, 'create']);
    Route::post('/admin/products/store', [ProductController::class, 'store']);
    Route::get('/admin/products/edit/{product}', [ProductController::class, 'edit']);
    Route::put('/admin/products/update/{product}', [ProductController::class, 'update']);
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy']);

    // Users
    Route::get('/admin/users', [AdminController::class, 'usersIndex']);
    Route::delete('/admin/users/delete/{user}', [AdminController::class, 'userDestroy']);
});