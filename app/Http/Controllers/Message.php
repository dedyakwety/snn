<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use Illuminate\Support\Facades\Session;
use App\Models\Gestion;

class Message extends Controller
{
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

        return view('pages.messages', [
            'notification' => parent::commande(),
        ]);
    }

    public function store(Request $request)
    {
        
        if(auth()->check())
        {
            $resuest->validate([
                'message' => ['required'],
            ]);

            Messages::create([
                'user_id' => Auth::user()->id,
                'nom' => Auth::user()->name,
                'contact' => Auth::user()->contact,
                'email' => Auth::user()->email,
                'message' => $request->message,
            ]);

        } else{

            $request->validate([
                'nom' => ['required'],
                'contact' => ['required'],
                'email' => ['required'],
                'message' => ['required'],
            ]);

            Messages::create([
                'nom' => $request->nom,
                'contact' => $request->contact,
                'email' => $request->email,
                'message' => $request->message,
            ]);
            
        }
        
        Session::put('succes_footer', 'Merci pour votre message, donnez nous quelques minutes...');
        return redirect(Session::get('chemin'));

    }
}
