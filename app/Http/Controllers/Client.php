<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Livraisons;
use App\Models\Gestions;
use Illuminate\Support\Facades\Auth;

class Client extends Controller
{
    public function index ()
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

        $clients = User::where('role_id', 5)
                        ->orderBy('name', 'asc')
                        ->paginate(50);
        foreach($clients as $client)
        {
            echo $client->id;
        }
        dd();
        $nombre_client = User::where('role_id', 5)->count();

        // LES COMMANDES LIVREES
        $livraisons = Livraisons::All()
                                ->where('livree', true);
        $numero = 1;

        return view('pages.client.client', [
            'notification' => parent::commande(),
            'nombre_client' => $nombre_client,
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
