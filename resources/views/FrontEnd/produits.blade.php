@extends('FrontEnd.layouts.default')

@section('content')
		<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url({{Config::get('app.url')}}:8000/img/master-slide-03.jpg);">
		<h2 class="l-text2 t-center">
			{{$catByUser}}
		</h2>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4 {{ Request::is('/') ? 'sale-noti' : '' }}">
								<a href="{{url('/produits')}}" class="s-text13 active1">
									Tous les produits
								</a>
							</li>

							@foreach(App\Models\Categorie::all() as $categorie)
        
						    <li class="p-t-4 {{ Request::segment(2) == $categorie->cat_name ? 'sale-noti' : '' }}"><a class="s-text13" href="{{url('/produits')}}/{{$categorie->cat_name}}">{{$categorie->cat_name}}</a>
						    </li>
						 @endforeach
						</ul>
						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Rechercher produits...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					
					<!-- Product -->
					<div class="row">
						@if(count($datas)=="0")
						<div class="col-sm-12 col-md-12 col-lg-12 p-b-50 t-center">
							<h2>Ooops</h2><br>
							<img src="{{Config::get('app.url')}}:8000/img/icons/icon-empty.png">
							<br><h2>Désolé aucun produit dans<strong> {{$catByUser}}</strong> </h3>
						</div>	
						
						@else
						
						@foreach($datas as $produit)
						@if($produit->prod_check == "on")

						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							
							<input type="hidden" id="pro_id{{$produit->id}}" value="{{$produit->id}}">
							
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="{{Config::get('app.url')}}:8000/img/produits/{{$produit->prod_img}}" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<a class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" href="{{url('/cart/add')}}/{{$produit->id}}" >
												Commander
											</a>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="{{url('/produits')}}/{{$catByUser}}/{{$produit->prod_slug}}" class="block2-name dis-block s-text3 p-b-5">
										{{$produit->prod_name}}
									</a>

									<span class="block2-price m-text6 p-r-5">
										{{$produit->prod_price}} FCFA
									</span>
								</div>
							</div>
						</div>
						@endif
						@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

@section('script')
	{{-- <script type="text/javascript">
		$(document).ready(function(){

			@foreach(App\Models\Produit::all() as $produit)
			$('#cartBtn{{$produit->id}}').click(function(e){
				e.preventDefault();
				var pro_id{{$produit->id}} = $('#pro_id{{$produit->id}}').val();
				fetch(pro_id{{$produit->id}});

				$.ajax({
					type:'get',
					url:'{{url('/cart/add')}}/'+pro_id{{$produit->id}},
					success:function(response){
					console.log(response);
					}
				})
			})
			@endforeach
		});
	</script> --}}
@endsection

