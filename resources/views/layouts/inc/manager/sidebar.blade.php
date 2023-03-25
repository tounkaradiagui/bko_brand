<nav class="sidebar sidebar-offcanvas"  id="sidebar">
    <ul class="nav" >
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/dashboard')}}">
                <i class="mdi mdi-speedometer menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('admin/orders') ? 'active' : ''}}" href="{{url('admin/orders')}}">
                <i class="mdi mdi-sale menu-icon"></i>
                <span class="menu-title">Commandes</span>
            </a>
        </li>

        <li class="nav-item {{Request::is('admin/category*') ? 'active' : ''}}">
            <a class="nav-link" data-bs-toggle="collapse" href="#category"
                aria-expanded="{{Request::is('admin/category*') ? 'true' : 'false'}}">
                <i class="mdi mdi-view-list menu-icon"></i>
                <span class="menu-title">Catégories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{Request::is('admin/category*') ? 'show' : ''}}" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('admin/category/create') ? 'active' : ''}}" href="{{url('admin/category/create')}}">Ajouter catégorie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('admin/category') || Request::is('admin/category/*/edit')? 'active' : ''}}" href="{{url('admin/category')}}">Voir catégorie</a>
                    </li>
                </ul>
            </div>
        </li>



        <li class="nav-item {{Request::is('admin/products*') ? 'active' : ''}}">
            <a class="nav-link {{Request::is('admin/products') ? 'active' : ''}}" data-bs-toggle="collapse"
            aria-expanded="{{Request::is('admin/products*') ? 'true' : 'false'}}"
             href="#produits">
                <i class="mdi mdi-plus-circle menu-icon"></i>
                <span class="menu-title">Produits</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{Request::is('admin/products*') ? 'show' : ''}}" id="produits">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{Request::is('admin/products/create') ? 'active' : ''}}" href="{{url('admin/products/create')}}">Ajouter produit</a></li>
                    <li class="nav-item"> <a class="nav-link {{Request::is('admin/products') || Request::is('admin/products/*/edit')? 'active' : ''}}" href="{{url('admin/products')}}">Voir produits</a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link {{Request::is('admin/brands') ? 'active' : ''}}" href="{{url('admin/brands')}}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Marques</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{Request::is('admin/colors') ? 'active' : ''}}" href="{{url('admin/colors')}}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Couleur de produits</span>
            </a>
        </li>

        {{-- <li class="nav-item {{Request::is('admin/users*') ? 'active' : ''}}">
            <a class="nav-link {{Request::is('admin/users') ? 'active' : ''}}"
             data-bs-toggle="collapse" href="#users"
             aria-expanded="{{Request::is('admin/users*') ? 'true' : 'false'}}"
             aria-controls="users">
                <i class="mdi mdi-account-multiple-plus menu-icon"></i>
                <span class="menu-title">Utilisateurs</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{Request::is('admin/users*') ? 'show' : ''}}" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('admin/users/create') ? 'active' : ''}}" href="{{url('admin/users/create')}}"> Ajouter </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('admin/users') || Request::is('admin/users/*/edit')? 'active' : ''}}" href="{{url('admin/users')}}"> Voirs la liste</a>
                    </li>
                </ul>
            </div>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link {{Request::is('admin/sliders') ? 'active' : ''}}" href="{{url('admin/sliders')}}">
                <i class="mdi mdi-view-carousel menu-icon"></i>
                <span class="menu-title">Slider d'accueil</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link {{Request::is('admin/settings') ? 'active' : ''}}" href="{{url('admin/settings')}}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Paramètre du site</span>
            </a>
        </li> --}}
    </ul>
</nav>
