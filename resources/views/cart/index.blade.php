<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart - Online Pharmacy</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .cart-container { max-width: 800px; margin: 50px auto; padding: 20px; background: white; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
        .cart-item { display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #eee; padding: 20px 0; }
        .cart-item:last-child { border-bottom: none; }
        .item-info { display: flex; align-items: center; gap: 20px; }
        .item-info img { width: 80px; height: 80px; object-fit: cover; border-radius: 10px; }
        .item-details h4 { margin: 0 0 5px 0; }
        .qty-input { width: 60px; padding: 5px; border-radius: 5px; border: 1px solid #ddd; text-align: center; }
        .total-section { margin-top: 30px; text-align: right; border-top: 2px solid #eee; padding-top: 20px; }
        .total-price { font-size: 1.5rem; font-weight: 700; color: var(--primary-color); }
        .btn-checkout { background-color: var(--primary-color); color: white; padding: 12px 30px; border-radius: 30px; border: none; font-size: 1rem; cursor: pointer; margin-top: 10px; }
        .btn-remove { color: red; background: none; border: none; cursor: pointer; font-size: 0.9rem; }
    </style>
</head>
<body>
    @include('layouts.header')

    <div class="container">
        <div class="cart-container">
            <h2>My Cart</h2>
            @if($cartItems->isEmpty())
                <p>Your cart is empty.</p>
                <a href="{{ route('shop') }}" class="btn-checkout" style="display:inline-block; text-decoration:none;">Go Shopping</a>
            @else
                @foreach($cartItems as $item)
                <div class="cart-item">
                    <div class="item-info">
                        <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}">
                        <div class="item-details">
                            <h4>{{ $item->product->name }}</h4>
                            <p>${{ $item->product->price }}</p>
                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-remove">Remove</button>
                            </form>
                        </div>
                    </div>
                    <div>
                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="qty-input" onchange="this.form.submit()">
                        </form>
                    </div>
                    <div>
                        <strong>${{ $item->product->price * $item->quantity }}</strong>
                    </div>
                </div>
                @endforeach

                <div class="total-section">
                    <p>Total: <span class="total-price">${{ $total }}</span></p>
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-checkout">Place Order (Ship)</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
