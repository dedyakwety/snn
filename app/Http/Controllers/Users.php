<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = User::where('role_id', '4')
                        ->orderBy('prenom', 'asc')
                        ->take(50)
                        ->get();

        $admins = User::where('valide', true)
                        ->orderBy('prenom', 'asc')
                        ->take(25)
                        ->get();
        
        $user = User::findOrFail(Auth::user()->id);
        $roles = Roles::All();
        
        return view('pages.gestion.users', [
            'admins' => $admins,
            'agents' => $agents,
            'user' => $user,
            'roles' => $roles,
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
        //
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
        $request->validate([
            'password' => ['required'],
        ]);

        $user = User::findOrFail($request->id);

        if(password_verify($request->password, Auth::user()->password))
        {

            if($user->valide)
            {
                $user->update([
                    'valide' => false,
                ]);

                Session::put('succes', $user->prenom.' '.$user->name.' est suspendu');

            } else{

                $user->update([
                    'valide' => true,
                ]);

                Session::put('succes', $user->prenom.' '.$user->name.' acquitté de la suspension');
            }

        } else{
            Session::put('erreur', 'Mot de passe incorect');
        }
        
        return redirect()->route('Profil.index');
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
