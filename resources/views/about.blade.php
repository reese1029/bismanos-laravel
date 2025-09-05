<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="About our shop" />
    <title>About Us - Auréla</title>
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
            padding-top: 2rem;
            padding-bottom: 2rem;
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
                  <a class="nav-link text-gold" href="#" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout
                  </a>
                 </li>
             <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
              @csrf
             </form>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-gold" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart <span class="badge bg-gold text-black ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-black">
        <div class="container px-4 px-lg-5 my-4">
            <div class="text-center text-white">
                <h1 class="display-5 fw-bolder text-gold">About Us</h1>
                <p class="lead fw-normal text-white-50 mb-0">
                    Unveiling the elegance, purpose, and people behind every Auréla ring
                </p>
            </div>
        </div>
    </header>

    <!-- About Content Section -->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5">
            <h2 class="fw-bolder mb-4 text-black">Rings that Tell a Story</h2>
            <div class="row align-items-center">
                <div class="col-md-4 mb-4 mb-md-0 text-center">
                    <img src="{{ asset('landing-page/img/CEO.jpg') }}" class="rounded-circle img-fluid shadow-lg border-gold" alt="CEO Photo" />
                    <h5 class="mt-3 fw-bold text-gold">Charisse E. Bismanos</h5>
                    <p class="text-muted mb-0">Chief Executive Officer</p>
                </div>
                <div class="col-md-8">
                    <h3 class="fw-bolder text-black">In Auréla</h3>
                    <p class="lead text-dark">
                        We are devoted to crafting high-quality, elegant rings that celebrate life’s most cherished moments.
                        With a passion for timeless beauty and a commitment to exceptional craftsmanship, we offer a curated
                        collection designed to suit every love story—whether you’re marking a milestone or seeking something
                        truly unforgettable.
                    </p>
                </div>
            </div>

            <h2 class="fw-bolder mt-5 mb-4 text-black">Our Mission</h2>
            <p class="text-dark">
                At Auréla, our mission is to craft rings that celebrate love, milestones, and timeless elegance.
                We believe every piece should be as meaningful as the moment it represents.
                Each ring is thoughtfully designed and carefully selected to reflect exceptional quality, beauty, and lasting value.
            </p>

            <h2 class="fw-bolder mt-5 mb-4 text-black">Why Choose Us?</h2>
            <ul class="text-dark">
                <li>Exquisite collection of handcrafted rings</li>
                <li>Timeless designs for every occasion</li>
                <li>Elegant packaging with secure, on-time delivery</li>
                <li>Excellent customer service support</li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-black">
        <div class="container">
            <p class="m-0 text-center text-white">&copy; Auréla</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landing-page/js/scripts.js') }}"></script>
</body>
</html>
