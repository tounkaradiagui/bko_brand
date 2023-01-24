<nav class="sidebar sidebar-offcanvas"  id="sidebar">
  <ul class="nav" >
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/dashboard')}}">
        <i class="mdi mdi-speedometer menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/orders')}}">
        <i class="mdi mdi-sale menu-icon"></i>
        <span class="menu-title">Commandes</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#categories" >
        <i class="mdi mdi-view-list menu-icon"></i>
        <span class="menu-title">Catégories</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="categories">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="{{url('admin/category/create')}}">Ajouter catégorie</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/category')}}">Voir catégorie</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#produits">
        <i class="mdi mdi-plus-circle menu-icon"></i>
        <span class="menu-title">Produits</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="produits">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/products/create')}}">Ajouter produit</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('admin/products')}}">Voir produits</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/brands')}}">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">Marques</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/colors')}}">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">Couleur de produits</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
        <i class="mdi mdi-account-multiple-plus menu-icon"></i>
        <span class="menu-title">Utilisateurs</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="users">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Ajouter </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Voirs la liste</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/sliders')}}">
        <i class="mdi mdi-view-carousel menu-icon"></i>
        <span class="menu-title">Slider d'accueil</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/settings')}}">
        <i class="mdi mdi-settings menu-icon"></i>
        <span class="menu-title">Paramètre du site</span>
      </a>
    </li>
  </ul>
</nav>