<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Online Pharmacy</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('layouts.header')
    
    @if(session('success'))
        <div class="container" style="margin-top: 20px;">
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 10px; border: 1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <main>
        <section class="section">
            <div class="container">
                <h1 class="section-title">All Healthcare Products</h1>

                {{-- FIX: show message if empty --}}
                @if(isset($products) && $products->count() > 0)
                    <div class="products-grid">
                        @foreach($products as $product)
                            <div class="product-card">
                                <div class="card-header">
                                    <div class="product-info">
                                        <span class="brand-name">{{ $product->name }}</span>
                                        <span class="brand-sub">{{ $product->category ?? '' }}</span>
                                    </div>
                                    <button class="wishlist-btn">♡</button>
                                </div>

                                <div class="product-image">
                                    {{-- FIX: fallback image if null/empty --}}
                                    <img
                                        src="{{ !empty($product->image) ? asset($product->image) : asset('images/no-image.png') }}"
                                        alt="{{ $product->name }}"
                                    >
                                </div>

                                <div class="card-footer">
                                    <div class="price-box">
                                        <span class="price">${{ $product->price }}</span>
                                    </div>
                                    @guest
                                        <a href="{{ route('login') }}" class="shop-btn">Add to Cart</a>
                                    @else
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="shop-btn">Add to Cart</button>
                                        </form>
                                    @endguest
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p style="padding: 10px 0;">No products available.</p>
                @endif
            </div>
        </section>
    </main>
</body>
</html>
