<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class Reset_password extends Controller
{
    public function index($id)
    {
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

    public function reset(Request $request, $id)
    {
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
