<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Gestions;
use App\Models\Boutiques;
use App\Models\Pours;
use App\Models\Categories;
use App\Models\Modeles;
use App\Models\Articles;
use App\Models\Commandes;

class Home extends Controller
{
    public function index()
    {
        
        //visits(Articles::All())->increment();
        
        $articles = Articles::where('valide', true)
                            ->orderBy('created_at', 'desc')
                            ->paginate(60);
        
        //visits(articles::findOrFail(1))->increment();

        if(count($articles) > 0)
        {
            $gestion = Gestions::findOrFail(1);

        } else{
            
            $gestion = "";
        }

        if(auth()->check())
        {
            $boutiques = Boutiques::All();
            $pours = Pours::All();
            $categories = Categories::All();
            $modeles = Modeles::All();

            // VERIFIER POUR REDIRIGER L'UTILISATEUR SI LE COMPTE N'EST PAS COMPLETER
            parent::completer_compte();
            
            return view('pages.home', [
                'gestion' => $gestion,
                'articles' => $articles,
                'boutiques' => $boutiques,
                'pours' => $pours,
                'categories' => $categories,
                'modeles' => $modeles,
                'notification' => parent::commande(),
            ]);

        } else{

            return view('pages.home', [
                'gestion' => $gestion,
                'articles' => $articles,
            ]);
        }

    }
}
