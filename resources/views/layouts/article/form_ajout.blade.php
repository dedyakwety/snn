<form action="{{ route('Articles.store') }}" method="POST" class="div-ajout-article" enctype="multipart/form-data">
	@csrf
	<div class="message-article">
		@if(Session::has('succes'))
			{{ Session::get('succes') }}
		@endif
		@if(Session::has('erreur'))
			{{ Session::get('erreur') }}
		@endif
	</div>
	<div class="div-form">
		<select name="boutique">
			<option>Boutique</option>
			@foreach($boutiques as $boutique)
			<option value="{{ $boutique->id }}" class="option">{{ $boutique->nom }}</option>
			@endforeach
		</select>
	</div>
	<div class="div-form">
		<select name="pour">
			<option>Pour</option>
			@foreach($pours as $pour)
				<option value="{{ $pour->id }}" class="option">{{ $pour->pour }}</option>
			@endforeach
		</select>
	</div>
	<div class="div-form">
		<select name="categorie">
			<option>Catégorie 1</option>
			@foreach($categories as $categorie)
				<option value="{{ $categorie->id }}" class="option">{{ $categorie->categorie }}</option>
			@endforeach
		</select>
	</div>
	<div class="div-form">
		<select name="modele">
			<option>Catégorie 2</option>
			@foreach($modeles as $modele)
				<option value="{{ $modele->id }}" class="option">{{ $modele->modele }}</option>
			@endforeach
		</select>
	</div>
	<div class="div-form">
		<input type="file" name="image_1" id="image">
	</div>
	<div class="div-form">
		<input type="file" name="image_2" id="image">
	</div>
	<div class="div-form">
		<input type="file" name="image_3" id="image">
	</div>
	<div class="div-form">
		<!--input type="file" name="image_4" id="image"-->
		<input type="number" name="quantite" placeholder="Quantite d'article" />
	</div>
	<div class="div-form" id="prix">
		<input type="number" name="prix" step="0.01" placeholder="Prix d'article" />
	</div>
	<div class="div-form" id="prix_vente">
		<input type="number" name="prix_vente" step="0.01" placeholder="Prix de vente" />
	</div>
	<div class="div-comment">
		<textarea name="commentaire" placeholder="Commentaire" class="commentaire-article"></textarea>
	</div>
	<div class="div-form">
		<button class="but" type="submit">Ajoutez</button>
	</div>
</form>