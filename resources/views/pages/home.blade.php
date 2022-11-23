@extends('application')

@section('home')

<!-- Slider -->

	<div class="main_slider">
		<div id="demo" class="carousel slide" data-ride="carousel">

		  	<!-- Indicators -->
		  	<ul class="carousel-indicators">
		    	<li data-target="#demo" data-slide-to="0" class="active"></li>
		    	<li data-target="#demo" data-slide-to="1"></li>
		    	<li data-target="#demo" data-slide-to="2"></li>
		  	</ul>

		  	<!-- The slideshow -->
		  	<div class="carousel-inner" id="carousel">
		    	<div class="carousel-item active">
		      		<img src="{{ asset('images/caroussel/affiche-pc.jpg') }}" class="img-carousel-pc" alt="Los Angeles">
		      		<img src="{{ asset('images/caroussel/affiche-phone.jpg') }}" class="img-carousel-phone" alt="Los Angeles">
		    	</div>
			    <div class="carousel-item">
			      	<img src="{{ asset('images/caroussel/affiche-pc.jpg') }}" class="img-carousel-pc" alt="Chicago">
			      	<img src="{{ asset('images/caroussel/affiche-phone.jpg') }}" class="img-carousel-phone" alt="Chicago">
			    </div>
			    <div class="carousel-item">
			      	<img src="{{ asset('images/caroussel/affiche-pc.jpg') }}" class="img-carousel-pc" alt="New York">
			      	<img src="{{ asset('images/caroussel/affiche-phone.jpg') }}" class="img-carousel-phone" alt="New York">
			    </div>
		  	</div>

		  	<!-- Left and right controls -->
		  	<a class="carousel-control-prev" href="#demo" data-slide="prev">
		    	<span class="carousel-control-prev-icon"></span>
		  	</a>
		  	<a class="carousel-control-next" href="#demo" data-slide="next">
		    	<span class="carousel-control-next-icon"></span>
		  	</a>
		</div>
	</div>

	<div class="main_slider-1"></div>

	<div class="main_slider-2">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
						@guest
					<div class="informer">
							Nous vous livrons les articles de qualités à domicile partout à Kinshasa, et vous offre une remise de 3% sur la totalité de vos 5 achats au 5ème achat en créant votre compte pour passer vos commandes en toutes sécurité enfin de bénéficier de remises en boucle. Exemple :<br>
							Achat 1 = 100$ payer 100$<br>
							Achat 2 = 100$ payer 100$<br>
							Achat 3 = 100$ payer 100$<br>
							Achat 4 = 100$ payer 100$<br>
							Achat 5 = 100$ - (500$/100) * 3 font 15$ payer 85$<br>
							<strong>NB: En boucle</strong>
						@endguest

						@auth
							@if((Auth::user()->role_id == 1) OR (Auth::user()->role_id == 2))
							@else
								<div class="informer">
									Nous vous livrons les articles de qualités à domicile partout à Kinshasa, et vous offre une remise de 3% sur la totalité de vos 5 achats au 5ème achat en créant votre compte pour passer vos commandes en toutes sécurité enfin de bénéficier de remises en boucle. Exemple :<br>
									Achat 1 = 100$ payer 100$<br>
									Achat 2 = 100$ payer 100$<br>
									Achat 3 = 100$ payer 100$<br>
									Achat 4 = 100$ payer 100$<br>
									Achat 5 = 100$ - (500$/100) * 3 font 15$ payer 85$<br>
									<strong>NB: En boucle</strong>
								</div>
							@endif
							@if(Auth::user()->role_id == 1)
							<div class="main_slider_content">
								<h6 class="h6">Ajoutez un article</h6>
								<!--h1>Livraison gratuit à domocile</h1><br><br>
								<h1>Obtenez jusqu'à 10% de réduction de 5ème achat</h1-->
								@include('layouts.article.form_ajout')
								
							</div>
						@endif
					@endauth
				</div>
			</div>
		</div>
	</div>


	<!-- Banner -->

	<div class="banner">
		<div class="container">
			<div class="row">
			</div>
		</div>
	</div>

	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			@if(Route::is('index'))
				<div class="row">
					<div class="col text-center">
						<div class="section_title new_arrivals_title">
							<h2>Les produits dans la boutique</h2>
						</div>
					</div>
				</div>
			@endif
			<!--div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">Tout</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">femmes</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">accessoirs</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">hommes</li>
						</ul>
					</div>
				</div>
			</div-->
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						@forelse($articles as $article)
							@include('pages.article.articles')
						@empty
							<div class="no-article">
								<h3>Aucun article pour l'instant</h3>
							</div>
						@endforelse

					</div>
					<div class="div-paginate">
						{{ $articles->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="best_sellers">
		
	</div>

	<!-- Benefit -->

	

	<!-- Blogs -->

	<div class="blogs">
		<!--div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">
						<h2>Latest Blogs</h2>
					</div>
				</div>
			</div>
			<div class="row blogs_container">
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url(images/blog_1.jpg)"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title">Here are the trends I see coming this fall</h4>
							<span class="blog_meta">by admin | dec 01, 2017</span>
							<a class="blog_more" href="#">Read more</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url(images/blog_2.jpg)"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title">Here are the trends I see coming this fall</h4>
							<span class="blog_meta">by admin | dec 01, 2017</span>
							<a class="blog_more" href="#">Read more</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url(images/blog_3.jpg)"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title">Here are the trends I see coming this fall</h4>
							<span class="blog_meta">by admin | dec 01, 2017</span>
							<a class="blog_more" href="#">Read more</a>
						</div>
					</div>
				</div>
			</div>
		</div-->
	</div>

@endsection