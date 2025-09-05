<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auréla - Auth</title>
    <link rel="stylesheet" href="{{ asset('landing-page/css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            font-family: 'Playfair Display', serif;
            color: gold;
        }

        .auth-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .auth-card {
            background-color: #111;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .auth-card h1 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .gold-button {
            background-color: gold;
            color: black;
            padding: 0.6rem 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        .gold-button:hover {
            background-color: #d4af37;
        }

        .link {
            color: gold;
            font-size: 0.9rem;
            text-decoration: underline;
        }

        .top-nav {
            position: absolute;
            top: 1rem;
            right: 1.5rem;
        }

        .top-nav a {
            margin-left: 1rem;
            color: gold;
            text-decoration: none;
            font-weight: bold;
        }

        .top-nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    @if (Route::has('login'))
        <div class="top-nav">
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="auth-wrapper">
        <div class="auth-card">
            <h1>Auréla</h1>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
