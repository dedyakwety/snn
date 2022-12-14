<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Pours;
use App\Models\Gestions;
use App\Models\Modeles;
use Illuminate\Support\Facades\Auth;

class Recherche extends Controller
{
    public function search(Request $request)
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

        $q = request()->input('q');

        $gestion = Gestions::find(1);

        $modeles = Modeles::All();

        $articles = Articles::where('commentaire', 'like', "%$q%")
                            ->orderBy('created_at', 'desc')
                            ->paginate(120);
                   
        //$id_modele = Modeles::select('id')->where('modele', $q)->first()->id;
        
        /*$articles = Articles::where('modele_id', $id_modele)
                            ->orderBy('created_at', 'desc')
                            ->paginate(120);*/

        return view('pages.article.search', [
            'notification' => parent::commande(),
            'gestion' => $gestion,
            'modeles' => $modeles,
            'articles' => $articles,
            'search' => $q,
        ]);
    }
}
