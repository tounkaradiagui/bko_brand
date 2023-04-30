<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color: #2874f0;">
    <div class="navbar-brand-wrapper d-flex justify-content-center" style="background-color: #2874f0 ;">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100" >
            <a class="navbar-brand brand-logo text-white" href="{{url('/')}}">
                <!-- <img src="{{asset('admin/images/logogolden.png')}}" alt="logo"/> -->
                Diagui Shop
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{url('admin/dashboard')}}">
                <!-- <img src="{{asset('admin/images/logogolden.png')}}" alt="logo"/> -->
            </a>
            <button class="navbar-toggler navbar-toggler align-self-center text-white" type="button" data-toggle="minimize">
                <span class="mdi mdi-sort-variant"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background-color: #2874f0; color:#fff;">
        {{-- <ul class="navbar-nav mr-lg-4 w-100" >
            <li class="nav-item nav-search d-none d-lg-block w-100">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="search">
                            <i class="mdi mdi-magnify"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
                </div>
            </li>
        </ul> --}}
        <ul class="navbar-nav navbar-nav-right" >
            <li class="nav-item dropdown me-1">
                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="{{url('admin/messages')}}" data-bs-toggle="dropdown">
                    <i class="mdi mdi-message-text mx-0"></i>
                    {{-- <span class="count">2</span> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">

                    <a class="dropdown-item" href="{{url('admin/messages')}}">
                        Répondre les e-mail
                    </a>

                </div>
            </li>
            <li class="nav-item dropdown me-4">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="mdi mdi-bell mx-0"></i>
                    {{-- <span class="count"></span> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                    <a class="dropdown-item" href="{{url('admin/messages')}}">
                        Voir les notifications
                    </a>

                </div>
            </li>
            <li class="nav-item nav-profile dropdown" >
                <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <img src="{{asset('uploads/profile/' .Auth::user()->image)}}" alt="profile"/>
                    <span class="nav-profile-name text-white">{{Auth::user()->prenom}} {{Auth::user()->nom}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    {{-- <a class="dropdown-item" href="{{url('admin/settings')}}">
                        <i class="mdi mdi-settings text-primary"></i>
                        Paramètre
                    </a> --}}

                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout text-primary"></i>{{ __('Déconnexion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center " type="button" data-toggle="offcanvas">
            <span class="mdi text-white mdi-menu "></span>
        </button>
    </div>
</nav>
