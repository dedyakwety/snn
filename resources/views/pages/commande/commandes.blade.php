@extends('application')

@section('commandes-client')
	<div class="div-commandes">
		<div class="div-infos">
			{{ "Client : ".$client->prenom." ".$client->name }}<br>
			{{ "Numéro : ".$client->numero->numero }}<br>
			{{ "Nombre d'achat : ".$livraisons->count() }}<br>
			{{ "Nombre de remise : ".count($remise) }}
		</div>
		<table>
			<tr>
				<th>Nº</th>
				<th>Date</th>
				<th>Heure</th>
				<th>Quantité</th>
				<th>Montant</th>
				<th>Remise</th>
				<th>Beneficier11</th>
				@if(Auth::user()->role_id == 5)
					<th>Facture</th>
				@endif
			</tr>
			@forelse($livraisons as $livraison)
				@if($livraison->montant_remise > 0)
					<tr id="remise">
				@else
					<tr>
				@endif
					<td>{{ $numero-- }}</td>
					<td>{{ $livraison->date_livraison }}</td>
					<td>{{ $livraison->heure_livraison }}</td>
					<td>{{ $livraison->nombre_article }}</td>
					<td>{{ $livraison->prix_total }}</td>
					<td>{{ $livraison->remise }}</td>
					@if($livraison->montant_remise > 0)
						<td>{{ $livraison->montant_remise }}</td>
					@else
						<td>-</td>
					@endif
					@if(Auth::user()->role_id == 5)
						<td>
							<a href="{{ route('viewFacture', ['id' => $livraison->id]) }}" class="a-facture">
								facture
							</a>
						</td>
					@endif
				</tr>
			@empty
			@endforelse
		</table>
		<div class="div-paginate">
			{{ $livraisons->links() }}
		</div>
	</div>
@endsection