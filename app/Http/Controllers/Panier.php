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
        if(auth()->check())
        {
            // VERIFIER POUR REDIRIGER L'UTILISATEUR SI LE COMPTE N'EST PAS COMPLETER
            if((Auth::user()->role_id == 1) && (count(Gestions::all()) == 0))
            {
                return redirect()->route('Completion_compte.index');

            } elseif(((Auth::user()->role_id == 5) === false) && (Auth::user()->adresse_id === null)){

                return redirect()->route('Completion_compte.index');

            }
        }

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
                                            
                    $prix_total = $commandes->sum('prix_total');
                }

                return view('pages.article.panier', [
                    'gestion' => $gestion,
                    'commandes' => $commandes,
                    'notification' => parent::commande(),
                    'prix_total' => $prix_total,
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
                
                // ENREGISTREMENT DANS LE PANIER
                $prix_total = (double)$article->prix_vente * (int)$request->quantite;

                $prix_achat = (double)$article->prix * (int)$request->quantite;

                $prix_unitaire = (double)$article->prix_vente;
                
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

                if($request->email)
                {
                    $email = $request->email;
                } else{
                    $email = null;
                }
                
                
                    $prix_total = (double)$article->prix_vente * (int)$request->quantite;

                    $prix_achat = (double)$article->prix * (int)$request->quantite;

                    $prix_unitaire = (double)$article->prix_vente;

                $livraison = Livraisons::create([
                    'date_livraison' => $request->date_livraison,
                    'heure_livraison' => $request->heure_livraison,
                    'adresse_livraison' => $request->adresse_livraison,
                    'nombre_article' => $request->quantite,
                    'prix_achat' => $prix_achat,
                    'prix_total' => $prix_total,
                    'email' => $email,
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
        if(auth()->check())
        {
            // VERIFIER POUR REDIRIGER L'UTILISATEUR SI LE COMPTE N'EST PAS COMPLETER
            if((Auth::user()->role_id == 1) && (count(Gestions::all()) == 0))
            {
                return redirect()->route('Completion_compte.index');

            } elseif(((Auth::user()->role_id == 5) === false) && (Auth::user()->adresse_id === null)){

                return redirect()->route('Completion_compte.index');

            }
        }
        
        try {

            if(auth()->check())
            {
                $gestion = Gestions::findOrFail(1);
                $article = Commandes::findOrFail($id);
                
                return view('pages.article.article_edit', [
                    'gestion' => $gestion,
                    'article' => $article,
                    'notification' => parent::commande(),
                    'tailles_1' => parent::taille_lettre(),
                    'tailles_2' => parent::taille_chiffre(),
                ]);

            } else {
                return redirect()->route('404');
            }

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
        if(auth()->check())
        {

            // VERIFIER POUR REDIRIGER L'UTILISATEUR SI LE COMPTE N'EST PAS COMPLETER
            if((Auth::user()->role_id == 1) && (count(Gestions::all()) == 0))
            {
                return redirect()->route('Completion_compte.index');

            } elseif(((Auth::user()->role_id == 5) === false) && (Auth::user()->adresse_id === null)){

                return redirect()->route('Completion_compte.index');

            }
            
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

        } else {
            return redirect()->route('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->check())
        {
            try {
                $article = Commandes::findOrFail($id);
                $article->delete();

                return redirect()->route('Panier.index');

            } catch (Exception $e) {
                return redirect()->route('404');
            }
        } else {
            return redirect()->route('404');
        }
        
    }
}
