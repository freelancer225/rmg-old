<nav class="menu">
    <ul class="main_menu">
        <li class=" {{ Request::is('/') ? 'sale-noti' : '' }}"><a href="{{url('/')}}">Accueil</a></li>

        @foreach(App\Models\Categorie::all() as $categorie)
        
	        <li class="{{ Request::segment(2) == $categorie->cat_name ? 'sale-noti' : '' }}"><a href="{{url('/produits')}}/{{$categorie->cat_name}}">{{$categorie->cat_name}}</a>
	        </li>
         @endforeach
         <li class=" {{ Request::is('contact') ? 'sale-noti' : '' }}"><a href="{{url('/contact')}}">Contact</a></li>
    </ul>
</nav>