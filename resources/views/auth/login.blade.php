<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Online Pharmacy</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .auth-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 40px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background: #f9f9f9;
        }
        .submit-btn {
            width: 100%;
            background: var(--text-dark, #2a3b55);
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
        }
        .error {
            color: red;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <h2>Login</h2>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required autocomplete="new-password">
            </div>
            <button type="submit" class="submit-btn">Login</button>
        </form>
        <p style="margin-top: 20px;">Don't have an account? <a href="{{ route('register') }}" style="color: blue;">Register</a></p>
    </div>
</body>
</html>
