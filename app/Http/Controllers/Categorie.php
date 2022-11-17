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
        
        try {
            
            $gestion = Gestions::find(1);
            $pour = Pours::select('id')->where('pour', $id)->first()->id;

            $articles = Articles::where('pour_id', $pour)
                                ->orderBy('created_at', 'desc')
                                ->paginate(5);
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
