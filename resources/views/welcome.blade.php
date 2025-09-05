<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Welcome to Auréla" />
    <title>Welcome - Auréla</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('landing-page/assets/favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{ asset('landing-page/css/styles.css') }}" rel="stylesheet" />
    <style>
        .text-gold {
            color: #d4af37 !important;
        }
        .bg-gold {
            background-color: #d4af37 !important;
        }
        .btn-outline-gold {
            border: 1px solid #d4af37;
            color: #d4af37;
        }
        .btn-outline-gold:hover {
            background-color: #d4af37;
            color: black;
        }
        .border-gold {
            border: 3px solid #d4af37 !important;
        }
        header.bg-black {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black shadow-sm">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand text-gold fw-bold" href="{{ route('welcome') }}">Auréla</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link text-gold {{ request()->routeIs('welcome') ? 'active fw-bold' : '' }}" href="{{ route('welcome') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-gold {{ request()->routeIs('about') ? 'active fw-bold' : '' }}" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link text-gold {{ request()->routeIs('shop') ? 'active fw-bold' : '' }}" href="{{ route('shop') }}">Shop</a></li>
       <li class="nav-item">
  <a class="nav-link text-gold" href="#" 
     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
     Logout
  </a>
</li>
<form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
  @csrf
</form>

                </ul>
                <div class="d-flex gap-2">
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-gold">
                        <i class="bi-cart-fill me-1"></i>
                        Cart <span class="badge bg-gold text-black ms-1 rounded-pill">{{ session('cart_total', 0) }}</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero/Header Section -->
    <header class="bg-black text-white text-center">
        <div class="container px-4 px-lg-5">
            <h1 class="display-4 fw-bolder text-gold">Welcome to Auréla</h1>
            <p class="lead text-white-50 mb-4">Where every ring tells a story of elegance, love, and legacy.</p>
            <a href="{{ route('shop') }}" class="btn btn-outline-gold btn-lg">Start Shopping</a>
        </div>
    </header>

    <!-- Main Content -->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="fw-bolder text-black mb-4">Discover Our Signature Pieces</h2>
            <a href="{{ route('shop') }}">
                <!-- Optional: Add featured product or image here -->
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-black">
        <div class="container">
            <p class="m-0 text-center text-white">&copy; Auréla</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landing-page/js/scripts.js') }}"></script>
</body>
</html>
