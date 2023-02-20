@extends('application')

@section('recherche')

	<div class="new_arrivals">
		<div class="container">
			<!--div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Les produits dans la boutique</h2>
					</div>
				</div>
			</div-->
			<div class="div-recherche">
				<form action="{{ route('article.search') }}" class="form-recherche">
					@csrf
					<select name="q" class="form-control mr-2" id="champ-recherche">
						<option>{{ $search }}</option>
						@foreach($modeles as $modele)
							@if($modele->modele == $search)
							@else
								@if(count($modele->articles) > 0)
									<option>{{ $modele->modele }}</option>
								@endif
							@endif
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
											<img src="{{ asset('https://stockage-sombanandaku.s3.us-east-2.amazonaws.com/images/articles/article15/image_1.jpg') }}" alt="image-article">
										</div>
										<div class="favorite favorite_left"></div>
										@auth
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
												<span>
													$
													@if($article->prix < 20)
														{{ number_format((((double)$article->prix + (double)$gestion->gain_1) / 100) * (double)$gestion->remise, 2, '.', ' ') }}
													@elseif($article->prix >= 20)
														{{ number_format((((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) / 100) * (double)$gestion->remise, 2, '.', ' ') }}
													@endif
												</span>
											</div>
										@endauth
										<div class="product_info">
											<h6 class="product_name">{{ $article->commentaire }}</h6>
											<div class="product_price">
												@auth
													@if(Auth::user()->role_id == 1)
														@if($article->prix < 20)
															Achat : ${{ number_format($article->prix, 2, '.', ' ') }}<br>
															Vente : ${{ number_format(((double)$article->prix + $gestion->gain_1), 2, '.', ' ') }}<br>
															Gain : ${{ number_format((((double)$article->prix + $gestion->gain_1) - (double)$article->prix), 2, '.', ' ') }}
															<!--span>{{ number_format(((double)$article->prix + $gestion->gain_1) + (((double)$article->prix / 100) * (double)12.5), 2, '.', ' ') }}</span-->
														@elseif($article->prix >= 20)
															Achat : ${{ number_format((double)$article->prix, 2, '.', ' ') }}<br>
															Vente : ${{ number_format((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix, 2, '.', ' ') }}<br>
															Gain : ${{ number_format(((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) - (double)$article->prix, 2, '.', ' ') }}
															<!--span>${{ number_format(((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) + (((double)$article->prix / 100) * 12.5), 2, '.', ' ') }}</span-->
														@endif
													@else
														@if($article->prix < 20)
															${{ number_format(((double)$article->prix + $gestion->gain_1), 2, '.', ' ') }}
															<span>{{ number_format(((double)$article->prix + $gestion->gain_1) + (((double)$article->prix / 100) * (double)12.5), 2, '.', ' ') }}</span>
														@elseif($article->prix >= 20)
															${{ number_format((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix, 2, '.', ' ') }}
															<span>${{ number_format(((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) + (((double)$article->prix / 100) * 12.5), 2, '.', ' ') }}</span>
														@endif
													@endif
												@endauth
												@guest
													@if($article->prix < 20)
														${{ number_format(((double)$article->prix + $gestion->gain_1), 2, '.', ' ') }}
														<span>{{ number_format(((double)$article->prix + $gestion->gain_1) + (((double)$article->prix / 100) * (double)12.5), 2, '.', ' ') }}</span>
													@elseif($article->prix >= 20)
														${{ number_format((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix, 2, '.', ' ') }}
														<span>${{ number_format(((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) + (((double)$article->prix / 100) * 12.5), 2, '.', ' ') }}</span>
													@endif
												@endguest
											</div>
										</div>
									</div>
									<!--div class="red_button add_to_cart_button"><a href="#">Ajouter dans le panier</a></div-->
								</div>
							</a>
						@empty
							<div class="aucun-resultat">
								{{ $search." 0 resultat pour l'instant, veuillez réessayer plus tard!" }}
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