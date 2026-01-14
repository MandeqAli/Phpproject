<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Online Pharmacy</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .container { margin-top: 50px; }
        .order-card { background: white; padding: 20px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center; }
        .status { padding: 5px 10px; border-radius: 15px; font-size: 0.8rem; font-weight: 600; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-shipped { background: #d4edda; color: #155724; }
        .status-returned { background: #f8d7da; color: #721c24; }
        .return-form { display: flex; gap: 10px; margin-top: 10px; }
        .return-input { padding: 5px; border: 1px solid #ddd; border-radius: 5px; }
        .btn-return { background-color: #dc3545; color: white; border: none; padding: 5px 15px; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    @include('layouts.header')

    <div class="container">
        <h1>My Orders</h1>
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 10px; margin-bottom: 20px;">{{ session('success') }}</div>
        @endif

        @foreach($orders as $order)
        <div class="order-card">
            <div>
                <h3>{{ $order->product->name }} (x{{ $order->quantity }})</h3>
                <p>Total: ${{ $order->total_price }}</p>
                <p><span class="status status-{{ $order->status }}">{{ ucfirst($order->status) }}</span></p>
                @if($order->status == 'returned')
                    <small>Return Reason: {{ $order->return_reason }}</small>
                @endif
            </div>
            <div>
                @if($order->status == 'shipped' || $order->status == 'pending')
                    <form action="{{ route('order.return', $order->id) }}" method="POST" class="return-form">
                        @csrf
                        <input type="text" name="reason" placeholder="Reason for return" required class="return-input">
                        <button type="submit" class="btn-return">Return Item</button>
                    </form>
                @elseif($order->status == 'returned')
                    <span>Item Returned</span>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
