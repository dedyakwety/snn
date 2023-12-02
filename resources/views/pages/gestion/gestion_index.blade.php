@extends('application')

@section('gestion-index')
<div class="gestion_index">
	<h2>ADMINISTRATION</h2>
	<div class="div-infos">
		
		<div>
			@if(Session::has('succes'))
				<p>{{ Session::get('succes') }}</p>
			@endif
			<p>
				Remise : {{ $gestion->remise }}<br>
				Transport : {{ $gestion->transport }}<br>
				Dépense : {{ $gestion->depense }}<br>
				Agent : {{ $gestion->agent }}<br>
				Admin : {{ $gestion->admin }}<br>
				Entreprise : {{ $gestion->entreprise }}<br>
			</p>
			<a href="{{ route('Gestion.edit', $gestion->id) }}">
				<button class="btn btn-primary">Modifier</button>
			</a>
		</div>
	</div>
	<div class="div-gestion">
		<table class="table table-bordered">
		  	<thead>
		    	<tr>
		      		<th scope="col">Date</th>
		      		<th scope="col">Achat</th>
		      		<th scope="col">Vente</th>
		      		<th scope="col">G-brut</th>
		      		<th scope="col">%</th>
		      		<th scope="col">R-in</th>
		      		<th scope="col">R-out</th>
		      		<th scope="col">Trans</th>
		      		<th scope="col">Gain</th>
		      		<th scope="col">Dépense</th>
		      		<th scope="col">Agent</th>
		      		<th scope="col">Admin</th>
		      		<th scope="col">In</th>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		@forelse($partages as $partage)
			    	<tr>
			      		<td><strong>{{ $partage->date_vente }}</strong></td>
			      		<td><strong>{{ number_format($partage->achat, 2, '.', ' ') }}</strong></td>
			      		<td><strong>{{ number_format($partage->vente, 2, '.', ' ') }}</strong></td>
			      		<td class="yellowgreen">{{ number_format($partage->gain_brut, 2, '.', ' ') }}</td>
			      		<td><strong>{{ number_format($partage->remise_pourcentage, 2, '.', ' ') }}</strong></td>
			      		<td><strong>{{ number_format($partage->remise_in, 2, '.', ' ') }}</strong></td>
			      		<td><strong>{{ number_format($partage->remise_out, 2, '.', ' ') }}</strong></td>
			      		<td><strong>{{ number_format($partage->transport, 2, '.', ' ') }}</strong></td>
			      		<td id="yellow"><strong>{{ number_format($partage->gain, 2, '.', ' ') }}</strong></td>
			      		<td class="red"><strong>{{ number_format($partage->depense, 2, '.', ' ') }}</strong></td>
			      		<td><strong>{{ number_format($partage->agent, 2, '.', ' ') }}</strong></td>
			      		<td><strong>{{ number_format($partage->admin, 2, '.', ' ') }}</strong></td>
			      		<td id="green"><strong>{{ number_format($partage->entreprise, 2, '.', ' ') }}</strong></td>
			    	</tr>
		    	@empty
		      		<td>2022-07-28</td>
		      		<td>Otto</td>
		      		<td>@mdo</td>
		      		<td>Mark</td>
		      		<td>Otto</td>
		      		<td>@mdo</td>
		      		<td>Mark</td>
		      		<td>Otto</td>
		      		<td>@mdo</td>
		      		<td>Otto</td>
		      		<td>@mdo</td>
		      		<td>@mdo</td>
		    	@endforelse
		  	</tbody>
		</table>
	</div>
</div>
@endsection