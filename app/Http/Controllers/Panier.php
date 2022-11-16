<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Commandes;
use App\Models\Articles;
use App\Models\Gestions;
use App\Models\Livraisons;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Panier extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // VERIFIER POUR REDIRIGER L'UTILISATEUR SI LE COMPTE N'EST PAS COMPLETER
        parent::completer_compte();

        try {

            if(auth()->check())
            {
                $gestion = Gestions::findOrFail(1);

                if(Auth::user()->role_id == 1)
                {
                    $commandes = [];
                } elseif(Auth::user()->role_id == 5)
                {
                    $commandes = Commandes::where('user_id', Auth::user()->id)
                                            ->where('valide', 0)
                                            ->orderBy('created_at', 'desc')
                                            ->take(50)
                                            ->get();
                }

                return view('pages.article.panier', [
                    'gestion' => $gestion,
                    'commandes' => $commandes,
                    'notification' => parent::commande(),
                ]);
                
            } else{
                return redirect()->route('404');
            }
            
        } catch (Exception $e) {
            return redirect()->route('404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $gestion = Gestions::findOrFail(1);
            $article = Articles::findOrFail($request->id_article);
            
            if(auth()->check())
            {
                $request->validate([
                    'id_article' => ['required'],
                    'taille' => ['required'],
                    'quantite' => ['required'],
                ]);
                
                if($article->prix < 20)
                {
                    $prix_total = ((double)$article->prix + (double)$gestion->gain_1) * (int)$request->quantite;

                    $prix_achat = (double)$article->prix * (int)$request->quantite;

                    $prix_unitaire = (double)$article->prix + (double)$gestion->gain_1;

                } elseif($article->prix >= 20){
                    $prix_total = ((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) * (int)$request->quantite;

                    $prix_achat = (double)$article->prix * (int)$request->quantite;

                    $prix_unitaire = (double)$article->prix / 100 * (double)$gestion->gain_2 + (double)$article->prix;
                }
                
                Commandes::create([
                    'user_id' => Auth::user()->id,
                    'article_id' => $request->id_article,
                    'taille' => $request->taille,
                    'prix_achat' => $prix_achat,
                    'prix_unitaire' => $prix_unitaire,
                    'quantite' => $request->quantite,
                    'prix_total' => $prix_total,
                ]);
                // RETOURNER USER A L'ACCUEIL
                return redirect()->route('index');

            } else{

                // CLIENT SANS COMPTE
                $request->validate([
                    'quantite' => ['required'],
                    'taille' => ['required'],
                    'date_livraison' => ['required'],
                    'heure_livraison' => ['required'],
                    'contact' => ['required'],
                    'adresse_livraison' => ['required'], 
                ]);
                
                if($article->prix < 20)
                {
                    $prix_total = ((double)$article->prix + (double)$gestion->gain_1) * (int)$request->quantite;

                    $prix_achat = (double)$article->prix * (int)$request->quantite;

                    $prix_unitaire = ((double)$article->prix + (double)$gestion->gain_1) * (int)$request->quantite;

                } elseif($article->prix >= 20){
                    $prix_total = ((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) * (int)$request->quantite;

                    $prix_achat = (double)$article->prix * (int)$request->quantite;

                    $prix_unitaire = (double)$article->prix / 100 * (double)$gestion->gain_2 + (double)$article->prix;
                }

                $livraison = Livraisons::create([
                    'date_livraison' => $request->date_livraison,
                    'heure_livraison' => $request->heure_livraison,
                    'adresse_livraison' => $request->adresse_livraison,
                    'nombre_article' => $request->quantite,
                    'prix_achat' => $prix_achat,
                    'prix_total' => $prix_total,
                ])->id;
                
                Commandes::create([
                    'article_id' => $request->id_article,
                    'livraison_id' => $livraison,
                    'taille' => $request->taille,
                    'prix_achat' => $prix_achat,
                    'prix_unitaire' => $prix_unitaire,
                    'quantite' => $request->quantite,
                    'prix_total' => $prix_total,
                    'valide' => true,
                ]);
                // RETOURNER USER A L'ACCUEIL
                return redirect()->route('commande_reussie');

            }

        } catch (Exception $e) {
            return redirect()->route('404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // VERIFIER POUR REDIRIGER L'UTILISATEUR SI LE COMPTE N'EST PAS COMPLETER
        parent::completer_compte();
        
        try {

            $gestion = Gestions::findOrFail(1);
            $article = Commandes::findOrFail($id);
            
            return view('pages.article.article_edit', [
                'gestion' => $gestion,
                'article' => $article,
                'notification' => parent::commande(),
                'tailles_1' => parent::taille_lettre(),
                'tailles_2' => parent::taille_chiffre(),
            ]);

        } catch (Exception $e) {

            return redirect()->route('404');

        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // VERIFIER POUR REDIRIGER L'UTILISATEUR SI LE COMPTE N'EST PAS COMPLETER
        parent::completer_compte();
        
        $request->validate([
            'taille' => ['required'],
            'quantite' => ['required'],
        ]);
        
        $commande = Commandes::findOrFail($id);
        $prix_achat = (double)Articles::findOrFail($commande->article_id)->prix * (double)$request->quantite;
        $prix_total = (double)$commande->prix_unitaire * (double)$request->quantite;
        
        $commande->update([
            'taille' => $request->taille,
            'prix_achat' => $prix_achat,
            'quantite' => $request->quantite,
            'prix_total' => $prix_total,
        ]);

        return redirect()->route('Panier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $article = Commandes::findOrFail($id);
            $article->delete();

            return redirect()->route('Panier.index');

        } catch (Exception $e) {
            return redirect()->route('404');
        }
        
    }
}
