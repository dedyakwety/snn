@extends('application')

<?php
use App\Models\Articles;
use App\Models\User;

    if($livraison->livreur_id)
    {
        $livreur_existe = User::findOrFail($livraison->livreur_id);
    } else{
        $livreur_existe = false;
    }

    $incrementation = 1;

?>

@section('facture')
    <div class="div-facture">
        <div class="div-tete">
            @if($livraison->livree == 1)
                <a href="{{ route('telechargement', ['id' => $livraison->id]) }}" class="btn-facture">
                <span class="glyphicon glyphicon-download"></span> Télécharger en pdf
                </a>
            @endif
            @if($livraison->livreur_id == Auth::user()->id)
                @if($livraison->livree == 0)
                    <form action="{{ route('Livraison.update', $livraison->id) }}" method="POST" class="form-confirm">
                        @csrf
                        @method('PUT')
                        <input type="password" name="password" placeholder="Mot de passe" class="champs" required>
                        <a href="">
                            <button type="submit" class="btn-facture">Confirmer</button>
                        </a>
                    </form>
                @endif
            @endif
        </div>
        @if(Session::has('erreur'))
            <p>{{ Session::get('erreur') }}</p>
        @elseif(Session::has('succes'))
            <p>{{ Session::get('succes') }}</p>
        @endif
        @if(Auth::user()->role_id == 1)
            @if(!$livraison->livree)
                <form method="POST" action="{{ route('Livraison.update', $livraison->id) }}" class="formulaire">
                    @csrf
                    @method('PUT')
                    <select name="livreur" class="input_livreur" required>

                        <option value="null">Choisissez le livreur</option>

                        @if($livraison->livreur_id)
                            <option>{{ $livreur_existe->prenom." ".$livreur_existe->name }}</option>
                        @endif

                        @if(count($users_livreurs) < 15)

                            @foreach($users as $user)
                                    <!-- VERIFIER SI L'UTILISATEUR EST CLIENT NE L'AFFICHE PAS -->
                                    @if($user->role_id == 5)
                                    @else
                                        <!-- VERIFIER S'IL Y A LE LIVREUR AFFECTE A CETTE COMMANDE -->
                                        @if($livraison->livreur_id)
                                            @if($user->id == $livraison->livreur_id)
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->prenom." ".$user->name }}</option>
                                            @endif
                                        @else
                                            <!-- PAR CONTRE AFFICHE TOUT -->
                                            <option value="{{ $user->id }}">{{ $user->prenom." ".$user->name }}</option>
                                        @endif
                                    @endif

                            @endforeach

                        @elseif(count($users_livreurs) > 15)
                            @foreach($users_livreurs as $user)
                                <option value="{{ $user->id }}" {{ $desactiver }}>{{ $user->prenom." ".$user->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <button type="submit" class="boutt">Valider</button>
                </form>
            @else
                <p class="p-livreur">Livrée par : {{ $livreur_existe->prenom." ".$livreur_existe->name." le ".$livraison->date_livraison }}</p>
            @endif
        @endif

        @if((Auth::user()->role_id == 1) OR (Auth::user()->role_id == 2) OR (Auth::user()->role_id == 3))
            <div class="footer-facture">
                TOTAL : ${{ $livraison->prix_total }}
            </div>
            <div class="div-facture-2">
                @forelse($commandes as $commande)
                    <div class="div-image">
                        <div class="div-image-1">
                            <img src="{{ asset(Storage::url(Articles::findOrfail($commande->article->id)->image->path_1)) }}">
                        </div>
                        <div class="div-image-2">
                            {{ Articles::findOrFail($commande->article->id)->commentaire }}<br>
                            P.U : ${{ $commande->prix_unitaire }}<br>
                            Q : {{ $commande->quantite }}<br>
                            P.T : ${{ $commande->prix_total }}
                        </div>
                    </div>
                @empty
                    <h1>No commande</h1>
                @endforelse
            </div>
        @else
            <h3>FACTURE</h3>
            <table>
                <thead>
                    <tr>
                        <th id="numero">Nº</th>
                        <th>DESIGNATIONYYY</th>
                        <th id="prix">Qté</th>
                        <th id="prix">P.U$</th>
                        <th id="prix">P.T$</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commandes as $commande)
                    <tr>
                        <td>{{ $incrementation++; }}</td>
                        <td>{{ Articles::find($commande->article->id)->modele->modele." Taille ".$commande->taille }}</td>
                        <td>{{ $commande->quantite }}</td>
                        <td>{{ $commande->prix_unitaire }}</td>
                        <td>{{ $commande->prix_total }}</td>
                        <!--button type="submit" class="btn btn-outline-success">
                            @if($livraison->livree == true)
                                Livrée
                            @else
                                En cours
                            @endif
                        </button-->
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr id="remise">
                        <td>TOTAL GENERAL</td>
                        <td id="prix-2"><strong>{{ $total_general }}</strong></td>
                    </tr>

                    @if($livraison->montant_remise > 0)
                        <tr id="remise">
                            <td>REMISE</td>
                            <td><strong>-{{ number_format($livraison->montant_remise, "2", ".", " ") }}</strong></td>
                        </tr>
                        <tr id="prix-payer">
                            <td>MONTANT A PAYER</td>
                            <td><strong>{{ number_format($montant_payer, "2", ".", " ") }}</strong></td>
                        </tr>
                    @else
                    <tr id="prix-payer">
                        <td>MONTANT A PAYER</td>
                        <td><strong>{{ number_format($montant_payer, "2", ".", " ") }}</strong></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        @endif

    </div>
@endsection