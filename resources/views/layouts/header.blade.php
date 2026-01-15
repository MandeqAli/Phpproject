    <header class="header">
        <div class="container header-container">
            <div class="logo">Pharma<span>Store</span></div>
            <nav class="nav">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('shop') }}">Shop</a>
                @auth
                    <a href="{{ route('cart.index') }}">Cart</a>
                    <a href="{{ route('orders.my') }}">My Orders</a>
                @endauth
            </nav>
            <div class="header-icons">
                 @guest
                    <a href="{{ route('login') }}" class="btn-primary">GetStarted</a>
                @else
                    <span style="font-weight: 500;">Hi, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="icon-btn" style="font-size: 0.9rem; margin-left: 10px;">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </header>
