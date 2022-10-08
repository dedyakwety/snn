<?php
use App\Models\Articles;
?>
@extends('application')

@section('detaille_commande')
	<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
		
		<div class="div-h2">
			<a href="{{ route('annulation_commande', ['id' => $livraison->id]) }}" class="btn btn-primary">Annuler la commande</a>
		</div>
		@if(Session::has('succes'))
			<div class="message">
				{{ Session::get('succes') }}
			</div>
		@endif 
		<div class="commandes">
			@forelse($commandes as $commande)
				<div class="product-item homme">
				
					<div class="product discount product_filter">
						<div class="product_image">
							<img src="{{ asset(Storage::url(Articles::findOrFail($commande->article_id)->image->path_1)) }}" alt="image-article">
						</div>
						<div class="favorite favorite_left"></div>
						
						<div class="product_info_2">
							<h6 class="product_name" id="price">{{ Articles::findOrFail($commande->article_id)->commentaire }}</h6>
							<div class="product_price" id="price">
								P.U : ${{ $commande->prix_unitaire.", " }}
								Qté : {{ $commande->quantite.", " }}</br>
								P.T : ${{ $commande->prix_total." " }}</br>
								@if(count($commandes) > 1)
									<a href="{{ route('article_delete', ['id' => $commande->id]) }}" class="btn btn-primary" id="a">Retiré</a>
								@endif
								@if($commande->quantite > 1)
									<a href="{{ route('update_commande_view', ['id' => $commande->id]) }}" class="btn btn-primary" id="a">Modifier</a>
								@endif
							</div>
						</div>
					</div>
					<!--div class="red_button add_to_cart_button"><a href="#">Ajouter dans le panier</a></div-->
				</div>
			@empty
				<div class="no-commande">
					<h2>Aucune commande!</h2>
					<a href="{{ route('index') }}" class="btn btn-primary">Accueil</a>
				</div>
			@endforelse
		</div>
	</div>
@endsection