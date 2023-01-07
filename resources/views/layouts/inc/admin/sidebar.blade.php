<nav class="sidebar sidebar-offcanvas"  id="sidebar">
  <ul class="nav" >
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/dashboard')}}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/forms/basic_elements.html">
        <i class="mdi mdi-sale menu-icon"></i>
        <span class="menu-title">Ventes</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="categories">
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
      <a class="nav-link" data-bs-toggle="collapse" href="#produits" aria-expanded="false" aria-controls="produits">
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
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">Utilisateurs</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/sliders')}}">
        <i class="mdi mdi-chart-pie menu-icon"></i>
        <span class="menu-title">Slider d'accueil</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="documentation/documentation.html">
        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
        <span class="menu-title">Paramètre du site</span>
      </a>
    </li>
  </ul>
</nav>