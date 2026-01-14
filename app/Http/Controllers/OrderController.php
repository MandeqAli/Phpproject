<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Checkout (Place Order from Cart)
    public function checkout()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        if($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Cart is empty');
        }

        foreach($cartItems as $item) {
            Order::create([
                'user_id' => Auth::id(),
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->product->price * $item->quantity,
                'status' => 'pending'
            ]);
        }

        // Clear Cart
        Cart::where('user_id', Auth::id())->delete();

        \App\Models\ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'Checkout',
            'details' => 'User placed an order from cart.',
            'ip_address' => request()->ip()
        ]);

        return redirect()->route('orders.my')->with('success', 'Order placed successfully!');
    }

    // User's Order History
    public function myOrders()
    {
        $orders = Order::with('product')->where('user_id', Auth::id())->latest()->get();
        return view('orders.my', compact('orders'));
    }

    // Return Order
    public function returnOrder(Request $request, $id)
    {
        $order = Order::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        
        $request->validate([
            'reason' => 'required|string'
        ]);

        $order->update([
            'status' => 'returned',
            'return_reason' => $request->reason
        ]);

        \App\Models\ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'Return Order',
            'details' => "Order #{$id} returned. Reason: {$request->reason}",
            'ip_address' => $request->ip()
        ]);

        return redirect()->back()->with('success', 'Return request submitted.');
    }

    // Admin view
    public function index()
    {
        $orders = Order::with(['user', 'product'])->latest()->get();
        return view('admin.orders', compact('orders'));
    }
    
    // Admin Ship Order
    public function ship(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'shipped']);

        \App\Models\ActivityLog::create([
            'user_id' => Auth::id(), 
            'action' => 'Ship Order',
            'details' => "Order #{$id} marked as shipped.",
            'ip_address' => $request->ip()
        ]);

        return redirect()->back()->with('success', 'Order marked as shipped.');
    }

    // Reset System (Clear All Data)
    public function resetSystem()
    {
        Order::truncate();
        Cart::truncate();
        \App\Models\ActivityLog::truncate();
        
        return redirect()->route('home')->with('success', 'System reset! All previous orders and logs cleared.');
    }
}
