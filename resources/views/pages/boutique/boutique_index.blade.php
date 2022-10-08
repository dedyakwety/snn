@extends('application')

@section('boutique')

	<div class="boutique">
		<h2>Ajouter une boutique</h2>
		<div>
			@if(Session::has('succes'))
				<p>{{ Session::get('succes') }}</p>
			@endif
			@if(Session::has('erreur'))
				<p>{{ Session::get('erreur') }}</p>
			@endif
			<form action="{{ route('boutique_store') }}" class="form-group" method="POST" id="form">
				@csrf
				<input type="text" name="nom_boutique" class="input" placeholder="Nom Boutique"required>
				<input type="tel" name="contact_boutique" class="input" placeholder="Contact Whatsapp" required>
				<input type="password" name="password" class="input" placeholder="Password" required>
				<button class="btn btn-primary" id="btn">Ajouter Boutique</button>
			</form>
		</div>		

		<div class="boutiquer">

			<h2>{{ count($boutiques) }} Boutiques</h2>

			<table class="table table-striped" id="table">
		    	<thead>
		      		<tr>
		        		<th>Nº</th>
		        		<th>Nom</th>
		        		<th>Contact</th>
		        		<th>Plus</th>
		      		</tr>
		    	</thead>
		    	<tbody>
	      			@forelse($boutiques as $boutique)
		      			<tr>
		      				<td>{{ $numero++ }}</td>
		      				<td>{{ $boutique->nom }}</td>
		      				<td>{{ $boutique->contact_whatsapp }}</td>
		      				<td>
		      					<a href="{{ route('boutique_articles', $boutique->nom) }}">
									Articles
								</a>
		      				</td>
		      			</tr>
	      			@empty
	      				<h2>Aucune boutique disponoble pour l'instant</h2>
	      			@endforelse
		    	</tbody>
		  	</table>

		  	<!-- RESPONSIVE -->
		  	<div class="div-responsive">
		  		<div class="div-boutique-2">
		  			<div>Nº</div>
		  			<div>Nom</div>
		  			<div>Contact</div>
		  		</div>
		  		@forelse($boutiques as $boutique)
			  		<a href="{{ route('boutique_articles', $boutique->nom) }}">
				  		<div class="div-boutique">
				  			<di>{{ $numero_2++ }}</di>
				  			<di>{{ $boutique->nom }}</di>
				  			<di>{{ $boutique->contact_whatsapp }}</di>
				  		</div>
				  	</a>
		  		@empty
      				<h2>Aucune boutique disponoble pour l'instant</h2>
      			@endforelse
		  	</div>
		</div>
	</div>

@endsection