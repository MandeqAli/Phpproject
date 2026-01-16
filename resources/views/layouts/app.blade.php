<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaStore</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('Bootstrap/bootstrap.css') }}">

    <style>
        /* =========================
           GLOBAL
        ========================= */
      /* =========================
   GLOBAL
========================= */
body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #ffffff;
}

* {
    box-sizing: border-box;
}

/* =========================
   NAVBAR
========================= */
.navbar-brand span {
    color: #0d6efd;
}

.nav-link {
    color: #555;
    font-weight: 500;
}

.nav-link:hover,
.nav-link.active {
    color: #000;
}

/* =========================
   HERO
========================= */
.hero {
    background: linear-gradient(90deg, #e8f0ff, #fdecec);
    border-radius: 20px;
    padding: 60px;
}

.hero h1 {
    letter-spacing: -0.5px;
}

.hero img {
    max-height: 380px;
}

/* =========================
   PRODUCT CARDS
========================= */
.product-card {
    border: 1px solid #eaeaea;
    border-radius: 14px;
    background: #fff;
    padding: 10px;
    transition: all 0.2s ease;
}

.product-card img {
    height: 140px;
    object-fit: contain;
    padding: 10px;
}

.product-card h6 {
    font-size: 14px;
    margin-top: 8px;
}

.product-card:hover {
    border-color: #dcdcdc;
    transform: translateY(-3px);
}

/* =========================
   BENEFITS SECTION (FIXED)
========================= */
.benefits-section {
    padding: 70px 0;
}

.benefits-wrapper {
    display: grid;
    grid-template-columns: 1fr 360px 1fr;
    align-items: center;
    gap: 10px;
}

.benefit-list {
    display: flex;
    flex-direction: column;
    gap: 22px;
}

.benefit-list:first-child {
    margin-left: 100px;
}

.benefit-list:last-child {
    margin-left: -7px;
}

.benefit-item {
    display: flex;
    align-items: flex-start;
    gap: 14px;
}

.benefit-icon {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: #fdecec;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
}

.benefit-item h6 {
    margin: 0;
    font-size: 15px;
    font-weight: 600;
}

.benefit-item p {
    margin: 3px 0 0;
    font-size: 13px;
    color: #777;
}

/* center product */
.benefit-product {
    position: relative;
    text-align: center;
}

.benefit-product::before {
    content: "";
    position: absolute;
    width: 300px;
    height: 300px;
    background: #f3f6ff;
    border-radius: 50%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 0;
}

.benefit-product img {
    position: relative;
    z-index: 1;
    max-width: 260px;
        border-radius: 40px;

}

/* =========================
   SEASONAL SOLUTIONS
========================= */
.rounded-4 {
    border-radius: 40px;
    border: 1px solid #eaeaea;
    box-shadow: none !important;
    transition: all 0.2s ease;  
}

/* =========================
   WHY CHOOSE US
========================= */
.shadow-sm {
    box-shadow: none !important;
    border: 1px solid #eaeaea;
    border-radius: 14px;
    transition: all 0.2s ease;
}

.shadow-sm:hover {
    border-color: #dcdcdc;
    transform: translateY(-3px);
}

.shadow-sm h6 {
    font-size: 15px;
}

.shadow-sm p {
    font-size: 13px;
}

/* =========================
   BUTTONS
========================= */
.btn {
    font-weight: 500;
    box-shadow: none !important;
}

.btn-primary {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.btn-primary:hover {
    background-color: #0b5ed7;
    border-color: #0b5ed7;
}

/* =========================
   FOOTER
========================= */
footer {
    background: #f8f9fa;
    border-top: 1px solid #eaeaea;
}

/* =========================
   RESPONSIVE
========================= */
@media (max-width: 991px) {
    .benefits-wrapper {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .benefit-list {
        align-items: center;
        margin: 0 !important;
    }

    .benefit-item {
        max-width: 360px;
    }
    /* .benefit-product img{
        max-width: 150px;
    } */

   .benefit-product::before {
    content: "";
    position: absolute;
    width: 300px;
    height: 300px;
    background: #000000;
    border-radius: 50%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 0;
}

}

@media (max-width: 768px) {
    .hero {
        padding: 40px 25px;
        text-align: center;
    }

    .hero img {
        margin-top: 30px;
    }

    .product-card img {
        height: 120px;
    }
}
/* =========================
   FEATURES SECTION
========================= */
.feature-box {
    background: #ffffff;
    border: 1px solid #eaeaea;
    border-radius: 18px;
    padding: 35px 20px;
    text-align: center;
    height: 100%;
    transition: all 0.25s ease;
    cursor: default;
}

/* BIG CUTE ICON */
.feature-box span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 70px;
    height: 70px;
    font-size: 34px;              /* ⬅ BIG ICON */
    border-radius: 50%;
    background: #f3f6ff;          /* soft pastel */
    margin-bottom: 16px;
}

/* TITLE */
.feature-box h6 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 6px;
}

/* TEXT */
.feature-box p {
    font-size: 13px;
    color: #777;
    margin: 0;
}

/* HOVER EFFECT (CUTE) */
.feature-box:hover {
    transform: translateY(-6px);
    border-color: #d6e0ff;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
}

/* ICON HOVER POP */
.feature-box:hover span {
    background: #e8f0ff;
    transform: scale(1.08);
    transition: all 0.25s ease;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .feature-box {
        padding: 28px 18px;
    }

    .feature-box span {
        width: 60px;
        height: 60px;
        font-size: 28px;
    }
}
.features-title h2 {
    letter-spacing: -0.5px;
}

.features-title p {
    max-width: 520px;
    margin: auto;
    font-size: 14px;
}
/* =========================
   BEST OFFER PRODUCTS
========================= */
.best-offer-section {
    padding: 80px 0;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
}

.section-title {
    font-size: 34px;
    font-weight: 700;
}

.section-title span {
    color: #6f6ad8;
}

.see-more {
    border: 1px solid #e0e0e0;
    padding: 10px 20px;
    border-radius: 30px;
    font-size: 14px;
    text-decoration: none;
    color: #222;
}

/* GRID */
.offer-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 28px;
}

/* CARD */
.offer-card {
    background: #f9fbff;
    border-radius: 22px;
    padding: 22px;
    transition: all 0.25s ease;
}

.offer-card:hover {
    transform: translateY(-6px);
}

/* HEADER */
.offer-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.offer-head h6 {
    font-size: 15px;
    font-weight: 600;
}

.wishlist {
    font-size: 18px;
    cursor: pointer;
}

/* IMAGE */
.offer-image {
    margin: 25px 0;
    text-align: center;
}

.offer-image img {
    max-height: 160px;
    object-fit: contain;
}

/* FOOTER */
.offer-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.price {
    font-size: 20px;
    font-weight: 700;
}

.price span {
    display: block;
    font-size: 13px;
    color: #999;
    text-decoration: line-through;
}

.add-btn {
    background: transparent;
    border: none;
    font-weight: 600;
    cursor: pointer;
    color: #111;
}

/* RESPONSIVE */
@media (max-width: 992px) {
    .offer-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 576px) {
    .offer-grid {
        grid-template-columns: 1fr;
    }
}



    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white py-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">
            Pharma<span>Store</span>
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mx-auto gap-4">
                <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('product') }}">Product</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
            </ul>
            <a class="btn btn-dark rounded-pill px-4" href="#">Get Started</a>
        </div>
    </div>
</nav>

<main class="container my-5">

    <!-- HERO -->
    <div class="hero mb-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold display-5">
                    Trusted Pharmacy <br> For Your Health
                </h1>
                <p class="text-muted mt-3">
                    Quality medicines and healthcare products delivered safely to your home.
                </p>
                <a href="{{ route('product') }}" class="btn btn-primary rounded-pill px-4 mt-3">
                    Shop Now
                </a>
            </div>
            <div class="col-md-6 text-end">
                <img src="{{ asset('images/dr1.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    <!-- PRODUCT BENEFITS SECTION -->
<section class="benefits-section">

    <div class="container">
        <div class="benefits-wrapper">

            <!-- LEFT BENEFITS -->
            <div class="benefit-list">
                <div class="benefit-item">
                    <div class="benefit-icon">❤️</div>
                    <div>
                        <h6>Good For The Heart</h6>
                        <p>Supports cardiovascular health</p>
                    </div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">🩺</div>
                    <div>
                        <h6>Take Care Of Health</h6>
                        <p>Improves overall wellness</p>
                    </div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">💪</div>
                    <div>
                        <h6>Improve Health</h6>
                        <p>Boosts immunity and energy</p>
                    </div>
                </div>
            </div>

            <!-- CENTER PRODUCT -->
            <div class="benefit-product">
                <img src="{{ asset('images/b-60.png') }}" alt="Probiotics">
            </div>

            <!-- RIGHT BENEFITS -->
            <div class="benefit-list">
                <div class="benefit-item">
                    <div class="benefit-icon">👨‍👩‍👧</div>
                    <div>
                        <h6>Take Care Of Family</h6>
                        <p>Safe for all age groups</p>
                    </div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">🦴</div>
                    <div>
                        <h6>Strong Bones</h6>
                        <p>Supports bone strength</p>
                    </div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">🧠</div>
                    <div>
                        <h6>Good Memory</h6>
                        <p>Enhances brain performance</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>


    <div class="features-title text-center mb-4">
        <h2 class="fw-bold">Why Shop With PharmaStore?</h2>
        <p class="text-muted mt-2">Experience the best in online pharmacy with PharmaStore. We prioritize your health and convenience.</p>
    </div>
  <!-- FEATURES -->
<div class="row g-4 my-5">
    <div class="col-md-3">
        <div class="feature-box">
            <span>💊</span>
            <h6>Quality Medicines</h6>
            <p>Certified products</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="feature-box">
            <span>🚚</span>
            <h6>Fast Delivery</h6>
            <p>On-time service</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="feature-box">
            <span>👨‍⚕️</span>
            <h6>Expert Support</h6>
            <p>Licensed pharmacists</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="feature-box">
            <span>🔒</span>
            <h6>Secure Payment</h6>
            <p>Trusted checkout</p>
        </div>
    </div>
</div>


    <section class="section best-offer-section">
    <div class="container">

        <div class="section-header">
            <h2 class="section-title left">
                Todays Best Offer <br>
                <span>Just For You</span>
            </h2>
            <a href="{{ route('product') }}" class="see-more">See more ↗</a>
        </div>

        @if(isset($bestSellers) && $bestSellers->count() > 0)
        <div class="offer-grid">

            @foreach($bestSellers as $product)
            <div class="offer-card">

                <div class="offer-head">
                    <h6>{{ $product->name }}</h6>
                    <span class="wishlist">♡</span>
                </div>

                <div class="offer-image">
                    <img
                        src="{{ !empty($product->image) ? asset($product->image) : asset('images/no-image.png') }}"
                        alt="{{ $product->name }}">
                </div>

                <div class="offer-footer">
                    <div class="price">
                        ${{ $product->price }}
                        <span>$70.00</span>
                    </div>

                    @guest
                        <a href="{{ route('login') }}" class="add-btn">Add to Cart →</a>
                    @else
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button class="add-btn">Add to Cart →</button>
                        </form>
                    @endguest
                </div>

            </div>
            @endforeach

        </div>
        @else
            <p>No best offer products found.</p>
        @endif

    </div>
</section>


    <!-- WHY CHOOSE US -->
    <div class="my-5">
        <h2 class="fw-bold text-center mb-5">Why Choose PharmaStore</h2>
        <div class="row g-4">
            <div class="col-md-3"><div class="why-card"><span>✔</span><h6>Certified</h6><p>Approved medicines</p></div></div>
            <div class="col-md-3"><div class="why-card"><span>🚚</span><h6>Fast</h6><p>Quick delivery</p></div></div>
            <div class="col-md-3"><div class="why-card"><span>👨‍⚕️</span><h6>Experts</h6><p>Professional advice</p></div></div>
            <div class="col-md-3"><div class="why-card"><span>🔒</span><h6>Secure</h6><p>Safe payments</p></div></div>
        </div>
    </div>

</main>

<footer class="py-4">
    <div class="container text-center">
        <small>© {{ date('Y') }} PharmaStore. All rights reserved.</small>
    </div>
</footer>

<script src="{{ asset('Bootstrap/bootstrap.bundle.js') }}"></script>

</body>
</html>
