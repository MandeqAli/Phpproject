<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Pharmacy</title>
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
        <!-- Categories Section -->
        <section class="section categories-section">
            <div class="container">
                <h2 class="section-title">Our Popular Categories</h2>
                <div class="categories-grid">
                    <div class="category-item">
                        <div class="cat-img"><img src="https://i.pinimg.com/1200x/f1/37/0f/f1370f8524a17797e01e5ca8fa354f42.jpg" alt="Kidney"></div>
                        <span>Kidney Care</span>
                    </div>
                    <div class="category-item">
                        <div class="cat-img"><img src="https://i.pinimg.com/736x/62/b8/28/62b828650b23e1bb2559aa0058a7c231.jpg" alt="vitamins"></div>
                        <span>Vitamins</span>
                    </div>
                    <div class="category-item">
                        <div class="cat-img"><img src="https://i.pinimg.com/736x/45/f8/f4/45f8f4392d59eca74a239fdd27cc0bf9.jpg" alt="Radiology"></div>
                        <span>Radiology Care</span>
                    </div>
                    <div class="category-item">
                        <div class="cat-img"><img src="https://i.pinimg.com/736x/2d/e2/a3/2de2a3940b7a271e9c19436185002b4d.jpg" alt="Skin"></div>
                        <span>Skin Care</span>
                    </div>
                    <div class="category-item">
                        <div class="cat-img"><img src="https://i.pinimg.com/1200x/c7/8d/42/c78d4255d15009b15377db22a30d8e47.jpg" alt="Pregnant"></div>
                        <span>Pregnant Care</span>
                    </div>
                     <div class="category-item">
                        <div class="cat-img"><img src="https://i.pinimg.com/1200x/2a/93/7d/2a937df7416521d24dfa78fa9bc7bf02.jpg" alt="Eye"></div>
                        <span>Eye Care</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Best Offer Section -->
        <section class="section best-offer-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title left">Todays Best Offer <br><span>Just For You</span></h2>
                    <a href="#" class="see-more">See more ↗</a>
                </div>
                
                <div class="products-grid best-offer-grid">
                   @foreach($bestSellers as $product)
                    <div class="product-card">
                        <div class="card-header">
                            <div class="product-info">
                                <span class="brand-name">{{ $product->name }}</span>
                                <span class="brand-sub">{{ $product->category }}</span>
                            </div>
                            
                            <button class="wishlist-btn">♡</button>
                        </div>
                        <div class="product-image">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="card-footer">
                            <div class="price-box">
                                <span class="price">${{ $product->price }}</span>
                                <span class="old-price">$70.00</span>
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
            </div>
        </section>

        <!-- Seasonal Exclusive Solutions -->
        <section class="section seasonal-section">
            <div class="container">
                <h2 class="section-title">Our Seasonal <br> Exclusive Solutions</h2>
                <div class="banners-grid">
                    <div class="banner-card pink">
                        <div class="banner-text">
                            <h3>Headache And <br> Migraine Solutions</h3>
                            <a href="#">See More ↗</a>
                        </div>
                        <img src="{{ asset('images/user1.png') }}" class="banner-img" alt="Person">
                    </div>
                    <div class="banner-card peach">
                        <div class="banner-text">
                            <h3>Digestive And <br> Stomach Solutions</h3>
                            <a href="#">See More ↗</a>
                        </div>
                         <img src="{{ asset('images/user2.png') }}" class="banner-img" alt="Person">
                    </div>
                    <div class="banner-card yellow">
                        <div class="banner-text">
                            <h3>Cough And <br> Cold Solutions</h3>
                            <a href="#">See More ↗</a>
                        </div>
                         <img src="{{ asset('images/user3.png') }}" class="banner-img" alt="Person">
                    </div>
                </div>
            </div>
        </section>

        <!-- Best Seller Products -->
        <section class="section best-seller-section">
            <div class="container">
                <h2 class="section-title">Our Best Seller Products</h2>
                <div class="products-grid best-seller-grid">
                    @foreach($products->skip(4)->take(12) as $product)
                     <div class="product-card">
                        <div class="card-header">
                            <div class="product-info">
                                <span class="brand-name">{{ $product->name }}</span>
                                <span class="brand-sub">{{ $product->category }}</span>
                            </div>
                            <button class="wishlist-btn">♡</button>
                        </div>
                        <div class="product-image">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
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
                 <div class="center-btn">
                    <a href="{{ route('shop') }}" class="btn-outline">See more ↗</a>
                </div>
            </div>
        </section>

        <!-- Doctors Section -->
        <section class="section doctors-section">
            <div class="container doctors-grid">
                <div class="doctor-card dark-blue">
                    <div class="doc-info">
                        <h3>Dr. Sofia <br> Lowlee</h3>
                        <p>Leading medical specialist with 10+ years experience.</p>
                        <button class="btn-white">Book appointment ↗</button>
                    </div>
                    <img src="{{ asset('images/dr1.png') }}" class="doc-img" alt="Dr. Sofia">
                </div>
                <div class="doctor-card light-ui">
                    <div class="doc-info">
                        <h3>Dr. Shapox <br> Smith</h3>
                        <p>Leading medical specialist with 10+ years experience.</p>
                        <button class="btn-outline-dark">Book appointment ↗</button>
                    </div>
                    <img src="{{ asset('images/dr2.png') }}" class="doc-img" alt="Dr. Smith">
                </div>
            </div>
        </section>

        <!-- Reviews Section -->
        <section class="section reviews-section">
            <div class="container">
                <div class="reviews-header">
                    <h2>4.5/5 review from <br> 7,000+ verified customer</h2>
                    <p>But don't just take our word for it - Here's what our customers have to say about our solutions.</p>
                </div>
                <div class="reviews-grid">
                    <div class="review-card">
                        <div class="stars">★★★★★</div>
                        <p>"The savings are incredible. Being one for perpetually conscious is a great feeling. AFC explained it in a way that made sense."</p>
                        <div class="reviewer">- The John Family</div>
                    </div>
                    <div class="review-card">
                        <div class="stars">★★★★★</div>
                        <p>"The savings are incredible. Being one for perpetually conscious is a great feeling. AFC explained it in a way that made sense."</p>
                        <div class="reviewer">- The John Family</div>
                    </div>
                    <div class="review-card">
                         <div class="stars">★★★★★</div>
                        <p>"The savings are incredible. Being one for perpetually conscious is a great feeling. AFC explained it in a way that made sense."</p>
                        <div class="reviewer">- The John Family</div>
                    </div>
                </div>
            </div>
        </section>

    </main>

   

</body>
</html>
