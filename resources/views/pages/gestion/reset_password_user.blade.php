@extends('application')

@section('reset_password')

	<div class="div-index">

		<h1>Reitialisation mot de passe</h1>

		<div class="message">
			@if(Session::has('succes'))
				<p class="btn btn-success">{{ Session::get('succes') }}</p>
			@endif
			@if(Session::has('erreur'))
				<p class="btn btn-danger">{{ Session::get('erreur') }}</p>
			@endif
		</div>

		<form action="{{ route('reset', $agent->id) }}" method="POST" class="reset">
			@csrf
			<input type="email" name="email" placeholder="Adresse email" value="{{ $agent->email }}" class="form-control" id="champs" disabled>
			<input type="password" name="password" placeholder="Password PDG" class="form-control" id="champs">
			<button type="submit" class="btn btn-primary" id="btn">Confirmer</button>
		</form>
	</div>

@endsection