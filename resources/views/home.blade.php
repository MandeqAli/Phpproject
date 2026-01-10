@extends('layouts.app')

@section('content')
<div class="container my-5">

    <!-- Hero Section -->
    <div class="hero row align-items-center">
        <div class="col-md-6">
            <h1 class="display-4 fw-bold">Pharmacy</h1>
            <p class="text-muted mt-3">
                Trusted healthcare products delivered to your door.
            </p>
            <a href="{{ route('product') }}" class="btn btn-primary mt-3 px-4">
                Shop Now
            </a>
        </div>

        <div class="col-md-6 text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/2966/2966487.png"
                 class="img-fluid" style="max-height:300px;">
        </div>
    </div>

    <!-- Categories -->
    <div class="mt-5">
        <h3 class="fw-bold mb-4">Our Popular Categories</h3>

        <div class="row g-4">
            @foreach (['Kidney Care','Liver Care','Physiology','Skin Care','Pregnancy'] as $cat)
            <div class="col-md-2 col-6 text-center">
                <div class="category-card">
                    <img src="https://giace.org/wp-content/uploads/2019/08/AdobeStock_171882033.jpeg"
                         class="img-fluid mb-2">
                    <p class="fw-semibold">{{ $cat }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Products -->
    <div class="mt-5">
        <h3 class="fw-bold mb-4">Today's Best Offer</h3>

        <div class="row g-4">
            @for ($i = 1; $i <= 4; $i++)
            <div class="col-md-3">
                <div class="card product-card shadow-sm p-3">
                    <img src="https://giace.org/wp-content/uploads/2019/08/AdobeStock_171882033.jpeg"
                         class="card-img-top">
                    <div class="card-body text-center">
                        <h6 class="fw-semibold">Nature's Bounty</h6>
                        <p class="text-muted">$56.00</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>

</div>
@endsection
