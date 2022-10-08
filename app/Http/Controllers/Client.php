<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Livraisons;

class Client extends Controller
{
    public function index ()
    {
        $clients = User::where('role_id', 5)
                        ->orderBy('prenom', 'desc')
                        ->paginate(50);

        // LES COMMANDES LIVREES
        $livraisons = Livraisons::All()
                                ->where('livree', true);
        $numero = 1;

        return view('pages.client.client', [
            'notification' => parent::commande(),
            'clients' => $clients,
            'numero' => $numero,
            'livraisons' => $livraisons,
        ]);
    }

    public function search (Request $request)
    {
        dd("dedy");
    }
}
