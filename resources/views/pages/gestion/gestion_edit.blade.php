@extends('application')

@section('gestion-edit')

	<div class="gestion_edit">
		<h2>Edition de gestion</h2>
		@if(Session::has('erreur'))
			<p>{{ Session::get('erreur') }}</p>
		@endif
		<div>
			<form class="form-inline" id="form" method="POST" action="{{ route('Gestion.update', $gestion->id) }}">
				@csrf
				@method('PUT')
				<div>
					<label>Gain 1</label>
			  		<input type="number" name="gain_1" class="form-control" value="{{ $gestion->gain_1 }}" id="email" required>
			  	</div>
				<div>
					<label>Gain 2</label>
			  		<input type="number" name="gain_2" class="form-control" value="{{ $gestion->gain_2 }}" id="email" required>
			  	</div>
				<div>
					<label>Remise</label>
			  		<input type="number" name="remise" class="form-control" value="{{ $gestion->remise }}" id="email" required>
			  	</div>
				<div>
					<label>Transport</label>
			  		<input type="number" name="transport" class="form-control" value="{{ $gestion->transport }}" id="email" required>
			  	</div>
				<div>
					<label>Dépense</label>
			  		<input type="number" name="depense" class="form-control" value="{{ $gestion->depense }}" id="email" required>
			  	</div>
				<div>
					<label>Agent</label>
			  		<input type="number" name="agent" class="form-control" value="{{ $gestion->agent }}" id="email" required>
			  	</div>
				<div>
					<label>Admin</label>
			  		<input type="number" name="admin" class="form-control" value="{{ $gestion->admin }}" id="email" required>
			  	</div>
				<div>
					<label>Entreprise</label>
			  		<input type="number" name="entreprise" class="form-control" value="{{ $gestion->entreprise }}" id="email" required>
			  	</div>
				<div>
					<label>Mot de passe</label>
			  		<input type="password" name="password" class="form-control" placeholder="*********" id="pwd" required>
			  	</div>
			  	<div class="form-check">
			  	<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>

@endsection