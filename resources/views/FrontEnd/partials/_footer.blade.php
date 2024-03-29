<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Nous joindre
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Des questions? Retrouvez-nous à Cocody-angré Rue L100 immeuble CGK Ou vous pouvez nous appelez au (+225) 58432265
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>
				
				<ul>
					@foreach(App\Models\Categorie::all() as $categorie)
        
		        <li class="p-b-9 {{ Request::segment(1) == $categorie->cat_name ? 'sale-noti' : '' }}"><a href="{{url('/')}}/{{$categorie->cat_name}}" class="s-text7">{{$categorie->cat_name}}</a>

		        </li>
		         @endforeach
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Liens
				</h4>

				<ul>
					<li class="p-b-9{{ Request::is('/') ? 'sale-noti' : '' }}"><a class="s-text7" href="{{url('/')}}">Accueil</a>
					</li>
					<li class="p-b-9{{ Request::is('/') ? 'sale-noti' : '' }}"><a class="s-text7" href="{{url('/')}}">Contactez-nous</a>
					</li>
				</ul>
			</div>

			

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="{{config::get('app.url')}}:8000/img/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="{{config::get('app.url')}}:8000/img/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="{{config::get('app.url')}}:8000/img/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>
			<div class="t-center s-text8 p-t-20">
				Copyright © 2019 All rights reserved. | <a href="https://web.facebook.com/fabricegbelia" target="_blank">Fabrice GBELIA</a>
			</div>
		</div>
	</footer>