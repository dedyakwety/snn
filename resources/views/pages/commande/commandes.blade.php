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
				<th>Nº1</th>
				<th>Date</th>
				<th>Heure</th>
				<th>Quantité</th>
				<th>Montant</th>
				<th>Remise</th>
				<th>Beneficier</th>
				@if(Auth::user()->role_id == 5)
					<th>Facture</th>
					<th>
						<i class="fa fa-refresh" aria-hidden="true"></i>
					</th>
					<th>
						<i class="fa fa-refresh" aria-hidden="true"></i>
					</th>
				@endif
			</tr>
			
			@forelse($livraisons as $livraison)
				@if(strtotime($livraison->date_livraison) > strtotime(date('Y-m-d')))
					<tr>
				@else
					@if($livraison->montant_remise)
						<tr id="remise">
					@else
						<tr>
					@endif
				@endif
					<td>{{ $numero-- }}</td><!-- C'est une variable-->
					<td>{{ $livraison->date_livraison }}</td>
					<td>{{ $livraison->heure_livraison }}</td>
					<td>{{ $livraison->nombre_article }}</td>
					<td>{{ $livraison->prix_total }}</td>
					<td>{{ $livraison->remise }}</td>
					@if($livraison->montant_remise > 0)
						<td id="td-remise">{{ $livraison->montant_remise }}</td>
					@else
						<td>-</td>
					@endif
					@if(Auth::user()->role_id == 5)
						<td>
							<a href="{{ route('viewFacture', ['id' => $livraison->id]) }}">
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
						</td>
					@endif
					<td class="modif">
						@if(($livraison->livree == false) OR ($livraison->date_livraison > date('Y-m-d')))
							<a href="{{ route('commande_index', ['id' => $livraison->id]) }}">
								<i class="fa fa-eyedropper" aria-hidden="true"></i>
							</a>
						@else
							<i class="fa fa-truck" aria-hidden="true"></i>
						@endif
					</td>
					<td class="corbeil">
						<!-- Vérifier si la date est passée ou non -->
						@if($livraison->date_livraison >= date('Y-m-d') && ($livraison->livree == false))
							<a href="{{ route('viewFacture', ['id' => $livraison->id]) }}">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</a>
						@else
							<i class="fa fa-handshake-o" aria-hidden="true"></i>
						@endif
					</td>
				</tr>
			@empty
			@endforelse
		</table>
		<div class="div-paginate">
			{{ $livraisons->links() }}
		</div>
	</div>
@endsection