<!DOCTYPE html>
<html lang="en">
<head>
<title>somba na ndaku</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--meta http-equiv="refresh" content="15" /-->

<link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">

<link rel="shortcut icon" href="{{ asset('images/logo/logo.jpg') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('styles/header.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/responsive_header.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/footer.css') }}">

@if(Route::is('register'))
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/inscription.css') }}">
@endif

<link rel="stylesheet" type="text/css" href="{{ asset('styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/responsive.css') }}">

@if(Route::is('Completion_compte.index'))
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/completion.css') }}">
@endif

@if(Route::is('Agents.index'))
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/users.css') }}">
@endif

@if(Route::is('Profil.index') OR Route::is('Profil.show'))
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/profil-index.css') }}">
@endif

@if(Route::is('Profil.edit'))
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/profil-edit.css') }}">
@endif

@if(Route::is('Articles.show'))
	<link rel="stylesheet" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/single_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/single_responsive.css') }}">
@endif

@if(Route::is('Panier.index') OR Route::is('Panier.edit'))
	<link rel="stylesheet" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/panier_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/panier_responsive.css') }}">
@endif

@if(Route::is('Mot_de_passe.index'))
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/password_edit.css') }}">
@endif

@if(Route::is('Livraison.show'))
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/commandes_client.css') }}">
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

@if(Route::is('client_index'))
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/client_index.css') }}">
@endif

@if(Route::is('commande_index'))
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/detaille_commande.css') }}">
@endif

@if(Route::is('commande_reussie'))
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/commande_reussie.css') }}">
@endif

@if(Route::is('update_commande_view'))
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/commande_view.css') }}">
@endif

@if(Route::is('reset_password_user_index'))
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/reset_password_user.css') }}">
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
							<div class="top_nav_left">
								@guest
									livraison gratuit sur toutes vos commandes
								@endguest
								@auth
									@if(Auth::user()->role_id == 5)
										{{ "Client : " }}
									@else
										{{ Auth::user()->role->role." " }}
									@endif
								{{ Auth::user()->prenom." ".Auth::user()->postnom." ".Auth::user()->name }} 
								@endauth
							</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="top_nav_right">
								<ul class="top_nav_menu">

									<!-- Currency / Language / My Account -->

									@auth
											<!--li class="currency">
												<a href="#">
													Mes infos
													<i class="fa fa-angle-down"></i>
												</a>
												<ul class="currency_selection">
													<li><a href="#">cad</a></li>
													<li><a href="#">aud</a></li>
													<li><a href="#">eur</a></li>
													<li><a href="#">gbp</a></li>
												</ul>
											</li-->

										@if(Auth::user()->role_id == 5)
											<li class="language">
												<a href="">
													Mes achats
													<i class="fa fa-angle-down"></i>
												</a>
												<ul class="language_selection">
													<li><a href="{{ route('Livraison.index') }}">Commandes</a></li>
												</ul>
											</li>
										@endif

										@if((Auth::user()->role_id == 5) === false)
											<li class="language">
												<a href="">
													Admin
													<i class="fa fa-angle-down"></i>
												</a>
												<ul class="language_selection">
													@if(Auth::user()->role_id == 1)
													<li><a href="{{ route('Agents.index') }}">Agents</a></li>
													<li><a href="{{ route('Gestion.index') }}">Gestion</a></li>
													<li><a href="{{ route('boutique_index') }}">Boutique</a></li>
													<li><a href="{{ route('boutique_index') }}">
													<i class="entypo-eye"></i>
													Vu
													</a></li>
													@endif
													<li><a href="{{ route('client_index') }}">Clients</a></li>
												</ul>
											</li>
										@endif
									@endauth
									<li class="account">
										<a href="#">
											@auth
												{{ Auth::user()->email }}
											@endauth
											@guest
												Mom compte
											@endguest
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="account_selection">
											@guest
											<li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Connexion</a></li>
											<li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>S'inscrire</a></li>
											@endguest
											@auth
												<form method="POST" action="{{ route('logout') }}">
						                            @csrf
						                            <li><a href="{{ route('register') }}">
						                            	<button type="submit" class="btn btn-second">Deconnexion</button>
						                            </li></a>
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
						<div class="col-lg-12">
							<div class="logo_container">
								<a href="{{ route('index') }}">
									<img src="{{ asset('images/logo/logo.jpg') }}" alt="image-logo">
								</a>
							</div>
							<nav class="navbar">
								<ul class="navbar_menu">
									<li><a href="{{ route('index') }}">Accueil</a></li>
									<li><a href="{{ route('categorie', ['id' => 'homme']) }}">Hommes</a></li>
									<li><a href="{{ route('categorie', ['id' => 'femme']) }}">Femmes</a></li>
									<li><a href="{{ route('categorie', ['id' => 'enfant']) }}">Enfants</a></li>
									@auth
										@if((Auth()->user()->role_id == 1) OR (Auth()->user()->role_id == 2))
											<li><a href="{{ route('index_message') }}">messages</a></li>
										@endif
									@endauth
									<li><a href="#">apropos</a></li>
								</ul>
								<ul class="navbar_user">
								
									@auth
										<li><a href="{{ route('Profil.index') }}"><i class="fa fa-user" aria-hidden="true"></i></a></li>
									
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
													{{ $notification }}
													@endif

													@if(Auth::user()->role_id == 4)
													{{ $notification }}
													@endif

													@if(Auth::user()->role_id == 5)
													{{ $notification }}
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

		<div class="fs_menu_overlay"></div>
		<div class="hamburger_menu">
			<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
			<div class="hamburger_menu_content text-right">
				<ul class="menu_top_nav">

					<!--li class="menu_item has-children">
						<a href="#">
							usd
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							<li><a href="#">FC</a></li>
							<li><a href="#">USD</a></li>
						</ul>
					</li-->
					<li class="menu_item has-children">
						<a href="#" id="a">
							@guest
								Mon compte
							@endguest
							@auth
								{{ Auth::user()->email }}
							@endauth
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							@guest
							<li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Connexion</a></li>
							<li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Inscription</a></li>
							@endguest
							@auth
							<form method="POST" action="{{ route('logout') }}">
	                            @csrf
	                            <li><a href="{{ route('register') }}">
	                            	<button type="submit" class="btn btn-second" id="btn-logout">Deconnexion</button>
	                            </li></a>
	                        </form>
							@endauth
						</ul>
					</li>
					@auth
						<li class="menu_item has-children">
							<a href="#">
								@if(Auth::user()->role_id == 1)
									Admin
								@endif
								@if(Auth::user()->role_id == 5)
									Mes infos
								@endif
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="menu_selection">
								@if((Auth::user()->role_id == 5) === false)
									@if(Auth::user()->role_id == 1)
									<li><a href="{{ route('Agents.index') }}">Agents</a></li>
									<li><a href="{{ route('Gestion.index') }}">Gestion</a></li>
									<li><a href="{{ route('boutique_index') }}">Boutique</a></li>
									@endif
									<li><a href="{{ route('client_index') }}">Clients</a></li>
								@elseif(Auth::user()->role_id == 5)
									<li><a href="{{ route('Livraison.index') }}">Commandes</a></li>
								@endif
							</ul>
						</li>
					@endauth
					<li class="menu_item"><a href="{{ route('categorie', ['id' => 'homme']) }}">Hommes</a></li>
					<li class="menu_item"><a href="{{ route('categorie', ['id' => 'femme']) }}">Femmes</a></li>
					<li class="menu_item"><a href="{{ route('categorie', ['id' => 'enfant']) }}">Enfant</a></li>
					<li class="menu_item"><a href="#">A propos</a></li>
				</ul>
			</div>
		</div>

		@yield('home')

		@yield('categorie')

		@yield('inscription')

		@yield('users')

		@yield('connexion')

		@yield('recherche')

		@yield('profil-index')

		@yield('completion')

		@yield('panier')

		@yield('article-show')

		@yield('livraison-index')

		@yield('boutique')

		@yield('articles-boutique')

		@yield('detaille_commande')

		@yield('commande_quantite_view')

		@yield('commandes-client')

		@yield('facture')

		@yield('article-edit')

		@yield('gestion-index')

		@yield('gestion-edit')

		@yield('reset_password')

		@yield('body-password-edit')

		@yield('body-profil-edit')

		@yield('client-index')

		<div class="benefit">
			<div class="container">
				<div class="row benefit_row">
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>Livraison gratuit</h6>
								<p>à domicile, bureau etc...)</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>Paiement à domicile par :</h6>
								<p>espèce, range money, M-pesa, Airtel money</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>CommandeZ chaque jour 24h/24h dans en ligne</h6>
								<p></p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>6 jours de livraison :</h6>
								<p>du lundi au vendredi de 08h' à 15h30' et samedi de 08h' à 13h'</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	@if(!Route::is('login'))
		@include('layouts.footer.footer')
	@endif

@if(Route::is('categorie') OR Route::is('article.search'))
	<script src="{{ asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
	<script src="{{ asset('js/categories_custom.js') }}"></script>
@endif

	<script src="{{ asset('js/refresh_page.js') }}"></script>

	<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
	<script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
	<script src="{{ asset('plugins/Isotope/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
	<script src="{{ asset('plugins/easing/easing.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
<?php
	use Illuminate\Support\Facades\Session;
	Session::forget('erreur');
	Session::forget('succes');
?>