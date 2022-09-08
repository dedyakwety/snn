@extends('application')

@section('body-boutique')

	<div class="boutique">
		<h2>{{ count($boutiques) }} Boutiques</h2>

		<div>
			@if(Session::has('succes'))
				<p>{{ Session::get('succes') }}</p>
			@endif
			@if(Session::has('erreur'))
				<p>{{ Session::get('erreur') }}</p>
			@endif
			<form action="{{ route('boutique_store') }}" class="form-group" method="POST">
				@csrf
				<input type="text" name="nom_boutique" class="form-control" placeholder="Nom Boutique"required>
				<input type="tel" name="contact_boutique" class="form-control" placeholder="Contact Whatsapp" required>
				<input type="password" name="password" class="form-control" placeholder="Password" required>
				<button class="btn btn-primary">Ajouter Boutique</button>
			</form>
		</div>
		<div>
			@forelse($boutiques as $boutique)
				<p>
					{{ $boutique->nom." ".$boutique->contact_whatsapp }}
					<a href="{{ route('boutique_articles', $boutique->nom) }}">
						Articles
					</a>
				</p>
			@empty
			<h2>Aucune boutique disponoble pour l'instant</h2>
			@endforelse
		</div>
	</div>

@endsection