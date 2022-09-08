<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use App\Models\Livraisons;
use App\Models\Commandes;
use App\Models\User;
use App\Models\Articles;
use Illuminate\Support\Facades\Auth;

class Facture extends Controller
{
    public function viewFature($id)
    {
        $livraison = Livraisons::findOrFail($id);
        
        if(Auth::user()->role_id == 1)
        {
            $commandes = Commandes::where('livraison_id', $livraison->id)
                                ->orderBy('created_at', 'desc')
                                ->take(20)
                                ->get();
            $users = User::All();
            $users_livreurs = User::All()->where('role_id', 4);

            // VERIFIER SI LA FACTURE EST DU CLIENT AVEC COMPTE
            if($livraison->user_id === null)
            {
                $client = "";

            } else{

                $client = User::findOrFail($livraison->user_id);
            }

        } elseif(Auth::user()->role_id == 4) {

            $commandes = Commandes::where('livraison_id', $livraison->id)
                                ->orderBy('created_at', 'desc')
                                ->take(20)
                                ->get();
            $users = "";
            $users_livreurs = User::All()->where('role_id', 4);

            // VERIFIER SI LA FACTURE EST DU CLIENT AVEC COMPTE
            if($livraison->user_id === null)
            {
                $client = "";
                
            } else{

                $client = User::findOrFail($livraison->user_id);
            }

        } elseif(Auth::user()->role_id == 5) {

            $commandes = Commandes::where('livraison_id', $livraison->id)
                                ->orderBy('created_at', 'desc')
                                ->take(20)
                                ->get();

            $users = "";
            $users_livreurs = "";
            $client = User::findOrFail(Auth::user()->id);

        }

        return view('pages.facture.facture', [
            'notification' => parent::commande(),
            'commandes' => $commandes,
            'users' => $users,
            'users_livreurs' => $users_livreurs,
            'livraison' => $livraison,
            'client' => $client,
        ]);
    }

    public function telecharger_facture($id)
    {
        function int2str($a)
        {
            $convert = explode('.',$a);
            if (isset($convert[1]) && $convert[1]!=''){
                return int2str($convert[0]).' point '.int2str($convert[1]) ;
            }
            if ($a<0) return 'moins '.int2str(-$a);
                if ($a<17){
                    switch ($a){
                        case 0: return '';
                        case 1: return 'un';
                        case 2: return 'deux';
                        case 3: return 'trois';
                        case 4: return 'quatre';
                        case 5: return 'cinq';
                        case 6: return 'six';
                        case 7: return 'sept';
                        case 8: return 'huit';
                        case 9: return 'neuf';
                        case 10: return 'dix';
                        case 11: return 'onze';
                        case 12: return 'douze';
                        case 13: return 'treize';
                        case 14: return 'quatorze';
                        case 15: return 'quinze';
                        case 16: return 'seize';
                    }
                } else if ($a<20){
                    return 'dix-'.int2str($a-10);
                } else if ($a<100){
                    if ($a%10==0){
                        switch ($a){
                        case 20: return 'vingt';
                        case 30: return 'trente';
                        case 40: return 'quarante';
                        case 50: return 'cinquante';
                        case 60: return 'soixante';
                        case 70: return 'soixante-dix';
                        case 80: return 'quatre-vingt';
                        case 90: return 'quatre-vingt-dix';
                    }
                } elseif (substr($a, -1)==1){
                    if( ((int)($a/10)*10)<70 ){
                        return int2str((int)($a/10)*10).'-et-un';
                    } elseif ($a==71) {
                        return 'soixante-et-onze';
                    } elseif ($a==81) {
                        return 'quatre-vingt-un';
                    } elseif ($a==91) {
                        return 'quatre-vingt-onze';
                    }
                } elseif ($a<70){
                    return int2str($a-$a%10).'-'.int2str($a%10);
                } elseif ($a<80){
                    return int2str(60).'-'.int2str($a%20);
                } else{
                    return int2str(80).'-'.int2str($a%20);
                }
            } else if ($a==100){
                return 'cent';
            } else if ($a<200){
                return int2str(100).' '.int2str($a%100);
            } else if ($a<1000){
                return int2str((int)($a/100)).' '.int2str(100).' '.int2str($a%100);
            } else if ($a==1000){
                return 'mille';
            } else if ($a<2000){
                return int2str(1000).' '.int2str($a%1000).' ';
            } else if ($a<1000000){
                return int2str((int)($a/1000)).' '.int2str(1000).' '.int2str($a%1000);
            } else if ($a==1000000){
                return 'millions';
            } else if ($a<2000000){
                return int2str(1000000).' '.int2str($a%1000000).' ';
            } else if ($a<1000000000){
                return int2str((int)($a/1000000)).' '.int2str(1000000).' '.int2str($a%1000000);
            }
        }

        $livraison = Livraisons::findOrFail($id);
        $commandes = Commandes::All()->where('livraison_id', $livraison->id);
        $livreur = User::findOrFail($livraison->livreur_id);
        $total_general = Commandes::All()->where('livraison_id', $livraison->id)->sum('prix_total');
        $total_general_lettre = int2str($total_general);

        if(Auth::user()->role_id == 1)
        {
            $client = User::findOrFail($livraison->user_id);
            $remise = Livraisons::All()
                                ->where('user_id', $client->id)
                                ->where('beneficier', true);

        } elseif(Auth::user()->role_id == 4){

            $client = User::findOrFail($livraison->user_id);
            $remise = Livraisons::All()
                                ->where('user_id', $client->id)
                                ->where('beneficier', true);

        } elseif(Auth::user()->role_id == 5){

            $client = User::findOrFail(Auth::user()->id);
            $remise = Livraisons::All()
                                ->where('user_id', Auth::user()->id)
                                ->where('beneficier', true);
        }
        
        $pdf = PDF::loadview('pages.facture.facture_pdf', [
            'commandes' => $commandes,
            'livraison' => $livraison,
            'client' => $client,
            'livreur' => $livreur,
            'remise' => $remise,
            'total_general' => $total_general,
            'total_general_lettre' => $total_general_lettre,
        ]);
        
        return $pdf->download('facture.pdf');
        /*return view('pages.facture.facture_pdf', [
            'commandes' => $commandes,
            'livraison' => $livraison,
            'client' => $client,
            'livreur' => $livreur,
            'remise' => $remise,
            'total_general' => $total_general,
            'total_general_lettre' => $total_general_lettre,
        ]);*/
    }

    public function commande_reussie()
    {
        return view('pages.commande.commande_reussie');
    }
}
