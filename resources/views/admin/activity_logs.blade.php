<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Logs - Online Pharmacy</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .container { margin-top: 50px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #f8f9fa; font-weight: 600; }
        .header-row { display: flex; justify-content: space-between; align-items: center; }
        .log-time { font-size: 0.85rem; color: #666; }
    </style>
</head>
<body>
    @include('layouts.header')

    <div class="container">
        <div class="header-row">
            <h1>Activity Logs (Database Records)</h1>
            <a href="{{ route('admin.orders') }}" class="btn-primary">View Orders</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Action</th>
                    <th>Details</th>
                    <th>IP Address</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->user ? $log->user->name : 'Guest' }} <br> <small>{{ $log->user ? $log->user->email : '' }}</small></td>
                    <td><span style="font-weight: 600;">{{ $log->action }}</span></td>
                    <td>{{ $log->details }}</td>
                    <td>{{ $log->ip_address }}</td>
                    <td class="log-time">{{ $log->created_at->format('M d, Y H:i:s') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
