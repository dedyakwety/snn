@extends('application')

@section('article-show')

<div class="super_container">

	<div class="container single_product_container">
		<div class="row tete">
			<div class="col" id="tete">

				<!-- Breadcrumbs -->
				<h3 class="h3">{{ $article->categorie->categorie }}</h3>
				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a>Catégorie</a></li>
						<li><a><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $article->categorie->categorie }}</a></li>
						<li class="active"><a><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $article->modele->modele }}</a></li>
					</ul>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>
									<li><img src="{{ asset(Storage::url($article->image->path_2)) }}" alt="image" data-image="images/single_1.jp"></li>
									<li class="active"><img src="{{ asset(Storage::url($article->image->path_3)) }}" alt="image" data-image="images/single_2.jpg"></li>
									<li><img src="{{ asset(Storage::url($article->image->path_4)) }}" alt="image" data-image="images/single_3.jpg" class="image-3"></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background">
									<img src="{{ asset(Storage::url($article->image->path_1)) }}" alt="image-pricipale" class="image-principale">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2 class="h2">{{ $article->modele->modele }}</h2>
						<p>{{ $article->commentaire }}</p>
					</div>
					<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
						<span class="ti-truck"></span><span>Livraison à domicile gratuit</span>
					</div>
					<div class="original_price">
						@if($article->prix < 20)
							<span>${{ number_format(((double)$article->prix + (double)$gestion->gain_1) + (((double)$article->prix / 100) * (double)12.5), 2, '.', ' ') }}</span>
						@elseif($article->prix >= 20)
							<span>${{ number_format(((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) + (((double)$article->prix / 100) * 12.5), 2, '.', ' ') }}</span>
						@endif
					</div>
					<div class="product_price">
						@if($article->prix < 20)
							${{ number_format(((double)$article->prix + (double)$gestion->gain_1), 2, '.', ' ') }}
						@elseif($article->prix >= 20)
							${{ number_format((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix, 2, '.', ' ') }}
						@endif
					</div>
					<ul class="star_rating">
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
					</ul>
					<!--div class="product_color">
						<span>Selectionner la Coleur:</span>
						<ul>
							<li style="background: #e54e5d"></li>
							<li style="background: #252525"></li>
							<li style="background: #60b3f3"></li>
						</ul>
					</div-->
					<!--div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Quantité:</span>
						<div class="quantity_selector">
							<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
							<span id="quantity_value">1</span>
							<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
						</div>
						<div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
					</div-->
					@guest
						<form action="{{ route('Panier.store') }}" method="POST" class="div-infos">
					@endguest
					@auth
						@if(Auth::user()->role_id == 5)
							<form action="{{ route('Panier.store') }}" method="POST" class="div-infos">
						@elseif(Auth::user()->role_id == 1)
							<form action="{{ route('Articles.update', $article->id) }}" method="POST" class="div-infos">
							@method('PUT')
							@if(Session::has('succes'))
							<p>{{ Session::get('succes') }}</p>
							@endif
							@if(Session::has('erreur'))
							<p>{{ Session::get('erreur') }}</p>
							@endif
						@endif
					@endauth
						@csrf
						@auth
							@if(Auth::user()->role_id == 5)
								@if(($article->categorie->id == 1) OR ($article->categorie->id == 2))
									<div class="infos">
										<div class="infos-1">
											@if($article->categorie->categorie == "chaussure")
												Pointure
											@else
												Taille
											@endif
										</div>
										<div class="infos-2">
											<select name="taille" id="heure_livraison"  required>
												<option>
													@if($article->categorie->categorie == "chaussure")
														Pointure
													@else
														Taille
													@endif
												</option>
												@if(($article->categorie->id == 1) && ((($article->modele->modele == "veste") === false) && (($article->modele->modele == "pantalon") === false)))
													@foreach($tailles_1 as $taille)
														<option value="{{ $taille }}">{{ $taille }}</option>
													@endforeach
												@elseif(($article->categorie->id == 2) OR (($article->modele->modele == "veste") === true) OR (($article->modele->modele == "pantalon") === true))
													@foreach($tailles_2 as $taille)
														<option value="{{ $taille }}">{{ $taille }}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>
								@endif
								<div class="infos">
									<div class="infos-1">
										Quantité
									</div>
									<!-- C'est pour utiliser l'id -->
										<input type="text" name="id_article" value="{{ $article->id }}" class="id_article" required>
									<div class="infos-2">
										<input type="number" name="quantite" id="input" min="1" value="1" required>
									</div>
								</div>
							@elseif(Auth::user()->role_id == 1)

								<select name="pour" id="heure_livraison" required>
									<option value="{{ $article->pour->id }}">{{ $article->pour->pour }}</option>
									@foreach($pours as $pour)
										@if($article->pour->pour == $pour->pour)
										@else
										<option value="{{ $pour->id }}">{{ $pour->pour }}</option>
										@endif
									@endforeach
								</select>

								<select name="categorie" id="heure_livraison" required>
									<option value="{{ $article->categorie->id }}">{{ $article->categorie->categorie }}</option>
									@foreach($categories as $categorie)
										@if($article->categorie->categorie == $categorie->categorie)
										@else
										<option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
										@endif
									@endforeach
								</select>

								<select name="modele" id="heure_livraison" required>
									<option value="{{ $article->modele->id }}">{{ $article->modele->modele }}</option>
									@foreach($modeles as $modele)
										@if($article->modele->modele == $modele->modele)
										@else
										<option value="{{ $modele->id }}">{{ $modele->modele }}</option>
										@endif
									@endforeach
								</select>
								<input type="number" name="prix" id="input" value="{{ $article->prix }}" required>
								<textarea name="commentaire" class="form-control com" required>{{ $article->commentaire }}</textarea>
								<input type="password" name="password" class="form-control" placeholder="Mot de passe" required>

							@endif
						@endauth
						@guest
						<input type="text" name="id_article" value="{{ $article->id }}" id="input" class="id_article" required>
						<div class="infos">
							<div class="infos-1">
								Quantité
							</div>
							<div class="infos-2">
								<input type="number" name="quantite" id="input" value="1" min="1" required>
							</div>
						</div>
						<div class="infos">
							<div class="infos-1">
								@if($article->categorie->categorie == "chaussure")
									Pointure
								@else
									Taille
								@endif
							</div>
							<div class="infos-2">
								<select name="taille" id="heure_livraison" required>
									<option>
										@if($article->categorie->categorie == "chaussure")
											Pointure
										@else
											Taille
										@endif
									</option>
									@if(($article->categorie->id == 1) && (($article->modele->modele == "veste") === false))
										@foreach($tailles_1 as $taille)
											<option value="{{ $taille }}">{{ $taille }}</option>
										@endforeach
									@elseif(($article->categorie->id == 2) OR (($article->modele->modele == "veste") === true))
										@foreach($tailles_2 as $taille)
											<option value="{{ $taille }}">{{ $taille }}</option>
										@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="infos">
							<div class="infos-1">
								Date et heure
							</div>
							<div class="infos-2">
								<input id="date1" type="date" name="date_livraison"  placeholder="m/dd/yy" id="date_livraison" class="date_heure" date-input required>
								<select name="heure_livraison" id="heure_livraison" class="date_heure" required>
									<option>Heure</option>
									<option value="08H00 à 08H30">08H00 à 08H30</option>
									<option value="08H30 à 09H00">08H30 à 09H00</option>
									<option value="09H00 à 09H30">09H00 à 09H30</option>
									<option value="09H30 à 10H00">09H30 à 10H00</option>
									<option value="10H00 à 10H30">10H00 à 10H30</option>
									<option value="10H30 à 11H00">10H30 à 11H00</option>
									<option value="11H00 à 11H30">11H00 à 11H30</option>
									<option value="11H30 à 12H00">11H30 à 12H00</option>
									<option value="12H00 à 12H30">12H00 à 12H30</option>
									<option value="12H30 à 13H00">12H30 à 13H00</option>
									<option value="13H00 à 13H30">13H00 à 13H30</option>
									<option value="13H30 à 14H00">13H30 à 14H00</option>
									<option value="14H00 à 14H30">14H00 à 14H30</option>
									<option value="14H30 à 15H00">14H30 à 15H00</option>
									<option value="15H00 à 15H30">15H00 à 15H30</option>
									<option value="15H30 à 16H00">15H30 à 16H00</option>
									<option value="16H00 à 16H30">16H00 à 16H30</option>
								</select>
							</div>
						</div>
						<div class="infos">
							<div class="infos-1">
								Télephone 
							</div>
							<div class="infos-2">
								<input type="tel" name="contact" id="input" placeholder="0813896978" required>
							</div>
						</div>
						<div class="infos">
							<div class="infos-1">
								Email
							</div>
							<div class="infos-2">
								<input type="email" name="email" id="input" placeholder="email facultatif">
							</div>
						</div>
						<div class="comment">
							<div class="infos-comment-1">
								Adresse la livraison
							</div>
							<div class="infos-comment-2">
								<textarea name="adresse_livraison" id="adresse_livraison" cols="30" rows="10" class="commentaire form-control" placeholder="adresse de la livraison avec réference"></textarea>
							</div>
						</div>
						<div class="infos">
							<div id="infos-2">
								<button type="submit" class="btn btn-primary">
									Commander
								</button>
							</div>
						</div>
						@endguest
						@auth
							@if((Auth::user()->role_id == 1) OR (Auth::user()->role_id == 5))
								<div class="infos">
									<div class="infos-1"></div>
									<div id="infos-2">
										<button type="submit" class="btn">
											@if(Auth::user()->role_id == 1)
												Mettre à jour
											@elseif(Auth::user()->role_id == 5)
												Ajouter dans le panier
											@endif
										</button>
									</div>
								</div>
							@endif
						@endauth
					
					</form>

					<!--div class="div-buttun">
						<div class="red_button add_to_cart_button"><a href="#">Ajouter panier</a></div>
						<div class="red_button add_to_cart_button"><a href="#">Commander</a></div>
					</div-->
				</div>
			</div>
		</div>

	</div>

</div>

@endsection