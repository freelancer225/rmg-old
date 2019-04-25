@extends('FrontEnd.layouts.default')

@section('content')
		<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(img/master-slide-03.jpg);">
		<h2 class="l-text2 t-center">
			Contactez Nous
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<div class="contact-map size21" style="padding-right: 25px !important;">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.2615266951857!2d-3.9730166847087425!3d5.3770373960998405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1ecb43e76f7fb%3A0x4eba9319b69c4b69!2sABRI2000+EMERAUDE+4%2C+Abidjan!5e0!3m2!1sfr!2sci!4v1556117825534!5m2!1sfr!2sci" width="500" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<form class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Laissez un message
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Nom">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Telephone">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Envoyez
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection