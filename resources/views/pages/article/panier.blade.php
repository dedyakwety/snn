@extends('application')

@section('panier')
<?php
use App\Models\Articles;
?>
	<div class="container single_product_container">
		@if(count($commandes))
			<div class="row pt-3 pb-3">
				<div class="col">

					<!-- Breadcrumbs -->

					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li>
								<p class="p_total">Panier {{ " ".count($commandes).", " }} quantité {{ " ".$commandes->sum('quantite') }}, total : ${{ number_format($prix_total, 2, '.', ' ') }}</p>
							</li>
						</ul>
					</div>

				</div>
			</div>
		@endif

		<div class="row">
			@forelse($commandes as $commande)

				<div class="col-lg-7">
					<div class="single_product_pics">
						<div class="row">
							<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
								<div class="single_product_thumbnails">
									<ul>
										<li><img src="{{ asset(Storage::url(articles::find($commande->article->id)->image->path_2)) }}" alt="" data-image="images/single_1.jpg"></li>
										<li class="active"><img src="{{ asset(Storage::url(articles::find($commande->article->id)->image->path_3)) }}" alt="" data-image="images/single_2.jpg"></li>
										<li><img src="{{ asset(Storage::url(articles::find($commande->article->id)->image->path_4)) }}" alt="" data-image="images/single_3.jpg"></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-9 image_col order-lg-2 order-1" id="ordre-2">
								<div class="single_product_image">
									<div class="single_product_image_background">
										<img src="{{ asset(Storage::url(articles::find($commande->article->id)->image->path_1)) }}" alt="image-pricipale" class="image-principale">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="product_details">
						<div class="product_details_title">
							<h2 class="h2">{{ Articles::find($commande->article->id)->modele->modele }}</h2>
							<p>{{ $commande->article->commentaire }}</p>
						</div>
						<div class="div-infos">
							<div class="infos">
								<div class="infos-1">
									Taille
								</div>
								<div class="infos-2">
									<p class="p-prix">{{ $commande->taille }}</p>
								</div>
							</div>
						</div>
						<div class="div-infos">
							<div class="infos">
								<div class="infos-1">
									Prix Unitaire
								</div>
								<div class="infos-2">
									<p class="p-prix">
										@if($commande->article->prix < 20)
											${{ number_format(((double)$commande->article->prix + $gestion->gain_1), 2, '.', ' ') }}
										@elseif($commande->article->prix >= 20)
											${{ number_format((((double)$commande->article->prix / 100) * (double)$gestion->gain_2) + (double)$commande->article->prix, 2, '.', ' ') }}
										@endif
									</p>
								</div>
							</div>
						</div>
						<div class="div-infos">
							<div class="infos">
								<div class="infos-1">
									Quantité
								</div>
								<div class="infos-2">
									<p class="p-prix">{{ $commande->quantite }}</p>
								</div>
							</div>
						</div>
						<div class="div-infos">
							<div class="infos">
								<div class="infos-1">
									Prix Total
								</div>
								<div class="infos-2">
									<p class="p-prix">
										@if($commande->article->prix < 20)
											${{ number_format((double)$commande->prix_total, 2, '.', ' ') }}
										@elseif($commande->article->prix >= 20)
											${{ number_format((double)$commande->prix_total, 2, '.', ' ') }}
										@endif
									</p>
								</div>
							</div>
						</div>
						<div class="div-infos">
							<div class="infos-boutton">
									<a href="{{ route('Panier.edit', $commande->id) }}">
										<button type="submit" class="btn_panier" id="btn-liv">
											<span class="glyphicon glyphicon-pencil"></span> Modifier
										</button>
									</a>
									<form action="{{ route('Panier.destroy', $commande->id) }}" method="POST">
										@csrf
										@method('DELETE')
											<button type="submit" id="btn_panier_2" class="btn btn-default btn-sm" id="btn-liv"><span class="glyphicon glyphicon-trash"></span> Suprimer
											</button>
									</form>
							</div>
						</div>
						
					</div>
				</div>

			@empty
				@if(Session::has('succes'))
					<div class="panier-vide">
						<div class="div-accueil">
							{{ Session::get('succes') }}
							<a href="{{ route('index') }}" class="accueil">Accueil</a>
						</div>
					</div>
				@else
					<div class="panier-vide">
						<div class="div-accueil">
							<h2>Le parnier est vide!</h2>
							<a href="{{ route('index') }}" class="accueil">Accueil</a>
						</div>
					</div>
				@endif
			@endforelse
			@if(count($commandes))
				<div class="div-infos-commande">
					<form action="{{ route('Livraison.store') }}" method="POST" class="form">
						@csrf
						<h2 class="h2-info">Informations pour la livraison</h2>
						<div class="infos-liv">
							<div class="infos-liv-1">
								Date et heure
							</div>
							<div class="infos-liv-2">
								<input id="date1" type="date" placeholder="MM/DD/YYYY" name="date_livraison" class="input-form" data-input required />
								<select name="heure_livraison" class="input-form" placeholder="date" required>
									<option>HEURE</option>
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
						<div class="commentaire">
							<div class="commentaire-texte">
								Adresse livraison
							</div>
							<div class="com">
								<textarea name="adresse_livraison" class="text" min="50" max="200" placeholder="Adresse" required id="commentaire"></textarea>
							</div>
						</div>
						<div class="infos-button">
							<button type="submit" class="boutton" id="boutton">Valider la Commande</button>
						</div>
					</form>
				</div>
			@endif
		</div>

	</div>

@endsection