@extends('application')

@section('profil-index')
<div class="div-profil">
	<h1>
	@if(Auth::user()->role_id == 5)
	Profil :
	@else
	INFORMATION DE 
	@endif
	 {{ $user->prenom." ".$user->name }}
	</h1>
	
		@if(Session::has('succes'))
			<div class="div-message-succes">
				{{ Session::get('succes') }}
			</div>
		@endif
		@if(Session::has('erreur'))
			<div class="div-message-erreur">
				{{ Session::get('erreur') }}
			</div>
		@endif

	<div class="infos">
		<div class="div-infos">
			<div class="div-info-1">
				Nom
			</div>
			<div class="div-info-2">
				{{ $user->name }}
			</div>
		</div>
		@if((Auth::user()->role_id == 5) === false)
		<div class="div-infos">
			<div class="div-info-1">
				Postnom
			</div>
			<div class="div-info-2">
				{{ $user->postnom }}
			</div>
		</div>
		@endif
		<div class="div-infos">
			<div class="div-info-1">
				Prénom
			</div>
			<div class="div-info-2">
				{{ $user->prenom }}
			</div>
		</div>
		<div class="div-infos">
			<div class="div-info-1">
				Sexe
			</div>
			<div class="div-info-2">
				{{ $user->sexe }}
			</div>
		</div>
		@if((Auth::user()->role_id == 5) === false)
		<div class="div-infos">
			<div class="div-info-1">
				Etat civil
			</div>
			<div class="div-info-2">
				{{ $user->etat_civil }}
			</div>
		</div>
		@endif
		<div class="div-infos">
			<div class="div-info-1">
				Contact 1
			</div>
			<div class="div-info-2">
				{{ $user->contact_whatsapp }}
			</div>
		</div>
		<div class="div-infos">
			<div class="div-info-1">
				Contact 2
			</div>
			<div class="div-info-2">
				
					@if(!$user->contact)
						........
					@else
					{{ $user->contact }}
					@endif
				
			</div>
		</div>
		<div class="div-infos">
			<div class="div-info-1">
				E-mail
			</div>
			<div class="div-info-2">
				{{ $user->email }}
			</div>
		</div>
		@if((Auth::user()->role_id == 5) === false)
		<div class="div-infos">
			<div class="div-info-1">
				Numéro
			</div>
			<div class="div-info-2">
				{{ $user->adresse->numero }}
			</div>
		</div>
		<div class="div-infos">
			<div class="div-info-1">
				Avenue
			</div>
			<div class="div-info-2">
				{{ $user->adresse->avenue }}
			</div>
		</div>
		<div class="div-infos">
			<div class="div-info-1">
				Quartier
			</div>
			<div class="div-info-2">
				{{ $user->adresse->quartier }}
			</div>
		</div>
		<div class="div-infos">
			<div class="div-info-1">
				Commune
			</div>
			<div class="div-info-2">
				{{ $user->adresse->commune }}
			</div>
		</div>
		@endif
		<div class="infos">
			<div class="div-button">
				@if(Auth::user()->role_id == 1 && Route::is('Profil.show'))
				<form action="{{ route('Agents.update', $user->id) }}" method="POST" class="form-button">
					@csrf
					@method('PUT')
					<input type="text" name="id" value="{{ $user->id }}" class="id" required>
					<input type="password" name="password" placeholder="Mot de passe" class="form-control" required>
					<button type="submit" class="btn">
					@if($user->valide)
						Suspendre
					@else
						Léver la suspension
					@endif
					</button>
				</form>
				@endif
				@if(Route::is('Profil.index'))
					<a href="{{ route('Mot_de_passe.index') }}" class="btn" id="a">
						<span class="glyphicon glyphicon-pencil"></span> Changer le mot de passe
					</a>

					<a href="{{ route('Profil.edit', $user->id) }}" class="btn" id="a">
						<span class="glyphicon glyphicon-pencil"></span> Editer tout
					</a>
				@endif
			</div>
		</div>
	</div>

</div>
@endsection