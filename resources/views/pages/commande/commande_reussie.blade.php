@extends('application')

@section('body-commande-reussie')

	<div class="div-commade-reussie">
		<div class="div-1">
			Commande réussie avec succès, nous vous contacterons pour vous confirmer la livraison. Votre facture sera disponible dans le plateforme après la livraison le livreur vous apportera la facture lors de la livraisons; Merci!
		</div>
		<div class="div-2">
			<a href="{{ route('index') }}">
				<button class="btn btn-primary" id="btn-com">Rétour à la page d'accueil</button>
			</a>
		</div>
	</div>

@endsection