<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livraisons;
use App\Models\Commandes;
use App\Models\Articles;
use App\Models\Gestions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Update_commande extends Controller
{
    public function index($id)
    {
        $livraion = Livraisons::findOrFail($id);
        $commandes = Commandes::where('user_id', Auth::user()->id)
                                ->where('livraison_id', $livraion->id)
                                ->orderBy('created_at', 'desc')
                                ->get();
        
        return view('pages.commande.detaille_commande_encour', [
            'notification' => parent::commande(),
            'commandes' => $commandes,
            'livraison' => $livraion,
        ]);
    }

    public function update_quantite(Request $request, $id)
    {
        $commande = Commandes::findOrFail($id);
        $article = Articles::findOrFail($commande->article_id);
        $livraison = Livraisons::findOrFail($commande->livraison_id);
        
        return view('pages.commande.update_quantite', [
            'notification' => parent::commande(),
            'taille_1' => parent::taille_lettre(),
            'taille_2' => parent::taille_chiffre(),
            'livraison' => $livraison,
            'commande' => $commande,
            'article' => $article,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'quantite' => ['required'],
            'taille' => ['required'],
            'id_commande' => ['required'],
            'id_livraison' => ['required'],
        ]);

        $commande = Commandes::findOrFail($request->id_commande);
        $livraison = Livraisons::findOrFail($request->id_livraison);
        $article = Articles::findOrFail($commande->article_id);
        
        $prix_achat_commande_in = ((double)$commande->prix_achat / (double)$commande->quantite) * $request->quantite;
        $prix_total_commande_in = (double)$commande->prix_unitaire * (double)$request->quantite;

        $prix_achat_livraison_in = ((double)$livraison->prix_achat - (double)$commande->prix_achat) + (double)$prix_achat_commande_in;
        $prix_total_livraison_in = ((double)$livraison->prix_total - (double)$commande->prix_total) + (double)$prix_total_commande_in;
        $remise_livraison_in = ((double)$livraison->remise - (((double)$commande->prix_total / 100) * (double)$livraison->remise_pourcentage)) + ((double)$prix_total_commande_in / 100) * (double)$livraison->remise_pourcentage;
        $nombre_article_livraison = ((double)$livraison->nombre_article - (double)$commande->quantite) + (double)$request->quantite;

        $commande->update([
            'taille' => $request->taille,
            'prix_achat' => $prix_achat_commande_in,
            'quantite' => $request->quantite,
            'prix_total' => $prix_total_commande_in,
        ]);

        $livraison->update([
            'prix_achat' => $prix_achat_livraison_in,
            'prix_total' => $prix_total_livraison_in,
            'nombre_article' => $nombre_article_livraison,
            'remise' => $remise_livraison_in,
        ]);

        // RETOUR A LA PAGE DE COMMANDE
        Session::put('succes', 'Modification avec succès');
        return redirect()->route('commande_index', $livraison->id);
    }

    public function delete($id)
    {
        $gestion = Gestions::findOrFail(1);
        $commande = Commandes::findOrFail($id);
        $livraison = Livraisons::findOrFail($commande->livraison_id); 
        $article = Articles::findOrFail($commande->article_id);

        $prix_achat = (double)$article->prix * (double)$commande->quantite;

        if($article->prix < 20)
        {
            $prix_vente = ((double)$prix_achat + ((double)$gestion->gain_1) * (double)$commande->quantite);

        } elseif($article->prix >= 20)
        {
            echo $prix_vente = ((((double)$article->prix / 100) * (double)$gestion->gain_2) + (double)$article->prix) * (double)$commande->quantite;
        }

        echo $remise = ((double)$prix_vente / 100) * (double)$livraison->remise_pourcentage;

        $nombre_article = (int)$livraison->nombre_article - (int)$commande->quantite;
        $prix_achat_in = (double)$livraison->prix_achat - (double)$prix_achat;
        $prix_vente_in = (double)$livraison->prix_total - (double)$prix_vente;
        $remise_in = (double)$livraison->remise - (double)$remise;
        
        $livraison->update([
            'nombre_article' => $nombre_article,
            'prix_achat' => $prix_achat_in,
            'prix_total' => $prix_vente_in,
            'remise' => $remise_in,
        ]);

        $commande->delete();
        // RETOUR A LA PAGE DE COMMANDE
        Session::put('succes', "L'article retiré avec succès");
        return redirect()->route('commande_index', ['id' => $livraison->id]);
    }

    public function annulation($id)
    {
        $commandes = Commandes::where('user_id', Auth::user()->id)
                            ->where('livraison_id', $id)
                            ->get();
        foreach($commandes as $commande)
        {
            Commandes::findOrFail($commande->id)->delete();
        }

        Livraisons::findOrFail($id)->delete();
        // RETOUR A LA PAGE DE COMMANDE
        Session::put('succes', 'La commande encours annulée');
        return redirect()->route('Livraison.index');
    }
}
