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
				<img src="https://stockage-sombanandaku.s3.us-east-2.amazonaws.com/images/articles/article3/image_1.jpeg" alt="image-article">
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
