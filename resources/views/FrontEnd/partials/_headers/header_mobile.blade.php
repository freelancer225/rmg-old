<!-- Logo moblie -->
<a href="index.html" class="logo-mobile">
    <img src="{{Config::get('app.url')}}:8000/img/logo.png" alt="IMG-LOGO">
</a>

<!-- Button show menu -->
<div class="btn-show-menu">
    <!-- Header Icon mobile -->
    <div class="header-icons-mobile">
    

        <span class="linedivide2"></span>

        <div class="header-wrapicon2">
            <img src="{{Config::get('app.url')}}:8000/img/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti">{{Cart::count()}}</span>

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

    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </div>
</div>
