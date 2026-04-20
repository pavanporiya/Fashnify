<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
// ✅ Search Suggestions
Route::get('/search-suggestions', [App\Http\Controllers\ProductController::class, 'suggestions']);

// ✅ Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// ✅ Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');


// ✅ Cart
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

// About
Route::view('/about', 'frontend.about')->name('about');

// Categories
Route::get('/men', [ProductController::class, 'menProducts']);
Route::get('/women', [ProductController::class, 'womenProducts']);

// Auth
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

// Admin
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'dashboard']);
    
    Route::get('/admin/products', [ProductController::class, 'adminIndex']);
    Route::get('/admin/products/create', [ProductController::class, 'create']);
    Route::post('/admin/products/store', [ProductController::class, 'store']);
    Route::get('/admin/products/edit/{product}', [ProductController::class, 'edit']);
    Route::put('/admin/products/update/{product}', [ProductController::class, 'update']);
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy']);
});