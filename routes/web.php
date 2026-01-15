<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/product', function () {
    return view('product');
})->name('product');


Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');



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