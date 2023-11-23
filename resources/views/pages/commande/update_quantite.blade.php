@extends('application')

@section('commande_quantite_view')
	<div class="div-form">
		<form action="{{ route('update_commande') }}" method="POST" class="form">
			@csrf
			<h2>Quannnntité</h2>
			<input type="number" name="quantite" value="{{ $commande->quantite }}" min="1" id="input" class="form-control">
			<select name="taille" class="form-control" id="input">
				<option value="{{ $commande->taille }}">{{ $commande->taille }}</option>
				@if(($article->categorie_id == 1) && (($article->modele->modele == "veste") OR ($article->modele->modele == "pantalon")))
					@foreach($taille_2 as $taille)
						<option value="{{ $taille }}">{{ $taille }}</option>
					@endforeach
				@else
					@foreach($taille_1 as $taille)
						<option value="{{ $taille }}">{{ $taille }}</option>
					@endforeach
				@endif
			</select>
			<input type="number" name="id_commande" value="{{ $commande->id }}" class="id_livraison">
			<input type="number" name="id_livraison" value="{{ $livraison->id }}" class="id_livraison">
			<div class="div-boutton">
				<a href="{{ route('commande_index', ['id' => $livraison->id]) }}" class="btn" id="btn">Annuler</a>	<button type="submit" class="btn" id="btn">Modifier</button>
			</div>
		</form>
	</div>
@endsection