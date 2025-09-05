<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Auréla</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('landing-page/assets/favicon.ico') }}" />
    <link href="{{ asset('landing-page/css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .text-gold { color: #d4af37 !important; }
        .bg-gold { background-color: #d4af37 !important; }
        .btn-outline-gold {
            border: 1px solid #d4af37;
            color: #d4af37;
        }
        .btn-outline-gold:hover {
            background-color: #d4af37;
            color: black;
        }
        .border-gold {
            border: 2px solid #d4af37 !important;
        }
    </style>
</head>
<body class="bg-black text-white">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black shadow-sm">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand text-gold fw-bold" href="{{ route('home') }}">Auréla</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link text-gold" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-gold" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link text-gold" href="{{ route('shop') }}">Shop</a></li>
                    <li class="nav-item"><a class="nav-link text-gold fw-bold" href="{{ route('cart.index') }}">Cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Cart Section -->
    <div class="container py-5">
        <h2 class="text-gold mb-4 text-center">Your Shopping Cart</h2>

        @if(session('cart') && count(session('cart')) > 0)
            <table class="table table-dark table-striped table-bordered border-gold">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $details)
                        @php
                            $subtotal = $details['price'] * $details['quantity'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td class="text-white">{{ $details['name'] }}</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control me-2" style="width: 80px;">
                                    <button class="btn btn-sm btn-outline-gold">Update</button>
                                </form>
                            </td>
                            <td>₱{{ number_format($details['price'], 2) }}</td>
                            <td>₱{{ number_format($subtotal, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-end">
                <h4 class="text-gold">Total: ₱{{ number_format($total, 2) }}</h4>
            </div>
        @else
            <div class="alert alert-warning text-center">
                Your cart is empty.
            </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="py-4 bg-black text-white text-center">
        <div class="container">
            &copy; {{ date('Y') }} Auréla
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
