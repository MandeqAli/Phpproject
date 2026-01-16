<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // TEMP: get products so images show
        $bestSellers = Product::take(6)->get();

        return view('home', compact('bestSellers'));
    }
}
