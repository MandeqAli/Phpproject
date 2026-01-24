<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [ProductController::class, 'index'])->name('product');

Route::get('/shop', [ProductController::class, 'shop'])->name('shop');

// Static pages
Route::get('/about', fn () => view('about'))->name('about');
use App\Http\Controllers\ContactController;

// show contact page




Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');




// User Auth (DON'T TOUCH)
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Cart (user)
Route::get('cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::post('cart/add', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::post('cart/update/{id}', [CartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::post('cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');

// Orders (user)
Route::post('checkout', [OrderController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::get('my-orders', [OrderController::class, 'myOrders'])->name('orders.my')->middleware('auth');
Route::post('order/return/{id}', [OrderController::class, 'returnOrder'])->name('order.return')->middleware('auth');

// If you still want /logins page, keep it with different name
Route::get('/logins', fn () => view('logins'))->name('logins');


// ================= ADMIN LOGIN =================

// admin login page
Route::get('/login_admin', [AdminAuthController::class, 'showLoginForm'])->name('login.admin');
Route::post('/login_admin', [AdminAuthController::class, 'login'])->name('login.admin.submit');


// admin logout
Route::post('/logout_admin', [AdminAuthController::class, 'logout'])
    ->name('logout.admin');




// ✅ ADMIN PROTECTED PAGES (ONLY ADMIN)
Route::get('/dashboard', fn () => view('dashboard'))
    ->name('dashboard')
    ->middleware('admin');

Route::get('/customers', [OrderController::class, 'customers'])
    ->name('customers')
    ->middleware('admin');

Route::get('/order_details', [OrderController::class, 'confirmed'])
    ->name('order.details')
    ->middleware('admin');

// (admin actions)
Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus'])
    ->name('orders.status')
    ->middleware('admin');

Route::post('/orders/{id}/delete', [OrderController::class, 'destroy'])
    ->name('orders.delete')
    ->middleware('admin');
