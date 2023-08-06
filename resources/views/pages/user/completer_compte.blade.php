@extends('application')

@section('completion')
<div class="div-completion">

	<form action="{{ route('Completion_compte.store') }}" method="POST" class="form-completion" enctype="multipart/form-data">
		@csrf
		<h1>Completer votre compte pour continuer</h1>
		@if(Session::has('erreur'))
			<p>{{ Session::get('erreur') }}</p>
		@endif
			<input type="file" name="photo_profil" accept=".png, .jpg, .jpeg" class="inputt">
		@if(Auth::user()->role_id == 1)
			<input type="double" name="gain_1" placeholder="Gain < 20$" step="0.01" class="inputt">
			<input type="double" name="gain_2" placeholder="Gain >= 20$" step="0.01" class="inputt">
			<input type="double" name="remise" placeholder="Remise" step="0.01" class="inputt">
			<input type="double" name="transport" placeholder="Transport" step="0.01" class="inputt">
			<input type="double" name="depense" placeholder="Dépense" step="0.01" class="inputt">
			<input type="double" name="agent" placeholder="Paie agent" step="0.01" class="inputt">
			<input type="double" name="admin" placeholder="Paie admin" step="0.01" class="inputt">
			<input type="double" name="entreprise" placeholder="Entreprise" step="0.01" class="inputt">
		@else
			<input type="text" name="postnom" placeholder="Postnom" class="inputt">
			<input type="number" name="numero" placeholder="Numéro Résidence" class="inputt">
			<input type="text" name="avenue" placeholder="Avenue Résidence" class="inputt">
			<input type="text" name="quartier" placeholder="Quartier Résidence" class="inputt">
			<select name="commune" class="inputt">
				@foreach($communes as $commune)
					<option value="{{ $commune }}">{{ $commune }}</option>
				@endforeach
			</select>
		@endif
		<button type="submit" class="boutton">Continuer</button>
	</form>
</div>
@endsection