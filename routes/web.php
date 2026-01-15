<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Products
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/shop', [ProductController::class, 'shop'])->name('shop');

// Static pages
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/contact', fn () => view('contact'))->name('contact');

// Auth
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Cart
Route::get('cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::post('cart/add', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::post('cart/update/{id}', [CartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::post('cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');

// Orders
Route::post('checkout', [OrderController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::get('my-orders', [OrderController::class, 'myOrders'])->name('orders.my')->middleware('auth');
Route::post('order/return/{id}', [OrderController::class, 'returnOrder'])->name('order.return')->middleware('auth');



Route::get('/login', function () {
    return view('login');
})->name('login');


// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Customers
Route::get('/customers', function () {
    return view('customers');
})->name('customers');

// Messages
Route::get('/messages', function () {
    return view('messages');
})->name('messages');

// Order details
Route::get('/order_details', function () {
    return view('order_details');
})->name('order.details');