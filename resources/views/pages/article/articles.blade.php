<!-- Product 1 -->

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
				<!--img src="{{ asset('https://stockage-sombanandaku.s3.us-east-2.amazonaws.com/images/articles/article15/image_1.jpg') }}" alt="image"-->
				<!--img src="{{ asset(Storage::url($article->image->path_1)) }}" alt="image-article"-->
				<img src="{{ asset('images/logo/logo.png') }}" alt="image-article">
			</div>
			<div class="favorite favorite_left"></div>
			@auth
				<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
					<span>

						<!--SI LA BOUTIQUE EST DADFAVORI -->

						

						<!-- SI LA BOUTIQUE N'EST PAS DADFAVORI -->

						@if($article->prix < 20)
							{{ "$".number_format((((double)$article->prix + (double)$gestion->gain_1) / 100) * (double)$gestion->remise, 2, '.', ' ') }}
						@elseif($article->prix >= 20)
							{{ "$".number_format((((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) / 100) * (double)$gestion->remise, 2, '.', ' ') }}
						@endif
					</span>
				</div>
			@endauth
			<div class="product_info">
				<h6 class="product_name">{{ $article->commentaire }}</h6>
				@auth
				@if((Auth::user()->role_id == 1) OR (Auth::user()->role_id == 2))
				@if($article->boutique->nom == "DADFAVORI")
				<div class="product_price" id="color_1">
				@else
				<div class="product_price" id="color_2">
				@endif
				@endif
				@endauth
				@guest
				<div class="product_price">
				@endguest
					@auth
						@if(Auth::user()->role_id == 1)
							
								Achat : ${{ number_format($article->prix, 2, '.', ' ') }}<br>
								Vente : ${{ number_format((double)$article->prix_vente, 2, '.', ' ') }}<br>

								Gain : ${{ number_format(((double)$article->prix_vente - (double)$article->prix), 2, '.', ' ') }}
								<!--span>{{ number_format(((double)$article->prix + $gestion->gain_1) + (((double)$article->prix / 100) * (double)12.5), 2, '.', ' ') }}</span-->
								
						@else
							@if($article->prix < 20)
								${{ number_format(((double)$article->prix + $gestion->gain_1), 2, '.', ' ') }}
								<span>${{ number_format(((double)$article->prix + $gestion->gain_1) + (((double)$article->prix / 100) * (double)12.5), 2, '.', ' ') }}</span>
							@elseif($article->prix >= 20)
								${{ number_format((double)$article->prix_vente, 2, '.', ' ') }}
								<span>${{ number_format(((double)$article->prix_vente * 7.5), 2, '.', ' ') }}</span>
							@endif
						@endif
					@endauth
					@guest
							${{ number_format((double)$article->prix_vente, 2, '.', ' ') }}
							<span>{{ number_format(((double)$article->prix_vente + $gestion->gain_1) + (((double)$article->prix_vente / 100) * (double)7.5), 2, '.', ' ') }}</span>
					@endguest

					@auth
						@if(!Auth::user()->id == 5)
							<br>{{ $article->quantite }}
							@if((int)$article->quantite > 1)
								Pièces
							@else
								Pièce
							@endif
						@endif
					@endauth
				</div>
			</div>
		</div>
		<!--div class="red_button add_to_cart_button"><a href="#">Ajouter dans le panier</a></div-->
	</div>
</a>
