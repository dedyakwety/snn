<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Adresses;
use App\Models\Gestions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Profil extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        try {

            $user = User::findOrFail(Auth::user()->id);

            return view('pages.user.profil_index', [
                'user' => $user,
                'notification' => parent::commande(),
            ]);
            
        } catch (Exception $e) {
            echo "dedy";
            return redirect()->route('404');

        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {

            $request->validate([
                'nom' => ['required', 'string', 'max:255'],
                'postnom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string', 'max:255'],
                'sexe' => ['required', 'string', 'max:255'],
                'etat_civil' => ['required', 'string', 'max:255'],
                'contact_whatsapp' => ['required', 'min:9', 'max:10'],
                'contact' => ['required', 'min:9', 'max:10'],
                'numero' => ['required', 'max:10'],
                'avenue' => ['required', 'string', 'max:255'],
                'quartier' => ['required', 'string', 'max:255'],
                'commune' => ['required', 'string', 'max:255'],
            ]);
            // MODIFICATION PROFIL
            $user = User::findOrFail(Auth::user()->id)
                        ->update([
                            'name' => $request->nom,
                            'postnom' => $request->postnom,
                            'prenom' => $request->prenom,
                            'sexe' => $request->sexe,
                            'etat_civil' => $request->etat_civil,
                            'contact_whatsapp' => $request->contact_whatsapp,
                            'contact' => $request->contact,
                        ]);
            // MODOFICATION D'ADRESSE
            Adresses::findOrFail(Auth::user()->adresse_id)
                    ->update([
                        'numero' => $request->numero,
                        'avenue' => $request->avenue,
                        'quartier' => $request->quartier,
                        'commune' => $request->commune,
                    ]);

            Session::put('modification', 'Votre profil à été modifié avec sussès');
            return redirect()->route('Profil.index');

            
        } catch (Exception $e) {

            return redirect()->route('404');
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

        try {

            $user = User::findOrFail($id);

            return view('pages.user.profil_index', [
                'user' => $user,
                'notification' => parent::commande(),
            ]);
            
        } catch (Exception $e) {
            
            return redirect()->route('404');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

        } else{
            
            return redirect()->route('404');
        }
        
        try {

            $user = User::findOrFail(Auth::user()->id);

            return view('pages.user.profil_edit', [
                'user' => $user,
                'communes' => parent::communes(),
                'notification' => parent::commande(),
            ]);
            
        } catch (Exception $e) {
            
            return redirect()->route('404');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
