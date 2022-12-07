@extends('application')

@section('client-index')
	<div class="div-client">
		<h2>
			{{ $nombre_client.' ' }}
				Client
			@if($nombre_client > 1)
				s
			@endif
		</h2>
		<div class="form-recherche">
			<form action="{{ route('client_search') }}" class="form_rech">
				@csrf
				<input type="search" name="q" class="input" placeholder="Numéro">
				<button class="btn btn-primary pt-2" id="btn-recherche">
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
				  	<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
					</svg>
				</button>
			</form>
		</div>
		<div class="clients">
			<table>
				<tr>
					<th>Nº</th>
					<th>Pénom</th>
					<th>Nom</th>
					<th>Numéro</th>
					<th>Plus</th>
					<!--th>Nombre</th>
					<th>Montant</th>
					<th>Rémise</th-->
				</tr>
				<tr>
					@forelse($clients as $client)
						@if($client->livraisons->count() > 0)
							<td>{{ $numero++ }}</td>
							<td>{{ $client->prenom }}</td>
							<td>{{ $client->name }}</td>
							<td>{{ $client->numero->numero }}</td>
							<td>
								<a href="{{ route('Livraison.show', $client->id) }}" class="oeil">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
									  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
									  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</a>
							</td>
							<!--td>{{ $client->livraisons->count() }}</td>
							<td>{{ $client->livraisons->sum('prix_total') }}</td>
							<td>{{ $client->livraisons->count('montant_remise') }}</td-->
							
						@endif
					@empty
					@endforelse
				</tr>
			</table>
		</div>
	</div>
@endsection