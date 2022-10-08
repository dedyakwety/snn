<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Boutiques;
use App\Models\Articles;

class Boutique extends Controller
{
    public function index()
    {
        $numero = 1;
        $numero_2 = 1;
        $boutiques = Boutiques::All();

        return view('pages.boutique.boutique_index', [
            'notification' => parent::commande(),
            'boutiques' => $boutiques,
            'numero' => $numero,
            'numero_2' => $numero_2,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_boutique' => ['required'],
            'contact_boutique' => ['required'],
            'password' => ['required'],
        ]);

        try {
            
            if(password_verify($request->password, Auth::user()->password))
            {
                Boutiques::create([
                    'nom' => $request->nom_boutique,
                    'contact_whatsapp' => $request->contact_boutique,
                ]);
                Session::put('succes', 'Boutique ajouter avec succès');

            } else{
                Session::put('erreur', 'Mot de passe incorect');
            }

        } catch (Exception $e) {
            return redirect()->route('404');
        }
        return redirect()->route('boutique_index');
    }

    public function articles($id)
    {
        $id_boutique = Boutiques::select('id')->where('nom', $id)->first()->id;
        $boutique = Boutiques::findOrFail($id_boutique);
        $articles = Articles::where('boutique_id', $id_boutique)
                            ->orderBy('created_at', 'desc')
                            ->take(400)
                            ->get();
        
        return view('pages.boutique.boutique_articles', [
            'notification' => parent::commande(),
            'boutique' => $boutique,
            'articles' => $articles,
        ]);
    }
}
