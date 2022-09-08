<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livraisons;
use App\Models\Articles;
use App\Models\Commandes;
use App\Models\Gestions;
use App\Models\User;
use App\Models\Partages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Livraison extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numero = 1;
        $numero_1 = 1;
        
        if(Auth::user()->role_id == 1)
        {
            $commandes = Livraisons::where('valide', true)
                                    ->orderBy('created_at', 'desc')
                                    ->take(50)
                                    ->get();
                                    
        } elseif(Auth::user()->role_id == 4){

            $commandes = Livraisons::where('livreur_id', Auth::user()->id)
                                    ->orderBy('created_at', 'desc')
                                    ->take(50)
                                    ->get();

        } elseif(Auth::user()->role_id == 5){

            $commandes = Livraisons::where('user_id', Auth::user()->id)
                                    ->orderBy('created_at', 'desc')
                                    ->take(50)
                                    ->get();
        }

        return view('pages.livraisons.livraisons', [
            'commandes' => $commandes,
            'numero' => $numero,
            'numero_1' => $numero_1,
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
        $request->validate([
            'date_livraison' => ['required'],
            'heure_livraison' => ['required'],
            'adresse_livraison' => ['required'],
        ]);

        $gestion = Gestions::findOrFail(1);

        $achat_numero = (int)Livraisons::where('user_id', Auth::user()->id)->count() + 1;

        $commandes = Commandes::All()
                            ->where('user_id', Auth::user()->id)
                            ->where('valide', false);

        $prix_achat = $commandes->sum('prix_achat');

        $remise = ((double)$commandes->sum('prix_total') / 100) * ($gestion->remise);

        // VERIFIER SI C'EST LA 5ème LIVRAISON
        $verifier_remise = Livraisons::All()
                                    ->where('user_id', Auth::user()->id)
                                    ->where('beneficier', false);

        if(count($verifier_remise) == 4)
        {
            $reception_remise = (double)$verifier_remise->sum('remise') + (double)$remise;
        } else{
            $reception_remise = null;
        }

        // ENREGISTREMENT D'INFORMATION DE LA LIVRAISON
        $livraison = Livraisons::create([
            'user_id' => Auth::user()->id,
            'achat_numero' => $achat_numero,
            'date_livraison' => $request->date_livraison,
            'heure_livraison' => $request->heure_livraison,
            'adresse_livraison' => $request->adresse_livraison,
            'nombre_article' => $commandes->sum('quantite'),
            'prix_achat' => $prix_achat,
            'prix_total' => (double)$commandes->sum('prix_total'),
            'remise_pourcentage' => $gestion->remise,
            'remise' => $remise,
            'montant_remise' => $reception_remise,
        ])->id;
        // MODIFIER LES COMMANDES EN VALIDE
        foreach($commandes as $commande)
        {
            Commandes::findOrFail($commande->id)
                    ->update([
                        'livraison_id' => $livraison,
                        'valide' => true,
                    ]);
        }
        // UN MESSAGE AVEC SUCCESS
        Session::put('succes', 'Votre commande à été validée avec succès préparez vous a recevoir votre commande '.$request->date_livraison." à ".$request->heure_livraison);
        return redirect()->route('Panier.index');
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
        $gestion = Gestions::findOrFail(1);
        $livraison = Livraisons::findOrFail($id);

        if((!$livraison->livreur_id) && (Auth::user()->role_id == 1))
        {
            $request->validate([
                'livreur' => ['required'],
            ]);
            
            Livraisons::findOrFail($id)
                    ->update([
                        'livreur_id' => $request->livreur,
                    ]);

            $user = User::findOrFail($request->livreur);
            Session::put('succes', $user->prenom.' '.$user->nom.' Va livré cette commande');

        } elseif($livraison->livreur_id)
        {
            $livraison = Livraisons::findOrFail($id);

            $commandes = Commandes::All()->where('livraison_id', $id);
            
            $date_vente = $livraison->date_livraison;
            $achat = $livraison->prix_achat;
            $vente = $livraison->prix_total;
            $gain_brut = (double)$vente - (double)$achat;
            $remise_in = $livraison->remise;

            if($livraison->montant_remise > 0)
            {
                $remise_out = $livraison->montant_remise;

            } else{

                $remise_out = 0;
            }

            $transport = $gestion->transport;
            $gain = (double)$gain_brut - ((double)$remise_in + (double)$transport);
            $depense = ((double)$gain / 100) * $gestion->depense;
            $agent = ((double)$gain / 100) * $gestion->agent;
            $admin = ((double)$gain / 100) * $gestion->admin;
            $entreprise = ((double)$gain / 100) * $gestion->entreprise;
            $remise_pourcentage = $livraison->remise_pourcentage;

            // VERIFIER SI LA DATE EXISTE DANS LA BDD
            $verifier_date = Partages::All()->where('date_vente', $livraison->date_livraison);
            
            if(count($verifier_date) == 0)
            {

                Partages::create([
                    'date_vente' => $date_vente,
                    'achat' => $achat,
                    'vente' => $vente,
                    'gain_brut' => $gain_brut,
                    'remise_in' => $remise_in,
                    'remise_out' => $remise_out,
                    'transport' => $transport,
                    'gain' => $gain,
                    'depense' => $depense,
                    'agent' => $agent,
                    'admin' => $admin,
                    'entreprise' => $entreprise,
                    'remise_pourcentage' => $remise_pourcentage,
                ]);

            } elseif(count($verifier_date) == 1){
            
                
                $partage_id = Partages::select('id')->where('date_vente', $livraison->date_livraison)->first()->id;
                $partage_achat = Partages::select('achat')->where('date_vente', $livraison->date_livraison)->first()->achat;
                $partage_vente = Partages::select('vente')->where('date_vente', $livraison->date_livraison)->first()->vente;
                $partage_gain_brut = Partages::select('gain_brut')->where('date_vente', $livraison->date_livraison)->first()->gain_brut;
                $partage_remise_in = Partages::select('remise_in')->where('date_vente', $livraison->date_livraison)->first()->remise_in;
                $partage_remise_out = Partages::select('remise_out')->where('date_vente', $livraison->date_livraison)->first()->remise_out;
                $partage_transport = Partages::select('transport')->where('date_vente', $livraison->date_livraison)->first()->transport;
                $partage_gain = Partages::select('gain')->where('date_vente', $livraison->date_livraison)->first()->gain;
                $partage_depense = Partages::select('depense')->where('date_vente', $livraison->date_livraison)->first()->depense;
                $partage_agent = Partages::select('agent')->where('date_vente', $livraison->date_livraison)->first()->agent;
                $partage_admin = Partages::select('admin')->where('date_vente', $livraison->date_livraison)->first()->admin;
                $partage_entreprise = Partages::select('entreprise')->where('date_vente', $livraison->date_livraison)->first()->entreprise;
                
                Partages::where('date_vente', $livraison->date_livraison)
                        ->update([
                            'achat' => (double)$achat + (double)$partage_achat,
                            'vente' => (double)$vente + (double)$partage_vente,
                            'gain_brut' => (double)$gain_brut + (double)$partage_gain_brut,
                            'remise_in' => (double)$remise_in + (double)$partage_remise_in,
                            'remise_out' => (double)$remise_out + (double)$partage_remise_out,
                            'transport' => (double)$transport + (double)$partage_transport,
                            'gain' => (double)$gain + (double)$partage_gain,
                            'depense' => (double)$depense + (double)$partage_depense,
                            'agent' => (double)$agent + (double)$partage_agent,
                            'admin' => (double)$admin + (double)$partage_admin,
                            'entreprise' => (double)$entreprise + (double)$partage_entreprise,
                        ]);

            }
            // SIGNALER LA LIVRAISON
            Livraisons::findOrFail($id)
                    ->update([
                        'livree' => true,
                    ]);
            // MODIFIER BENEFICIER A TRUE
            Livraisons::where('user_id', Auth::user()->id)
                    ->where('beneficier', false)
                    ->update([
                        'beneficier' => true,
                    ]);

        }

        return redirect()->route('viewFacture', ['id' => $id]);
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
