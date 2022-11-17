@extends('application')

@section('categorie')

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Les produits dans la boutique</h2>
					</div>
				</div>
			</div>
			<div class="div-recherche">
				<form action="{{ route('article.search') }}" class="form-recherche w-100">
					@csrf
					<select name="q" class="form-control mr-2" id="champ-recherche">
						@foreach($modeles as $modele)
							<option>{{ $modele->modele }}</option>
						@endforeach
					</select>
					<button class="btn btn-primary pt-2" id="btn">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
					  	<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
						</svg>
					</button>
				</form>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<!-- Product 1 -->
						@forelse($articles as $article)
							@include('pages.article.articles')
						@empty
							<div class="no-article">
								<h3>Aucun article pour l'instant</h3>
							</div>
						@endforelse

					</div>

					<div class="div-paginate">
						{{ $articles->links() }}
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection