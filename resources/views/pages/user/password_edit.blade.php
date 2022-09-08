@extends('application')

@section('body-password-edit')
	<div class="div-profil">
		<form method="POST" action="{{ route('Mot_de_passe.store') }}" class="form-password">
			@csrf
			<h1>Mis à jour de votre mot de passe</h1>
			<input type="password" name="password_ancien" placeholder="Ancien mot de passe" class="form-control" required autofocus>
			<input type="password" name="password" placeholder="nouveau mot de passe" class="form-control" required autofocus>
			<input type="password" name="password_confirm" placeholder="Confirmer nouveau mot de passe" class="form-control" required autofocus>
			<button type="submit" class="btn btn-primary">Mis à jour</button>
		</form>
	</div>
@endsection