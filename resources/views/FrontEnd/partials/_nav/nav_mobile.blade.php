<nav class="side-menu">
    <ul class="main-menu">
        <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
            <span class="topbar-child1-mobile">
                Tous pour la construction de vos maisons
            </span>
        </li>

        <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
            <div class="topbar-child2-mobile">
                <span class="topbar-email-mobile">
                    gbeliafabrice@gmail.com
                </span>

            </div>
        </li>

        <li class="item-topbar-mobile p-l-10">
            <div class="topbar-social-mobile">
                <a href="#" class="topbar-social-item-mobile fa fa-facebook"></a>
                <a href="#" class="topbar-social-item-mobile fa fa-instagram"></a>
                <a href="#" class="topbar-social-item-mobile fa fa-youtube-play"></a>
            </div>
        </li>
        <li class="item-menu-mobile {{ Request::is('/') ? 'sale-noti' : '' }}"><a href="{{url('/')}}">Accueil</a></li>

        @foreach(App\Models\Categorie::all() as $categorie)
        
        <li class="item-menu-mobile {{ Request::segment(2) == $categorie->cat_name ? 'sale-noti' : '' }}"><a href="{{url('/produits')}}/{{$categorie->cat_name}}">{{$categorie->cat_name}}</a>
        </li>
        @endforeach
        <li class=" {{ Request::is('contact') ? 'sale-noti' : '' }}"><a href="{{url('/contact')}}">contact</a></li>
    </ul>
</nav>