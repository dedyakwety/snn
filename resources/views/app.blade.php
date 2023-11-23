<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>SOMBA NA NDAKU</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Colo Shop Template">
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="{{ asset('images/logo/LOGO-NA-NDAKU-2.png') }}">

		<link rel="stylesheet" type="text/css" href="{{ asset('styles/header.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('styles/responsive_header.css') }}">
		<!--  TOUTES LES PAGES -->
		<link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
		<link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('styles/main_styles.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('styles/responsive.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('styles/footer.css') }}">
		@if(Route::is('Articles.show') OR Route::is('Panier.index') OR Route::is('Panier.edit'))
			<link rel="stylesheet" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
			<link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/single_styles.css') }}">
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/single_responsive.css') }}">
		@endif

		@if(Route::is('categorie') OR Route::is('article.search'))
			<link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/categories_styles.css') }}">
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/categories_responsive.css') }}">
		@endif
		
		@if(Route::is('Agents.index'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/users.css') }}">
		@endif
		@if(Route::is('register'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/inscription.css') }}">
		@endif
		@if(Route::is('login'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/login.css') }}">
		@endif
		@if(Route::is('Completion_compte.index'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/completion.css') }}">
		@endif
		@if(Route::is('Profil.index') OR Route::is('Profil.show'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/profil-index.css') }}">
		@endif
		@if(Route::is('Profil.edit'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/profil-edit.css') }}">
		@endif
		@if(Route::is('Mot_de_passe.index'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/password_edit.css') }}">
		@endif
		@if(Route::is('Livraison.index'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/livraisons.css') }}">
		@endif
		@if(Route::is('viewFacture'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/viewFacture.css') }}">
		@endif
		@if(Route::is('Gestion.index'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/gestion_index.css') }}">
		@endif
		@if(Route::is('Gestion.edit'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/gestion_edit.css') }}">
		@endif
		@if(Route::is('boutique_index'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/boutique_index.css') }}">
		@endif
		@if(Route::is('boutique_articles'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/boutique_articles.css') }}">
		@endif
		@if(Route::is('commande_reussie'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/commande_reussie.css') }}">
		@endif
		@if(Route::is('reset_password_user_index'))
			<link rel="stylesheet" type="text/css" href="{{ asset('styles/reset_password_user.css') }}">
		@endif
	</head>

	<body>

		<div class="super_container">

			<!-- Header -->

			<header class="header trans_300">

				<!-- Top Navigation -->

				<div class="top_nav">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="top_nav_left">livraison gratuit sur toutes vos commandes</div>
							</div>
							<div class="col-md-6 text-right">
								<div class="top_nav_right">
									<ul class="top_nav_menu">

										<!-- Currency / Language / My Account -->

										<!--li class="currency">
											<a href="#">
												usd
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="currency_selection">
												<li><a href="#">cad</a></li>
												<li><a href="#">aud</a></li>
												<li><a href="#">eur</a></li>
												<li><a href="#">gbp</a></li>
											</ul>
										</li-->
										@auth
											@if((Auth::user()->role_id == 5) === false)
											<li class="language">
												<a href="">
													Admin
													<i class="fa fa-angle-down"></i>
												</a>
												<ul class="language_selection">
													<li><a href="{{ route('Profil.index') }}">Profil</a></li>
													@if(Auth::user()->role_id == 1)
													<li><a href="{{ route('Agents.index') }}">Agents</a></li>
													<li><a href="{{ route('Gestion.index') }}">Gestion</a></li>
													<li><a href="{{ route('boutique_index') }}">Boutique</a></li>
													@endif
													<li><a href="#">Visites</a></li>
												</ul>
											</li>
											@endif
										@endauth
										<li class="account">
											@guest
											<a href="#">
												Mon compte
												<i class="fa fa-angle-down"></i>
											</a>
											@endguest
											@auth
											<a href="#">
												{{ Auth::user()->email }}
												<i class="fa fa-angle-down"></i>
											</a>
											@endauth
											<ul class="account_selection">
												@guest
												<li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Connexion</a></li>

												<li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>S'inscrire</a></li>
												@endguest
												@auth
						                        	<form method="POST" action="{{ route('logout') }}">
							                            @csrf

							                            <a href=""><button type="submit" class="btn btn-second">Deconnexion</button></a>
							                        </form>
							                    @endauth

											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Main Navigation -->

				<div class="main_nav_container">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 text-right">
								<div class="logo_container">
									<a href="{{ route('index') }}">
										<img src="{{ asset('images/logo/LOGO-NA-NDAKU.jpg') }}" class="logo">
									</a>
								</div>
								<nav class="navbar">
									<ul class="navbar_menu">
										<li><a href="{{ route('categorie', ['id' => 'homme']) }}">Homme</a></li>
										<li><a href="{{ route('categorie', ['id' => 'femme']) }}">Femme</a></li>
										<li><a href="{{ route('categorie', ['id' => 'enfant']) }}">Enfants</a></li></li>
										@auth
											@if(Auth::user()->role_id == 5)
												<li><a href="{{ route('Livraison.index') }}">Commandes</a></li>
											@endif
										@endauth
										<li><a href="">apropos</a></li>
										@guest
										<li><a href="{{ route('register') }}" class="btn btn-primary" id="btn">S'Inscrire</a></li>
										<li><a href="{{ route('login') }}" class="btn btn-primary" id="btn">Connexion</a></li>
										@endguest
									</ul>
									<ul class="navbar_user">
										<!--li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li-->
										@auth
											<!--li><a href="{{ route('Profil.index') }}"><i class="fa fa-user" aria-hidden="true"></i></a></li-->

											<li class="checkout">
												@if(Auth::user()->role_id == 1)
												<a href="{{ route('Livraison.index') }}">
												@elseif(Auth::user()->role_id == 4)
												<a href="{{ route('Livraison.index') }}">
												@elseif(Auth::user()->role_id == 5)
												<a href="{{ route('Panier.index') }}">
												@endif
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
													<span id="checkout_items" class="checkout_items">
													@if(Auth::user()->role_id == 1)
													{{ count($notification) }}
													@endif

													@if(Auth::user()->role_id == 4)
													{{ count($notification) }}
													@endif

													@if(Auth::user()->role_id == 5)
													{{ count($notification) }}
													@endif
													</span>
												</a>
											</li>
										@endauth
									</ul>
									<div class="hamburger_container">
										<i class="fa fa-bars" aria-hidden="true"></i>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>

			</header>

			<!-- RESPONSIVE -->
			<div class="fs_menu_overlay"></div>
			<div class="hamburger_menu">
				<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
				<div class="hamburger_menu_content text-right">
					<ul class="menu_top_nav">

						<li class="menu_item has-children">
							@auth
							<a href="#" id="a-email">
								<i class="fa fa-angle-down"></i>
								{{ Auth::user()->email }}
							</a>
							@endauth
							@guest
							<a href="#" id="a-compte">
								<i class="fa fa-angle-down"></i>
								Mon compte
							</a>
							@endguest
							<ul class="menu_selection">
								@guest
									<li><a href="{{ route('register') }}" id="a-compte">S'inscrire</a></li>
									<li><a href="{{ route('login') }}" id="a-compte">Connexion</a></li>
								@endguest
								@auth
									<li><a href="{{ route('Profil.index') }}" id="a">Profil</a></li>
									<li>
										<a href="#">
											<form method="POST" action="{{ route('logout') }}">
				                            	@csrf
				                            	<button type="submit" class="btn btn-second mt-0">Deconnexion</button>
				                        	</form>
										</a>
									</li>
								@endauth
							</ul>
						</li>
						
						@auth

							@if((Auth::user()->role_id == 5) === false)

								<li class="menu_item has-children">
									<a href="">
										<i class="fa fa-angle-down"></i>
										Admin
									</a>
									<ul class="menu_selection">
										@if(Auth::user()->role_id == 1)
										<li><a href="{{ route('Agents.index') }}" id="a">Agents</a></li>
										<li><a href="{{ route('Gestion.index') }}" id="a">Gestion</a></li>
										<li><a href="{{ route('boutique_index') }}" id="a">Boutique</a></li>
										@endif
										<li><a href="#" id="a">Spanish</a></li>
									</ul>
								</li>

							@endif

						@endauth
						<li class="menu_item has-children">
							<ul class="menu_selection">
								<!--li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Connexion</a></li>
								<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Inscription</a></li-->
								@guest
								<li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Connexion</a></li>

								<li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>S'inscrire</a></li>
								@endguest
								@auth
		                        	<form method="POST" action="{{ route('logout') }}">
			                            @csrf
			                            <a href=""><button type="submit">Deconnexion</button></a>
			                        </form>
			                    @endauth
							</ul>
						</li>
						<li class="menu_item"><a href="{{ route('categorie', ['id' => 'homme']) }}">Homme</a></li>
						<li class="menu_item"><a href="{{ route('categorie', ['id' => 'femme']) }}">Femme</a></li>
						<li class="menu_item"><a href="{{ route('categorie', ['id' => 'enfant']) }}">Enfant</a></li>
						<li class="menu_item"><a href="#">Apropos</a></li>
					</ul>
				</div>
			</div>

			<!-- Slider -->

			

			<!-- LES BODY -->

			@yield('body-home')

			<!-- INSCRIPTION -->
			@yield('body-inscription')

			<!-- LOGIN -->
			@yield('body-connexion')

			<!-- COMPLETION DU COMPTE -->
			@yield('body-completion')

			<!-- Body users -->
			@yield('body-users')

			<!-- BODY PROFIL -->
			@yield('body-profil-index')
			@yield('body-profil-edit')
			@yield('body-password-edit')

			<!-- ARTICLE -->
			@yield('body-article-show')
			@yield('body-article-edit')

			<!-- ARTICLE -->
			@yield('body-article-panier')

			<!-- CATEGORIE -->
			@yield('body-categorie')

			<!-- LIVRAISONS -->
			@yield('body-livraisons-index')

			<!-- FACTURE -->
			@yield('body-facture')

			@yield('body-commande-reussie')

			<!-- GESTION -->
			@yield('body-gestion-index')
			@yield('body-gestion-edit')

			<!-- BOUTIQUE -->
			@yield('body-boutique')
			@yield('body-boutique-articles')

			<!-- RESET PASSWORD -->
			@yield('reset_password')

			<!-- ENDBODY -->

			@if(!Route::is('login') && !Route::is('register'))
				<!-- Footer -->
				@include('layouts.footer.footer')
			@endif

		</div>

			<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
			<script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
			<script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
			<script src="{{ asset('plugins/Isotope/isotope.pkgd.min.js') }}"></script>
			<script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
			<script src="{{ asset('plugins/easing/easing.js') }}"></script>
			<script src="{{ asset('js/custom.js') }}"></script>
		
			@if(Route::is('Articles.show'))
				<script src="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
				<script src="{{ asset('js/single_custom.js') }}"></script>
			@endif

			@if(Route::is('categorie') OR Route::is('article.search'))
				<script src="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
				<script src="{{ asset('js/categories_custom.js') }}"></script>
			@endif

			@if(Route::is('register'))
				<!--cript>
					var onloadCallback = function() {
						alert("grecaptcha is ready!");
					};
				</script-->
			@endif
		<script src="https://use.fontawesome/8c14f362f7.js"></script>
	</body>

</html>
<?php
	use Illuminate\Support\Facades\Session;
	Session::forget('erreur');
	Session::forget('succes');
?>