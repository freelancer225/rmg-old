<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Admin</a>
  </div>
  <div id="navbar" class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li class=" {{ Request::is('home') ? 'active' : '' }}"><a href="{{url('/home')}}">Dashboard</a></li>
      <li class="{{ Request::is('admin/produit') ? 'active' : '' }}"><a href="{{ route('produit.index')}}">Produits</a></li>
      <li class="{{ Request::is('admin/categorie') ? 'active' : '' }}"><a href="{{ route('categorie.index')}}">Categories</a></li>
      <li class="{{ Request::is('admin/settings') ? 'active' : '' }}"><a href="{{url('admin/settings')}}">Paramètres</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><p class="name">{{ Auth::user()->name }}</p></li>
      <li><a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </li>
    </ul>
  </div><!--/.nav-collapse -->
</div>
