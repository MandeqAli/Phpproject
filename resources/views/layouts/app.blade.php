<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
</head>
<link rel="stylesheet" href="{{asset('Bootstrap/bootstrap.css')}}">
<style>
    body{
        font-family: 'Segeo UI', sans-serif;
        /* overflow: hidden; */
    }
    .hero{
        background:linear-gradient(90deg,#e8f0ff,#fdecec);
        border-radius:20px;
        padding:60px;
    }
    .category-card img{
        border-radius:12px;
    }
    .product-card{
        border-radius:16px;
    }
</style>
<body>
    <!-- NavBar -->
     <nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
        <div class="container">
            <a href="{{route('home')}}" class="navbar-brand fw-bold">Pharmacy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ms-auto gap-3">
                    <li class="nav-item"><a  class="nav-link" href="{{route('home')}}">Home</a></li>
                     <li class="nav-item"><a class="nav-link"  href="{{route('product')}}">Product</a></li>
                      <li class="nav-item"><a  class="nav-link" href="{{route('about')}}">About</a></li>
                       <li class="nav-item"><a  class="nav-link" href="{{route('contact')}}">contact</a></li>
                </ul>
            </div>
        </div>
     </nav>
     <!-- Page Content -->
      @yield('content')

      <!-- Footer -->
       <div class="bg-light mt-5 py-4">
        <div class="container text-center">
            <small>@ {{ date('y')}} Pharmacy. All rights reserved</small>
        </div>
       </div>
</body>
</html>


