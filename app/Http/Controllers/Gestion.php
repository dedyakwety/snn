<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gestions;
use App\Models\Partages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Gestion extends Controller
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

        $gestion = Gestions::findOrFail(1);
        $partages = Partages::where('valide', true)
                            ->orderBy('created_at', 'desc')
                            ->take(50)
                            ->get();

        return view('pages.gestion.gestion_index', [
            'gestion' => $gestion,
            'partages' => $partages,
            'notification' => parent::commande(),
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // VERIFIER POUR REDIRIGER L'UTILISATEUR SI LE COMPTE N'EST PAS COMPLETER
        if((Auth::user()->role_id == 1) && (count(Gestions::all()) == 0))
        {
            return redirect()->route('Completion_compte.index');

        } elseif(((Auth::user()->role_id == 5) === false) && (Auth::user()->adresse_id === null)){

            return redirect()->route('Completion_compte.index');

        }
        
        try {
            
            $gestion = Gestions::find(1);

            return view('pages.gestion.gestion_edit', [
                'gestion' => $gestion,
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
        $gestion = Gestions::find($id);
        
        $request->validate([
            'gain_1' => ["required"],
            'gain_2' => ["required"],
            'remise' => ["required"],
            'transport' => ["required"],
            'depense' => ["required"],
            'agent' => ["required"],
            'admin' => ["required"],
            'entreprise' => ["required"],
            'password' => ["required"],
        ]);

        try {
            
            if(password_verify($request->password, Auth::user()->password))
            {
                Gestions::find($id)
                        ->update([
                            'gain_1' => $request->gain_1,
                            'gain_2' => $request->gain_2,
                            'remise' => $request->remise,
                            'transport' => $request->transport,
                            'depense' => $request->depense,
                            'agent' => $request->agent,
                            'admin' => $request->admin,
                            'entreprise' => $request->entreprise,
                        ]);

                Session::put('succes', 'Informations modifier avec succès');

            } else{
                Session::put('erreur', 'Mot de passe incorrect');
                return redirect()->route('Gestion.edit', $gestion->id);
            }

            return redirect()->route('Gestion.index');

        } catch (Exception $e) {
            return redirect()->route('404');
        }
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
