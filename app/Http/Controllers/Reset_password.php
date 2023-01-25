<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gestions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class Reset_password extends Controller
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

        if(Auth::user()->role_id == 1)
        {
            $agent = User::findOrFail($id);

            return view('pages.gestion.reset_password_user', [
                'notification' => parent::commande(),
                'agent' => $agent,
            ]);

            Session::put('succes', 'Reinitialisation de mot de passe réussie avec succès');
            return redirect()->route('reset_password_user_index', $agent->id);

        } else{
            Session::put('erreur', 'Mot de passe incorect');
            return redirect()->route('404');
        }
    }

    // FORMULAIRE POUR LES INFOS POUR CODE D'ACCES ET LE NOUVEAU MOT DE PASSE
    public function form_plus($id)
    {
        $users = User::select('liens_reset_password')->where('valide', true)->get();
        foreach($users as $user)
        {
            $tab = [];
            array_push($tab, $user->liens_reset_password);
        }

        if(in_array($id, $tab))
        {
            $email = User::select('email')->where('liens_reset_password', $id)->first()->email;

            return view('pages.user.form_plus', [
                'email' => $email,
            ]);

        } else{
            
            return redirect()->route('404');
        }
    }

    // TRAITEMENT DE CHANGEMENT
    public function traitement_reset_password(Request $request)
    {
        dd("dedy");
    }

    public function reset(Request $request, $id)
    {
        // VERIFIER POUR REDIRIGER L'UTILISATEUR SI LE COMPTE N'EST PAS COMPLETER
        parent::completer_compte();
        
        if(Auth::user()->role_id == 1)
        {
            $agent = User::findOrFail($id);
            if(password_verify($request->password, Auth::user()->password))
            {
                $password = "snn"."&".Auth::user()->postnom."".rand(100000, 999999)."pdg";

                User::findOrFail($id)->update([
                    'password' => Hash::make($password),
                ]);

                dd($password);

            } else{

                return redirect()->route('reset_password_user_index', $agent->id);
            }

        } else{

            return redirect()->route('404');
        }
    }
}
