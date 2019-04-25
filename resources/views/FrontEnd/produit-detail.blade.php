@extends('FrontEnd.layouts.default')

@section('content')
<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="{{Config::get('app.url')}}:8000/img/produits/{{$produits[0]->prod_img}}">
							<div class="wrap-pic-w">
								<img src="{{Config::get('app.url')}}:8000/img/produits/{{$produits[0]->prod_img}}" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					{{$produits[0]->prod_name}}
				</h4>

				<span class="m-text17">
					{{$produits[0]->prod_price}} FCFA
				</span>

				<!--  -->
				<div class="p-t-33 p-b-60">

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<a class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" href="{{url('/cart/add')}}/{{$produits[0]->id}} ">
									Commander
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8">Categories: {{$produits[0]->cats->cat_name}}</span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						{!!$produits[0]->prod_desc!!}
					</div>
				</div>

				

				
			</div>
		</div>
	</div>
	@endsection


