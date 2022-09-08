@extends('application')

@section('users')
	<div class="users">
		<h1>Gestion des Agents</h1>
		<form method="POST" action="{{ route('valider_agent') }}" class="form-1">
			@csrf
	    	<div class="col" id="div-champ">
	      		<input type="text" class="form-control champ" placeholder="Adresse email" name="email">
	    	</div>
	    	<div class="col">
	    		<select name="role" id="champ" class="form-control" required>
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
		      	<input type="password" class="form-control champ" placeholder="Mot de passe" name="password" required>
		    </div>
		    <div class="div-boutton">
		      	<button type="submit" id="btn" class="btn btn-primary">Valider</button>
		    </div>
		</form>
		<div class="agents">
		  	@forelse($agents as $agent)
				<div class="infos">
					<div class="info-1">
						<img src="{{ asset(Storage::url($agent->image->profil)) }}" alt="photo-profil">
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
      		@empty
			<h2>Aucun agent pour l'instant!</h2>
      		@endforelse
		</div>
				<!--form action="{{ route('Agents.update', $agent->id) }}" method="POST" class="form-2">
					@csrf
					@method('PUT')
					<div class="user">
						{{ $agent->name }}
					</div>
					<div class="user">
						{{ $agent->postnom }}
					</div>
					<div class="user">
						{{ $agent->prenom }}
					</div>
					<div class="user">
						{{ $agent->role->role }}
					</div>
					<div class="password">
						<input type="password" name="password" placeholder="Mot de passe" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-primary">
						@if($agent->valide)
							Suspendre
						@else
							Levé la suspension
						@endif
					</button>
				</form-->
			

	</div>
	<?php
		use Illuminate\Support\Facades\Session;
		Session::forget('erreur');
		Session::forget('succes');
	?>
@endsection