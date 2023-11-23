@extends('application')

@section('users')
	<div class="users">
		<h1>Gestion des Agents</h1>
		<div class="p-erreur">
			@if(Session::has('erreur'))
				{{ Session::get('erreur') }}
			@endif
		</div>
		<form method="POST" action="{{ route('valider_agent') }}" class="form-1">
			@csrf
	    	<div class="col" id="div-champ">
	      		<input type="text" id="champ" placeholder="Adresse email" name="email">
	    	</div>
	    	<div class="col">
	    		<select name="role" id="champ" required>
					<option disabled>Role</option>
					@foreach($roles as $role)
						@if($role->role == $user->role->role)
						@else
							<option value="{{ $role->id }}">{{ $role->role }}</option>
						@endif
					@endforeach
				</select>
	    	</div>
		    <div class="col">
		      	<input type="password" id="champ" placeholder="Mot de passe" name="password" required>
		    </div>
		    <div class="div-boutton">
		      	<button type="submit" id="btn" class="btn btn-primary">Valider</button>
		    </div>
		</form>
		<div class="agents">
		  	@forelse($agents as $agent)
			  	@if($agent->adresse_id === null)
			  	@else
					<div class="infos">
						<div class="info-1">
							<img src="{{ asset('images/logo/logo.png') }}" alt="image-article">
							<!--img src="{{ asset(Storage::url($agent->image->profil)) }}" alt="photo-profil"-->
						</div>
						<div class="info-2">
				      		<p>
				      			{{ $agent->prenom }}</br>
				      			{{ $agent->name }}</br>

				      			@if($agent->role->role == "AL")
				      				Agent livreur {{$agent->id}}
				      			@else
				      				{{ $agent->role->role }}
				      			@endif
				      		</p>
			      			<a href="{{ route('Profil.show', $agent->id) }}" id="a" class="btn btn-success">
			      				Plus
			      			</a>
			      			<a href="{{ route('reset_password_user_index', ['id' => $agent->id]) }}" id="a" class="btn btn-primary">
			      				Reset password
			      			</a>
			      		</div>
	      			</div>
	      		@endif
      		@empty
      			<div class="div-vide">
					<h2>Aucun agent pour l'instant!</h2>
				</div>
      		@endforelse
		</div>
			

	</div>
	<?php
		use Illuminate\Support\Facades\Session;
		Session::forget('erreur');
		Session::forget('succes');
	?>
@endsection