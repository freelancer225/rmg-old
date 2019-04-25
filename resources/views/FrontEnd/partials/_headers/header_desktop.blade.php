
            <div class="topbar">
                <div class="topbar-social">
                    <a href="#" class="topbar-social-item fa fa-facebook"></a>
                    <a href="#" class="topbar-social-item fa fa-instagram"></a>
                    <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                </div>

                <span class="topbar-child1">
                    Tout pour la construction de votre maison
                </span>

                <div class="topbar-child2">
                    <span class="topbar-email">
                       gbebliafabrice@gmail.com
                    </span>
                </div>
            </div>

            <div class="wrap_header">
                <!-- Logo -->
                <a href="{{url('/')}}" class="logo">
                    <img src="{{Config::get('app.url')}}:8000/img/logo.png">
                </a>

                <!-- Menu -->
                <div class="wrap_menu">
                    @include('FrontEnd.partials._nav.nav_desktop')
                </div>

                <!-- Header Icon -->
                <div class="header-icons">

                    <span class="linedivide1"></span>

                    <div class="header-wrapicon2">
                        <img src="{{config::get('app.url')}}:8000/img/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti" id="noti">{{Cart::count()}}</span>
                        
                        <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                           
                            @foreach($data as $produit)
                            <ul class="header-cart-wrapitem">

                                <li class="header-cart-item">
                                    <a href="{{url('cart/remove')}}/{{$produit->rowId}}"><div class="header-cart-item-img"><img src="{{Config::get('app.url')}}:8000/img/produits/{{$produit->options->img}}" alt="IMG">
                                        
                                    </div></a>

                                    <div class="header-cart-item-txt">
                                        <a href="#" class="header-cart-item-name">
                                            {{$produit->name}}
                                        </a>

                                        <span class="header-cart-item-info">
                                            {{$produit->qty}} x {{$produit->price}} FCFA
                                        </span>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                            @if(Cart::count() != 0)
                            <div class="header-cart-total">
                                {{Cart::subtotal()}} FCFA
                            </div>
                            @endif
                            

                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->

                                    <a href="{{url('/cart')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        Panier
                                    </a>
                                </div>
                                @if(Cart::count() != 0)
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        Paiement
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        