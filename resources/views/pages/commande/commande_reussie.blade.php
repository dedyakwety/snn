@extends('application')

@section('body-commande-reussie')

	<div class="div-commade-reussie">
		<h2>Commande réussie avec succès, nous vous contacterons pour vous confirmé la livraison</h2>
		<h3>Vous aurez la facture lors de la livraison</h3>
		<a href="{{ route('index') }}">
			<button class="btn btn-primary">Rétour à la page d'accueil</button>
		</a>
	</div>

@endsection