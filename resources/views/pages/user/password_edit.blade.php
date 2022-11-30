@extends('application')

@section('body-password-edit')
	<div class="div-profil">
		<form method="POST" action="{{ route('Mot_de_passe.store') }}" class="form-password">
			@csrf

			<h1>Mis à jour de votre mot de passe</h1>

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
			
			<input type="password" name="password_ancien" class="input_edit_password" placeholder="Ancien mot de passe" class="form-control" required autofocus />
			<input type="password" name="password" class="input_edit_password" placeholder="nouveau mot de passe" class="form-control" required />
			<input type="password" name="password_confirm" class="input_edit_password" placeholder="Confirmer nouveau mot de passe" class="form-control" required />
			<button type="submit" class="btn btn-primary">Mis à jour</button>
		</form>
	</div>
@endsection