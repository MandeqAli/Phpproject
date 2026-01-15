<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
      
        $products = Product::all();

        
        $bestSellers = Product::take(4)->get();

        return view('product', compact('products', 'bestSellers'));
    }

    public function shop()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }
}