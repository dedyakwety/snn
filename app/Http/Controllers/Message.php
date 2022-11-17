<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use Illuminate\Support\Facades\Session;

class Message extends Controller
{
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
        
        Session::put('succes', 'Merci pour votre message, donnez nous quelques minutes...');
        return redirect(Session::get('chemin'));

    }
}
