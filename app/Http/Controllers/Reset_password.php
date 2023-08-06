<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gestions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
    public  function infos_reset_password($id)
    {
        // VERIFIER SI LE LIENS EXISTE
        if(User::where('liens_reset_password', $id)->exists())
        {
            $email = User::select('email')->where('liens_reset_password', $id)->first()->email;
            
            return view('pages.user.form_plus', [
                'email' => $email,
            ]);

        } else {
            return redirect()->route('404');
        }
       
    }

    // TRAITEMENT DE CHANGEMENT MOT DE PASSE
    public function traitement_reset(Request $request)
    {
        $request->validate([
            'code' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // RECUPERER USER DANS LA BDD
        $user = User::findOrFail(User::select('id')->where('email', $request->email)->first()->id);

        if($request->code == $user->code_reset)
        {
            $user->update([
                'password' => $request->password,
                'code_reset' => null,
                'liens_reset_password' => null,
            ]);

            Session::put('succes', 'Connectez vous avec le nouveau mot de passe');
            return redirect()->route('login');

        } else{

            Session::put('succes', 'Information incorecte');
            return redirect()->route('infos_reset_password', $user->liens_reset_password);
        }

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
