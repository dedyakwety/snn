@extends('application')

@section('body-categorie')

	<div class="fs_menu_overlay"></div>

	<!-- Hamburger Menu -->

	<div class="fs_menu_overlay"></div>

	<!-- Hamburger Menu -->

	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<!--ul>
						<li><a href="index.html">Home</a></li>
						<li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Men's</a></li>
					</ul-->
					<!-- Price Range Filtering -->
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Filtrer par prix</h5>
						</div>
						<p>
							<input type="text" id="amount" readonly style="border:0; color:#1315b9; font-weight:bold;">
						</p>
						<div id="slider-range"></div>
						<div class="filter_button"><span>filter</span></div>
					</div>
					<!-- Product Sorting -->
					<ul class="product_sorting">
						<li>
							<span class="type_sorting_text">Tri par</span>
							<i class="fa fa-angle-down"></i>
							<ul class="sorting_type">
								<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Tri par defaut</span></li>
								<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Prix croissant</span></li>
								<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Nom croissant</span></li>
							</ul>
						</li>
						<li>
							<span>Afficher</span>
							<span class="num_sorting_text">6</span>
							<i class="fa fa-angle-down"></i>
							<ul class="sorting_num">
								<li class="num_sorting_btn"><span>3</span></li>
								<li class="num_sorting_btn"><span>6</span></li>
								<li class="num_sorting_btn"><span>12</span></li>
								<li class="num_sorting_btn"><span>24</span></li>
							</ul>
						</li>
					</ul>
					<form action="{{ route('article.search') }}" class="form-recherche">
						@csrf
						<input type="search" name="q" class="form-control mr-2" placeholder="Recherche">
						<button class="btn btn-primary pt-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
						  	<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
							</svg>
						</button>
					</form>
					<!--div class="pages d-flex flex-row align-items-center">
						<div class="page_current">
							<span>1</span>
							<ul class="page_selection">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
							</ul>
						</div>
						<div class="page_total"><span>of</span> 3</div>
						<div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
					</div-->

				</div>

				<!-- Main Content -->


					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">

								<!-- Product Grid -->

								<div class="product-grid">

									<!-- Product 1 -->
									@forelse($articles as $article)
									<a href="{{ route('Articles.show', $article->id) }}">
										<div class="product-item men">
											<div class="product discount product_filter">
												<div class="product_image">
													<img src="{{ asset(Storage::url($article->image->path_1)) }}" alt="image-article" class="image-article">
												</div>
												<div class="favorite favorite_left"></div>
												<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>
													@if($article->prix < 20)
														{{ number_format((((double)$article->prix + (double)$gestion->gain_1) / 100) * (double)$gestion->remise, 2, '.', ' ') }}
													@elseif($article->prix >= 20)
														{{ number_format((((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) / 100) * (double)$gestion->remise, 2, '.', ' ') }}
													@endif	
												</span>
											</div>
												<div class="product_info">
													<h6 class="product_name"><a href="single.html">{{ $article->commentaire }}</a></h6>
													<div class="product_price">
														@if($article->prix < 20)
															${{ number_format(((double)$article->prix + 6), 2, '.', ' ') }}
															<span>{{ number_format(((double)$article->prix + 6) + (((double)$article->prix / 100) * (double)12.5), 2, '.', ' ') }}</span>
														@elseif($article->prix >= 20)
															${{ number_format((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix, 2, '.', ' ') }}
															<span>${{ number_format(((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) + (((double)$article->prix / 100) * 12.5), 2, '.', ' ') }}</span>
														@endif
													</div>
												</div>
											</div>
											<!--div class="red_button add_to_cart_button"><a href="#">add to cart</a></div-->
										</div>
									</a>
									@empty
									<h3>Aucun article pour l'instant</h3>
									@endforelse

								</div>

								<div class="div-paginate">
									{{ $articles->links() }}
								</div>

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_bottom clearfix">
									<ul class="product_sorting">
										<li>
											<span>Show:</span>
											<span class="num_sorting_text">04</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_num">
												<li class="num_sorting_btn"><span>01</span></li>
												<li class="num_sorting_btn"><span>02</span></li>
												<li class="num_sorting_btn"><span>03</span></li>
												<li class="num_sorting_btn"><span>04</span></li>
											</ul>
										</li>
									</ul>
									<span class="showing_results">Showing 1–3 of 12 results</span>
									<div class="pages d-flex flex-row align-items-center">
										<div class="page_current">
											<span>1</span>
											<ul class="page_selection">
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
											</ul>
										</div>
										<div class="page_total"><span>of</span> 3</div>
										<div id="next_page_1" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
									</div>

								</div>

							</div>
						</div>
					</div>
			</div>
		</div>
	</div>

	<!-- Benefit -->

	<div class="benefit">
		<div class="container">
			<div class="row benefit_row">
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>free shipping</h6>
							<p>Suffered Alteration in Some Form</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>cach on delivery</h6>
							<p>The Internet Tend To Repeat</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>45 days return</h6>
							<p>Making it Look Like Readable</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>opening all week</h6>
							<p>8AM - 09PM</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
						<h4>Newsletter</h4>
						<p>Subscribe to our newsletter and get 20% off your first purchase</p>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
						<input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
						<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection