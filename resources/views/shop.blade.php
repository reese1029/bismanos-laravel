<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Auréla</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('landing-page/assets/favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('landing-page/css/styles.css') }}" rel="stylesheet" />
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
        .border-gold { border: 3px solid #d4af37 !important; }
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
            <button class="btn btn-outline-gold" data-bs-toggle="modal" data-bs-target="#cartModal">
                <i class="bi-cart-fill me-1"></i>
                Cart <span class="badge bg-gold text-black ms-1 rounded-pill" id="cart-count">0</span>
            </button>
        </div>
    </div>
</nav>

<!-- Header -->
<header class="bg-black py-5 text-white text-center">
    <div class="container">
        <h1 class="display-4 fw-bolder text-gold">Shop in Style</h1>
        <p class="lead fw-normal text-white-50">Discover elegance in every detail with our exclusive ring collection</p>
    </div>
</header>

<!-- Products -->
<section class="py-5">
    <div class="container px-4 px-lg-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @php
                $products = [
                    ['img' => 'r1.jpg', 'title' => '18k Gold Diamond Engagement Ring', 'price' => 2000],
                    ['img' => 'r2.jpg', 'title' => '18 Carat Gold Infinite Style Engagement Ring', 'price' => 1200],
                    ['img' => 'r3.jpg', 'title' => '14k 1/8 ct Diamond Semi-Mount Engagement Ring', 'price' => 3400],
                    ['img' => 'r4.jpg', 'title' => 'Round Cathedral Rose Gold Engagement Ring', 'price' => 2300],
                    ['img' => 'r5.jpg', 'title' => 'Classic Stone Prong Rose Gold Diamond Engagement Ring', 'price' => 2500],
                    ['img' => 'r6.jpg', 'title' => 'Round Cut Diamond Eternity Style Engagement Ring', 'price' => 4200],
                    ['img' => 'r7.jpg', 'title' => '14K White Gold Straight Diamond Engagement Ring', 'price' => 2000],
                    ['img' => 'r8.jpg', 'title' => '1/4 ct tw Round 14K White Gold Engagement Ring', 'price' => 3100],
                    ['img' => 'r9.jpg', 'title' => '14K White Gold Diamond Engagement Ring', 'price' => 4200],
                ];
            @endphp

            @foreach($products as $product)
                <div class="col">
                    <div class="card h-100 border-gold">
                        <img src="{{ asset('landing-page/img/' . $product['img']) }}" class="card-img-top" alt="{{ $product['title'] }}">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">{{ $product['title'] }}</h5>
                            <p class="text-dark">${{ $product['price'] }}</p>
                            <button class="btn btn-outline-gold add-to-cart"
                                data-name="{{ $product['title'] }}"
                                data-price="{{ $product['price'] }}">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-gold">
            <div class="modal-header bg-black text-gold">
                <h5 class="modal-title">Shopping Cart</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="cart-items">
                <p class="text-muted">Your cart is empty.</p>
            </div>
            <div class="modal-footer justify-content-end">
                <strong class="me-auto">Total: $<span id="cart-total">0</span></strong>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="py-5 bg-black text-white text-center">
    <div class="container">&copy; Auréla</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const cartItemsDiv = document.getElementById("cart-items");
    const cartCount = document.getElementById("cart-count");
    const cartTotal = document.getElementById("cart-total");

    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    function updateCartUI() {
        if (cart.length === 0) {
            cartItemsDiv.innerHTML = "<p class='text-muted'>Your cart is empty.</p>";
            cartCount.textContent = "0";
            cartTotal.textContent = "0";
            return;
        }

        let total = 0;
        cartItemsDiv.innerHTML = `
            <ul class="list-group mb-3">
                ${cart.map((item, i) => {
                    total += parseFloat(item.price);
                    return `
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            ${item.name} - $${item.price}
                            <button class="btn btn-sm btn-danger" onclick="removeFromCart(${i})">Remove</button>
                        </li>
                    `;
                }).join("")}
            </ul>
        `;
        cartCount.textContent = cart.length;
        cartTotal.textContent = total.toFixed(2);
        localStorage.setItem("cart", JSON.stringify(cart));
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        updateCartUI();
    }

    document.querySelectorAll(".add-to-cart").forEach(btn => {
        btn.addEventListener("click", () => {
            const name = btn.getAttribute("data-name");
            const price = btn.getAttribute("data-price");
            cart.push({ name, price });
            updateCartUI();
        });
    });

    window.addEventListener("load", updateCartUI);
</script>
</body>
</html>
