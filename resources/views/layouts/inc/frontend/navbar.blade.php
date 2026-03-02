<nav class="navbar navbar-expand-lg premium-navbar fixed-top">
    <div class="container-fluid">

        <!-- Hamburger animé -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#premiumMenu">
            <span class="hamburger"></span>
        </button>

        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-4" href="{{ url('/') }}">
            Diagui<span>Shop</span>
        </a>

        <!-- Desktop Search -->
        <form class="d-none d-lg-flex mx-auto search-premium" action="{{ url('rechercher') }}" method="get">
            <input type="search" name="rechercher" value="{{ Request::get('rechercher') }}"
                placeholder="Rechercher un produit...">
            <button type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>

        <!-- Right Icons -->
        <div class="d-flex align-items-center gap-3">

            <a href="{{ url('wishlist') }}" class="icon-premium">
                <i class="bi bi-heart"></i>
            </a>

            <a href="{{ url('cart') }}" class="icon-premium position-relative">
                <i class="bi bi-cart3"></i>
                <span class="badge-premium">
                    <livewire:frontend.cart.cart-count />
                </span>
            </a>

            @guest
                <a href="{{ route('login') }}" class="btn btn-dark rounded-pill px-4 d-none d-lg-block">
                    Connexion
                </a>
            @endguest

        </div>

    </div>
</nav>

<!-- OFFCANVAS MOBILE -->
<div class="offcanvas offcanvas-start premium-offcanvas" tabindex="-1" id="premiumMenu">

    <div class="offcanvas-header">
        <h5 class="fw-bold">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">

        <!-- Mobile Search -->
        <form action="{{ url('rechercher') }}" method="get" class="mb-4">
            <input type="search" name="rechercher" placeholder="Rechercher..." class="form-control rounded-pill">
        </form>

        <ul class="navbar-nav">

            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ url('cart') }}">
                    🛒 Mon Panier
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ url('wishlist') }}">
                    ❤️ Mes Favoris
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ url('/contact') }}">
                    Contact
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ url('/a-propos-de-nous') }}">
                    À Propos
                </a>
            </li>

            @guest
                <li class="nav-item mt-3">
                    <a class="btn btn-dark w-100 rounded-pill" href="{{ route('login') }}">
                        Connexion
                    </a>
                </li>
            @endguest

        </ul>

    </div>
</div>
