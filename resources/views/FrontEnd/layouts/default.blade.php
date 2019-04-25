<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sidy | Tous pour la Construction</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/png" href="{{Config::get('app.url')}}:8000/img/icons/sidy.ico"/>

        <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset ('vendor/select2/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset ('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset ('vendor/animsition/css/animsition.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset ('vendor/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('fonts/themify/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('fonts/elegant-font/html-css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset ('vendor/daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset ('vendor/lightbox2/css/lightbox.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    </head>
    <body>
        <!-- Header -->
        <header class="header1">
            @include('FrontEnd.partials._header')
        </header>
        @yield('content')



        @include('FrontEnd.partials._footer')

            <!-- Back to top -->
        <div class="btn-back-to-top bg0-hov" id="myBtn">
            <span class="symbol-btn-back-to-top">
                <i class="fa fa-angle-double-up" aria-hidden="true"></i>
            </span>
        </div>

        <!-- Container Selection1 -->
        <div id="dropDownSelect1"></div>


        <script type="text/javascript" src="{{ asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>

        <script type="text/javascript" src="{{asset ('vendor/animsition/js/animsition.min.js')}}"></script>

        <script type="text/javascript" src="{{asset ('vendor/bootstrap/js/popper.js')}}"></script>
        <script type="text/javascript" src="{{asset ('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

        <script type="text/javascript" src="{{asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        $('.block2-btn-addcart').each(function(){
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function(){
                swal(nameProduct, "a été ajouté au panier !", "success");
            });
        });
        $('.btn-addcart-product-detail').each(function(){
            var nameProduct = $('.product-detail-name').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");
            });
        });
    </script>

        <script type="text/javascript" src="{{asset('vendor/select2/select2.min.js')}}"></script>
        <script type="text/javascript">
            $(".selection-1").select2({
                minimumResultsForSearch: 20,
                dropdownParent: $('#dropDownSelect1')
            });
        </script>
        @yield('script')
        <script type="text/javascript" src="{{asset('vendor/slick/slick.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/slick-custom.js')}}"></script>

        <script src="{{asset('js/main.js')}}"></script>


    </body>

    
</html>
