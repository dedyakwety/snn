<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\Home@index')->name('index');

// COMPLETION COMPTE
Route::resource('/Completion_compte', 'App\Http\Controllers\Completer_compte')->middleware(['auth']);

// PROFIL
Route::resource('/Profil', 'App\Http\Controllers\Profil')->middleware(['auth']);

// MOT DE PASSE
Route::resource('/Mot_de_passe', 'App\Http\Controllers\Mot_de_passe')->middleware(['auth']);

// 404
Route::get('/Erreur/404', 'App\Http\Controllers\Erreur@erreur_404')->name('404');

// AGENTS
Route::resource('/Agents', 'App\Http\Controllers\Users')->middleware(['auth']);

// A PROPOS
Route::resource('/Apropos', 'App\Http\Controllers\Apropos');

// VALIDATION AGENT
Route::post('/Validation_agent', 'App\Http\Controllers\Valider_agent@validation_agent')->middleware(['auth'])->name('valider_agent');

//ARTICLES
Route::resource('/Articles', 'App\Http\Controllers\Article');
Route::get('/Search', 'App\Http\Controllers\Recherche@search')->name('article.search');

// CATEGORIES
Route::get('/Categorie/{id}', 'App\Http\Controllers\Categorie@index')->name('categorie');

// PANIER
Route::resource('/Panier', 'App\Http\Controllers\Panier')->middleware(['auth']);

// MODIFICATION COMMANDE
Route::get('/commande/{id}', 'App\Http\Controllers\Update_commande@index')->middleware(['auth'])->name('commande_index');
Route::get('/Upade_commande/{id}', 'App\Http\Controllers\Update_commande@update_quantite')->middleware(['auth'])->name('update_commande_view');
Route::post('/Update_commande', 'App\Http\Controllers\Update_commande@update')->middleware(['auth'])->name('update_commande');
Route::get('/retrait_article/{id}', 'App\Http\Controllers\Update_commande@delete')->middleware(['auth'])->name('article_delete');
Route::get('/annulation_commande/{id}', 'App\Http\Controllers\Update_commande@annulation')->middleware(['auth'])->name('annulation_commande');

// LIVRAISON
Route::resource('/Livraison', 'App\Http\Controllers\Livraison')->middleware(['auth']);

// CLIENT
Route::middleware(['auth'])->group(function() {
    Route::get('/Clients', 'App\Http\Controllers\Client@index')->name('client_index');
    Route::post('/Search', 'App\Http\Controllers\Client@search')->name('client_search');
});

// FACTURE ET IMPRESSION
Route::get('/facture/{id}', 'App\Http\Controllers\Facture@viewFature')->middleware(['auth'])->name('viewFacture');
Route::get('/telechargement/facture/{id}', 'App\Http\Controllers\Facture@telecharger_facture')->name('telechargement');

// COMMANDE REUSSIE
Route::get('/Commande-reussie', 'App\Http\Controllers\Facture@commande_reussie')->name('commande_reussie');

// GESTION
Route::resource('/Gestion', 'App\Http\Controllers\Gestion')->middleware(['auth']);

// BOUTIQUE
Route::get('/Boutiques', 'App\Http\Controllers\Boutique@index')->name('boutique_index');
Route::post('/Boutique/Ajout', 'App\Http\Controllers\Boutique@store')->name('boutique_store');
Route::get('/Boutique/{id}', 'App\Http\Controllers\Boutique@articles')->name('boutique_articles');

// RESET PASSWORD USER
Route::get('/Reset_password_user/{id}', 'App\Http\Controllers\Reset_password@index')->middleware(['auth'])->name('reset_password_user_index');
Route::post('/Reset_password/{id}', 'App\Http\Controllers\Reset_password@reset')->middleware(['auth'])->name('reset');

// MESSAEGES
Route::post('/Store_message', 'App\Http\Controllers\Message@store')->name('store_message');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
