<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;

class Message extends Controller
{
    public function store(Request $request)
    {
        if(auth()->check())
        {
            $resuest->validate([
                'message' => ['required'],
            ]);

        } else{

            $request->validate([
                'nom' => ['required'],
                'contact' => ['required'],
                'contact' => ['required'],
                'message' => ['required'],
            ]);

            Messages::create([
                'nom' => $request->nom,
                'contact' => $request->contact,
                'email' => $request->email,
                'message' => $request->message,
            ]);
            
        }
        dd("dedy");

    }
}
