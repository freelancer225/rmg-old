@extends('FrontEnd.layouts.default')

@section('content')

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(img/master-slide-03.jpg);">
		<h2 class="l-text2 t-center">
			Panier
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			@if(Cart::count()!="0")
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Produit</th>
							<th class="column-3">Prix</th>
							<th class="column-4 p-l-70">Quantité</th>
							<th class="column-5">Total</th>
							<th class="column-5">Action</th>
						</tr>
						@foreach($data as $produit)
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="{{Config::get('app.url')}}:8000/img/produits/{{$produit->options->img}}" alt="IMG">
								</div>
							</td>
							<td class="column-2">{{$produit->name}}</td>
							<td class="column-3">{{$produit->price}}</td>
							<td class="column-4">
								<input type="hidden" name="" value="{{$produit->rowId}}" id="rowID{{$produit->id}}">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="{{$produit->qty}}" id="upCart{{$produit->id}}">


									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5">
								{{$produit->price * $produit->qty}}
							</td>
							<td>
								<a href="{{url('cart/remove')}}/{{$produit->rowId}}"><span style="display: flex;justify-content: center;width: 20px;height: 20px;border-radius: 50%;background-color: #ba1c23;color: white;font-family: Montserrat-Medium;font-size: 12px;">X</span>
								</a>
							</td>
						</tr>
						@endforeach

						
					</table>
					
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<a class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" href="{{url('/cart')}}">
						mettre à jour
					</a>
				</div>
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Totaux du panier
				</h5>
				

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						{{Cart::subtotal()}}
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Paiement
					</button>
				</div>
			</div>
			@else
				<div class="col-sm-12 col-md-12 col-lg-12 p-b-50 t-center">
					<h2>Ooops</h2><br>
					<img src="{{Config::get('app.url')}}:8000/img/icons/icon-empty.png">
					<br><h2>Désolé votre panier est vide </h3>
				</div>	
			@endif
		</div>
	</section>
@endsection


@section('script')
<script type="text/javascript">
	
	$(document).ready(function(){
		@foreach($data as $produit)
		$("#upCart{{$produit->id}}").on('change keyup', function(){
			
			var newQty = $("#upCart{{$produit->id}}").val();
			var rowID = $("#rowID{{$produit->id}}").val();
			$.ajax({
				url:'{{url('/cart/update')}}',
				data:'rowID=' + rowID + '&newQty=' + newQty,
				type:'get',
				success:function(response){
					console.log(response);
				}
			});
		});
	@endforeach
	});
</script>
@endsection