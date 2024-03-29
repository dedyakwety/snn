<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Reset_password;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Vérifier si l'adresse email ests bien dans la base de données
        if(User::where('email', $request->email)->exists())
        {
            $user = User::findOrFail(User::select('id')->where('email', $request->email)->first()->id);
            
            // id de  user de l'adresse, adresse email, 10 chiffres générés
            $code_reset = rand(10000, 99999);
            $liens_1 = $user->id."".$user->prenom."".$user->name."".$user->email."".rand(1000000000, 9999999999)."".$code_reset;

            // ENREGISTRE LE LIEN DANS LA BDD
            $user->update([
                'code_reset' => $code_reset,
                'liens_reset_password' => Hash::make($liens_1),
            ]);

            $infos = ['code' => $code_reset, 'liens' => $user->liens_reset_password];
            // ENVOI DU CODE DE RESET
            Mail::to($request->email)->send(new Reset_password($infos));
            
            return redirect()->route('infos_reset_password', $user->liens_reset_password);

        } else{
            
            return redirect()->route('login');

        }
        
        $adresse = User::select('email')->where('email', 'somba.na.ndaku@gmail.com')->first()->email;

        dd($adresse);

        // Récupérer l'id de l'adresse encours Vérifier si l'adresse email existe dans la bdd
        //$user = User::findOrFail(User::select('id')->where('email', $request->email);

        
        // creer le liens suivant

        dd($request->email);
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        /*$status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);*/
    }
}
