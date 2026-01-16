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

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

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



// / update status
Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.status');

// delete order
Route::post('/orders/{id}/delete', [OrderController::class, 'destroy'])->name('orders.delete');

// // (optional) if you want row click to open order details later
// Route::get('/orders/show', [OrderController::class, 'show'])->name('orders.show');

Route::get('/order_details', [OrderController::class, 'confirmed'])->name('order.details');



Route::get('/logins', function () {
    return view('logins');
})->name('login');


// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Customers
Route::get('/customers', [OrderController::class, 'customers'])->name('customers');

// Messages
Route::get('/messages', function () {
    return view('messages');
})->name('messages');

