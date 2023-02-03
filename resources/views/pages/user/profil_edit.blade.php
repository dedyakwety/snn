@extends('application')

@section('body-profil-edit')
<div class="div-profil">

	<h1>Edition Profil</h1>

	<form action="{{ route('Profil.store') }}" method="POST" class="div-identite">
		@csrf
		@if(Auth::user()->role_id == 4)
		<p class="p-fonction">Agent livreur</p>
		@elseif(Auth::user()->role_id == 5)
		<p class="p-fonction">Fonction : Client</p>
		@else
		<p class="p-fonction">Fonction :{{ " ".Auth::user()->role->role }}</p>
		@endif

		<input type="text" name="nom" value="{{ $user->name }}" class="input_edit_profil">
		@if((Auth::user()->role_id == 5) === false)
		<input type="text" name="postnom" value="{{ $user->postnom }}" class="input_edit_profil">
		@endif
		<input type="text" name="prenom" value="{{ $user->prenom }}" class="input_edit_profil">
		<select name="sexe" class="input_edit_profil">
			<option value="{{ $user->sexe }}">{{ $user->sexe }}</option>
			<?php
				$sexes = [
					'homme' => 'homme',
					'femme' => 'femme',
				];
			?>
			@foreach($sexes as $sexe)
				@if(($user->sexe == $sexe) === false)
					<option value="{{ $sexe }}">{{ $sexe }}</option>
				@endif
			@endforeach
		</select>
		@if((Auth::user()->role_id == 5) === false)
			<input type="text" name="etat_civil" value="{{ $user->etat_civil }}" class="input_edit_profil">
		@endif
		<input type="text" name="contact_whatsapp" value="{{ $user->contact_whatsapp }}" class="input_edit_profil">
		@if($user->contact)
			<input type="text" name="contact" value="{{ $user->contact }}" class="input_edit_profil">
		@elseif(!$user->contact)
			<input type="text" name="contact" value="Contact 2" class="input_edit_profil">
		@endif
		<input type="text" name="email" value="{{ $user->email }}" class="input_edit_profil">
		@if((Auth::user()->role_id == 5) === false)
			<input type="text" name="numero" value="{{ $user->adresse->numero }}" class="input_edit_profil">
			<input type="text" name="avenue" value="{{ $user->adresse->avenue }}" class="input_edit_profil">
			<input type="text" name="quartier" value="{{ $user->adresse->quartier }}" class="input_edit_profil">
			<select name="commune" class="input_edit_profil">
				<option value="{{ $user->adresse->commune }}">{{ $user->adresse->commune }}</option>
				@foreach($communes as $commune)
					@if(($user->adresse->commune == $commune) === false)
						<option value="{{ $commune }}">{{ $commune }}</option>
					@endif
				@endforeach
			</select>
		@endif
		<input type="text" name="password" value="* * * * * * * *" disabled class="input_edit_profil">
		<div class="boutons">
			<div class="bouton">
				<a href="{{ route('Profil.index') }}">
					<button type="submit" class="btn_edit">
						Annuler
					</button>
				</a>
			</div>
			<div class="bouton">
				<button type="submit" class="btn_edit">Enregistrer</button>
			</div>
		</div>
	</form>

</div>
@endsection