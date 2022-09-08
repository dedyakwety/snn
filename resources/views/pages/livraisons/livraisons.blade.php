<?php
use App\Models\User;
?>
@extends('application')

@section('livraison-index')
	<div class="div-livraisons">
		@if($commandes)
		  	<h2>Commandes</h2> 

	  		@if(Session::has('succes'))
	  			<div class="message">
					{{ Session::get('succes') }}
				</div>
			@endif     
			
		  	<table class="table table-bordered">
		    	<thead>
		      		<tr>
		        		<th>Nº</th>
		        		<th>Date Livraison</th>
		        		<th>Heure Livraison</th>
		        		@if(Auth::user()->role_id == 1)
		        			<th>Numéro</th>
		        		@endif
		        		<th>Quantité</th>
		        		<th>Prix total</th>
		        		@if(Auth::user()->role_id == 1)
		        		<th>Livreur</th>
		        		@endif
		        		<th>Détails</th>
		      		</tr>
		    	</thead>
		    	<tbody>
		    		@forelse($commandes as $commande)
		      		<tr>
		        		<td>{{ $numero++ }}</td>
		        		<td>{{ $commande->date_livraison }}</td>
		        		<td>{{ $commande->heure_livraison }}</td>
		        		@if(Auth::user()->role_id == 1)
			        		<td>
			        			@if($commande->user_id > 0)
			        				{{ User::findOrFail($commande->user_id)->numero->numero }}
			        			@else
			        				Sans compte
			        			@endif
			        		</td>
		        		@endif
		        		<td>{{ $commande->nombre_article }}</td>
		        		<td>${{ $commande->prix_total }}</td>
		        		@if(Auth::user()->role_id == 1)
		        			<td>
				        		@if($commande->livreur_id)
				        			livreur
				        		@elseif(!$commande->livreur_id)
				        			Non livreur
				        		@endif
			        		</td>
		        		@endif
		        		<td>
	        				@if($commande->livree)
	        					<a href="{{ route('viewFacture', ['id' => $commande->id]) }}" id="a" class="btn btn-primary">
	        						Facture
	        					</a>
	        				@else
	        					<a href="{{ route('commande_index', ['id' => $commande->id]) }}" id="a" class="btn btn-primary">
	        						Détail
	        					</a>
	        				@endif
		        		</td>
		      		</tr>
		      		@empty
		      		
		      		@endforelse
		    	</tbody>
		  	</table>

		  	<!-- RESPONSIVE MAX 508PX -->
		  	<div class="commandes">
		  		@forelse($commandes as $commande)
				  	<div class="commande">
				  		Nº : {{ $numero_1++ }}</br>
				  		Date : {{ $commande->date_livraison }}</br>
				  		Heure : {{ $commande->heure_livraion }}
				  		Quantité : {{ $commande->nombre_article }}</br>
				  		Prix total : {{ $commande->prix_total }}</br>
				  		@if($commande->livree)
							<a href="{{ route('viewFacture', ['id' => $commande->id]) }}" id="a" class="btn btn-primary">
								Facture
							</a>
						@else
							<a href="{{ route('viewFacture', ['id' => $commande->id]) }}" id="a" class="btn btn-primary">
								Détail
							</a>
						@endif
				  	</div>
			  	@empty
			  		<div class="no-commande">
			  			Aucun commande pour l'instant!
			  		</div>
			  	@endforelse
		  	</div>
	  	@else
		  	<div class="div-vide">
	  			<h3>Pas de commande pour l'instant</h3>	
	  			<div class="div-a">	  		
	  				<a href="{{ route('index') }}" class="btn btn-primary" id="a-accueil">Accueil</a>
	  			</div>
	  		</div>
	  	@endif
	</div>
@endsection