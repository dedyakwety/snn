
	<div id="demo" class="main_slider carousel slide" data-ride="carousel">

	  	<!-- Indicators -->
	  	<ul class="carousel-indicators">
	    	<li data-target="#demo" data-slide-to="0" class="active"></li>
	    	<li data-target="#demo" data-slide-to="1"></li>
	    	<li data-target="#demo" data-slide-to="2"></li>
	  	</ul>

	  	<!-- The slideshow -->
	  	<div class="carousel-inner" id="caroussel-1">
	    	<div class="carousel-item active">
	      		<img src="images/caroussel/AFFICHE.jpg" alt="Los Angeles" class="image-caroussel-1">
	    	</div>
	    	<div class="carousel-item">
	      		<img src="images/caroussel/AFFICHE.jpg" alt="Los Angeles" class="image-caroussel-1">
	    	</div>
	    	<div class="carousel-item">
	      		<img src="images/caroussel/AFFICHE.jpg" alt="Los Angeles" class="image-caroussel-1">
	    	</div>
	  	</div>
	  	<div class="carousel-inner" id="caroussel-2">
	    	<div class="carousel-item active">
	      		<img src="images/caroussel/AFFICHE-RESPONSIVE.jpg" alt="Los Angeles" class="image-caroussel-2">
	    	</div>
	    	<div class="carousel-item">
	      		<img src="images/caroussel/AFFICHE-RESPONSIVE.jpg" alt="Los Angeles" class="image-caroussel-2">
	    	</div>
	    	<div class="carousel-item">
	      		<img src="images/caroussel/AFFICHE-RESPONSIVE.jpg" alt="Los Angeles" class="image-caroussel-2">
	    	</div>
	  	</div>

	  	<!-- Left and right controls -->
	  	<a class="carousel-control-prev" href="#demo" data-slide="prev">
	    	<span class="carousel-control-prev-icon"></span>
	  	</a>
	  		<a class="carousel-control-next" href="#demo" data-slide="next">
	    	<span class="carousel-control-next-icon"></span>
	  	</a>

		<!--div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
					<div class="main_slider_content">
						
					</div>
				</div>
			</div>
		</div-->
	</div>

	<div class="banner">
		<div class="container">
			<div class="row">

			</div>
		</div>
	</div>

	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<!--div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Les produits dans la boutique</h2>
					</div>
				</div>
			</div-->
			<!--div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">Tout</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".homme">Homme</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">Femme</li>
						</ul>
					</div>
				</div>
			</div-->
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<!-- Product 1 -->
						@forelse($articles as $article)
						
						<a href="{{ route('Articles.show', $article->id) }}">
							@if($article->pour->id == 1)
							<div class="product-item homme">
							@elseif($article->pour->id == 2)
							<div class="product-item women">
							@elseif($article->pour->id == 3)
							<div class="product-item accessories">
							@endif
								<div class="product discount product_filter">
									<div class="product_image">
										<img src="{{ asset('public/'.Storage::url($article->image->path_1)) }}" alt="image-article" class="image_article">
									</div>
									<div class="favorite favorite_left"></div>
									@auth
									<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
										<span>
											rémise
											@if($article->prix < 20)
												{{ number_format((((double)$article->prix + (double)$gestion->gain_1) / 100) * (double)$gestion->remise, 2, '.', ' ') }}
											@elseif($article->prix >= 20)
												{{ number_format((((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) / 100) * (double)$gestion->remise, 2, '.', ' ') }}
											@endif
										</span>
										
									</div>
									@endauth
									<div class="product_info">
										<h6 class="product_name">{{ $article->commentaire }}</h6>
										<div class="product_price">
											@auth
												@if(Auth::user()->role_id == 1)
													@if($article->prix < 20)
														Achat : ${{ number_format($article->prix, 2, '.', ' ') }}<br>
														Vente : ${{ number_format(((double)$article->prix + $gestion->gain_1), 2, '.', ' ') }}<br>
														Gain : ${{ number_format((((double)$article->prix + $gestion->gain_1) - (double)$article->prix), 2, '.', ' ') }}
														<!--span>{{ number_format(((double)$article->prix + $gestion->gain_1) + (((double)$article->prix / 100) * (double)12.5), 2, '.', ' ') }}</span-->
													@elseif($article->prix >= 20)
														Achat : ${{ number_format((double)$article->prix, 2, '.', ' ') }}<br>
														Vente : ${{ number_format((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix, 2, '.', ' ') }}<br>
														Gain : ${{ number_format(((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) - (double)$article->prix, 2, '.', ' ') }}
														<!--span>${{ number_format(((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) + (((double)$article->prix / 100) * 12.5), 2, '.', ' ') }}</span-->
													@endif
												@else
													@if($article->prix < 20)
														${{ number_format(((double)$article->prix + $gestion->gain_1), 2, '.', ' ') }}
														<span>{{ number_format(((double)$article->prix + $gestion->gain_1) + (((double)$article->prix / 100) * (double)12.5), 2, '.', ' ') }}</span>
													@elseif($article->prix >= 20)
														${{ number_format((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix, 2, '.', ' ') }}
														<span>${{ number_format(((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) + (((double)$article->prix / 100) * 12.5), 2, '.', ' ') }}</span>
													@endif
												@endif
											@endauth
											@guest
												@if($article->prix < 20)
													${{ number_format(((double)$article->prix + $gestion->gain_1), 2, '.', ' ') }}
													<span>{{ number_format(((double)$article->prix + $gestion->gain_1) + (((double)$article->prix / 100) * (double)12.5), 2, '.', ' ') }}</span>
												@elseif($article->prix >= 20)
													${{ number_format((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix, 2, '.', ' ') }}
													<span>${{ number_format(((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) + (((double)$article->prix / 100) * 12.5), 2, '.', ' ') }}</span>
												@endif
											@endguest
										</div>
									</div>
								</div>
								<!--div class="red_button add_to_cart_button"><a href="#">Ajouter dans le panier</a></div-->
							</div>
						</a>
						@empty
						<h1>Autcun article disponisple pour l'instant</h1>
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

	<div class="benefit">
		<div class="div-icon">dddf</div>
		<div class="div-icon"></div>
		<div class="div-icon"></div>
		<!--div class="row benefit_row">
			<div class="icon">
				<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i><br>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_content">
						<h6>Livraison gratuit</h6>
						<p>à domicile (na ndaku)</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>Paiement à domicile par :</h6>
						<p>espèce, electronique(Orange money, M-pesa, Airtel money et UBA 004 525 68 85)</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>Commandez chaque jour 24h/24h dans en ligne</h6>
						<p></p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>6 jours de livraison :</h6>
						<p>du lundi au vendredi de 08h' à 15h30' et samedi de 08h' à 13h'</p>
					</div>
				</div>
			</div>
		</div-->
	</div>