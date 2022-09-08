@extends('application')

@section('body-boutique-articles')

	<div class="boutique-articles">
		<h2>Boutique {{ $boutique->nom." +243 ".$boutique->contact_whatsapp }}<br>{{ count($articles) }} Articles</h2>

	</div>
	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<!-- Product 1 -->
						@forelse($articles as $article)
						
						<a href="{{ route('Articles.show', $article->id) }}">
							@if($article->pour->id == 1)
							<div class="product-item homme">
							@elseif($article->pour->id == 2)
							<div class="product-item women">
							@elseif($article->pour->id == 3)
							<div class="product-item accessories">
							@endif
								<div class="product discount product_filter">
									<div class="product_image">
										<img src="{{ asset(Storage::url($article->image->path_1)) }}" alt="image-article">
									</div>
									<div class="favorite favorite_left"></div>
									<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
									<div class="product_info">
										<h6 class="product_name">{{ $article->commentaire }}</h6>
										<div class="product_price">
											${{ $article->prix }}
										</div>
									</div>
								</div>
								<!--div class="red_button add_to_cart_button"><a href="#">Ajouter dans le panier</a></div-->
							</div>
						</a>
						@empty
						<h1>Autcun article disponisple pour l'instant</h1>
						@endforelse

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection