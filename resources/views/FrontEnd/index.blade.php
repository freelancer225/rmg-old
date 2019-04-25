@extends('FrontEnd.layouts.default')

@section('content')
    <!-- Slide1 -->
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1" style="background-image: url(img/master-slide-02.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                            Nous allons vous redonner envie de 
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            Faire des travaux
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <!-- Button -->
                            <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Accédez
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item2-slick1" style="background-image: url(img/master-slide-03.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
                            Nous allons vous redonner envie de
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                            Faire des travaux
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                            <!-- Button -->
                            <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Accédez
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item3-slick1" style="background-image: url(img/master-slide-04.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                            Nous allons vous redonner envie de
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                            Faire des travaux
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                            <!-- Button -->
                            <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Accédez
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Banner -->
    <section class="banner bgwhite p-t-40 p-b-40">
        <div class="container">
            <div class="row">
                 @foreach(App\Models\Categorie::all() as $categorie)
                    <div class="col-md-4 col-xs-6 m-l-r-auto">
                        <!-- block1 -->
                       
                        <div class="block1 hov-img-zoom pos-relative m-b-30">
                            <img src="{{Config::get('app.url')}}:8000/img/categories/{{$categorie->cat_img}}" alt="{{$categorie->cat_name}}">

                            <div class="block1-wrapbtn w-size2">
                                <!-- Button -->
                                <a href="{{url('/produits')}}/{{$categorie->cat_name}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                    {{$categorie->cat_name}}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- New Product -->
    <section class="newproduct bgwhite p-t-45 p-b-105">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Nos Produits
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    <?php $countP = 0; ?>
                    @foreach($produits as $produit)
                    
                    <div class="item-slick2 p-l-15 p-r-15">
                        <input type="hidden" id="pro_id<?php echo $countP; ?>" value="{{$produit->id}}">
                        <!-- Block2 -->
                        <div class="block2">

                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="{{Config::get('app.url')}}:8000/img/produits/{{$produit->prod_img}}" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">

                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <a class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" id="cartBtn" href="{{url('/cart/add')}}/{{$produit->id}}">
                                            Commander
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="{{url('/produits')}}/{{$produit->cats->cat_name}}/{{$produit->prod_slug}}" class="block2-name dis-block s-text3 p-b-5">
                                    {{$produit->prod_name}}
                                </a>

                                <span class="block2-price m-text6 p-r-5">
                                    {{$produit->prod_price}} FCFA
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php $countP++; ?>
                    @endforeach
                </div>
            </div>

        </div>
    </section>



@endsection
