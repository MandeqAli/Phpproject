<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // View Cart
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        $total = 0;
        foreach($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }
        return view('cart.index', compact('cartItems', 'total'));
    }

    // Add to Cart
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $qtyToAdd = $request->quantity ?? 1;

        $cart = Cart::where('user_id', Auth::id())
                    ->where('product_id', $request->product_id)
                    ->first();

        if($cart) {
            $cart->increment('quantity', $qtyToAdd);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $qtyToAdd
            ]);
        }

        \App\Models\ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'Add to Cart',
            'details' => "Product ID {$request->product_id} added/updated in cart.",
            'ip_address' => $request->ip()
        ]);

        return redirect()->route('cart.index');
    }

    // Update Quantity
    public function update(Request $request, $id)
    {
        $cart = Cart::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        $cart->update(['quantity' => $request->quantity]);
        return redirect()->route('cart.index');
    }

    // Remove Item
    public function destroy($id)
    {
        Cart::where('user_id', Auth::id())->where('id', $id)->delete();
        return redirect()->route('cart.index');
    }
}
