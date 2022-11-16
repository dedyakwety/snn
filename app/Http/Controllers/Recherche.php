<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Pours;
use App\Models\Gestions;
use App\Models\Modeles;

class Recherche extends Controller
{
    public function search(Request $request)
    {
        // VERIFIER POUR REDIRIGER L'UTILISATEUR SI LE COMPTE N'EST PAS COMPLETER
        parent::completer_compte();

        $q = request()->input('q');

        $gestion = Gestions::find(1);

        $articles = Articles::where('commentaire', 'like', "%$q%")
                            ->orderBy('created_at', 'desc')
                            ->paginate(120);

        return view('pages.article.search', [
            'notification' => parent::commande(),
            'gestion' => $gestion,
            'articles' => $articles,
            'search' => $q,
        ]);
    }
}
