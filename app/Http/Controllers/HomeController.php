<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
      
        $bestSellers = Product::latest()
            ->take(6)
            ->get();

     
        $products = Product::latest()
            ->take(20)
            ->get();

        return view('home', compact('bestSellers', 'products'));
    }
}
