<div class="main-navbar shadow-sm sticky-top">
        <div class="top-navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                        <h5 class="brand-name">{{$appSetting->website_name ?? 'Mon site web'}}</h5>
                    </div>
                    <div class="col-md-5 my-auto">
                        <form action="{{url('rechercher')}}" method="get" role="search">
                            <div class="input-group">
                                <input type="search" name="rechercher" value="{{Request::get('rechercher')}}" placeholder="Cherchez votre produit ici !" class="form-control" />
                                <button class="btn bg-white" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 my-auto">
                        <ul class="nav justify-content-end">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('cart') }}">
                                    <i class="fa fa-shopping-cart"></i> Panier (<livewire:frontend.cart.cart-count/>)
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('wishlist') }}">
                                    <i class="fa fa-heart"></i> Favoris (<livewire:frontend.wishlist-count/>)
                                </a>
                            </li>

                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                    </li>
                                @endif
                            @else

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{url('monProfil')}}"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="{{url('orders')}}"><i class="fa fa-list"></i> Mes Commandes</a></li>
                                <li><a class="dropdown-item" href="{{url('wishlist')}}"><i class="fa fa-heart"></i> Mes Favoris</a></li>
                                <li><a class="dropdown-item" href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i> Mon Panier</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                           <i class="fa fa-sign-out"></i> {{ __('Déconnexion') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                </li>
                                </ul>
                            </li>
                             @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                    Golden market
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/collections')}}">Catégories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/nouveaux-arrives')}}">Nouveaux arrivés</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/produits-populaire')}}">Produits populaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/produits-eletronics')}}">Electronique</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/fashions')}}">Fashions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/accessoires')}}">Accessoires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/appareils-electronmenagere')}}">Appareils électroménagers</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
