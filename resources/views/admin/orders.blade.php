<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders - Online Pharmacy</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .container { margin-top: 50px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #f8f9fa; font-weight: 600; }
        .status-pending { color: orange; font-weight: 600; }
        .status-approved { color: green; font-weight: 600; }
        .header-row { display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-row">
            <h1>Customer Orders</h1>
            <a href="{{ route('home') }}" class="btn-primary">Back to Home</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>
                        <strong>{{ $order->user->name }}</strong><br>
                        <small>{{ $order->user->email }}</small><br>
                        <small>Tel: {{ $order->user->phone }}</small><br>
                        <small>Addr: {{ $order->user->address }}</small>
                    </td>
                    <td>{{ $order->product ? $order->product->name : 'Unknown' }}</td>
                    <td>x{{ $order->quantity }}</td>
                    <td>${{ $order->total_price }}</td>
                    <td>
                        <span class="status-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                        @if($order->return_reason)
                            <br><small style="color:red;">Return: {{ $order->return_reason }}</small>
                        @endif
                    </td>
                    <td>
                        @if($order->status == 'pending')
                        <form action="{{ route('admin.orders.ship', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-primary" style="padding: 5px 10px; font-size: 0.8rem;">Ship Now</button>
                        </form>
                        @else
                            {{ $order->updated_at->format('M d') }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
