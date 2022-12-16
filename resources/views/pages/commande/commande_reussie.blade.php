@extends('application')

@section('body-commande-reussie')

	<div class="div-commade-reussie">
		<div class="div-1">
			Commande réussie avec succès, nous vous contacterons pour vous confirmé la livraison. Vous aurez la facture lors de la livraisons
		</div>
		<div class="div-2">
			<a href="{{ route('index') }}">
				<button class="btn btn-primary" id="btn-com">Rétour à la page d'accueil</button>
			</a>
		</div>
	</div>

@endsection