<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Articles;
use App\Models\Pours;
use App\Models\Gestions;
use App\Models\Modeles;

class Categorie extends Controller
{
    public function index($id)
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
            
            $gestion = Gestions::find(1);
            $pour = Pours::select('id')->where('pour', $id)->first()->id;

            $articles = Articles::where('pour_id', $pour)
                                ->orderBy('created_at', 'desc')
                                ->paginate(80);
            $modeles = Modeles::All();

            return view('pages.article.categorie', [
                'notification' => parent::commande(),
                'gestion' => $gestion,
                'articles' => $articles,
                'modeles' => $modeles,
            ]);

        } catch (Exception $e) {

            return redirect()->route('404');
            
        }
        
    }
}
