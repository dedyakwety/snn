@extends('application')

<?php
use App\Models\Articles;

$incrementation = 1;
?>

@section('facture')
<div class="div-facture">
    <div class="div-tete">
        @if($livraison->livree == 1)
            <a href="{{ route('telechargement', ['id' => $livraison->id]) }}" class="btn btn-primary">
                Télécharger facture en pdf
            </a>
        @endif
        @if($livraison->livreur_id == Auth::user()->id)
            @if($livraison->livree == 0)
                <form action="{{ route('Livraison.update', $livraison->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <a href="">
                        <button type="submit" class="btn btn-primary">Confirmer la livraison</button>
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
        <form method="POST" action="{{ route('Livraison.update', $livraison->id) }}">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col">
                    <select name="livreur" class="form-control" required>
                        @if(count($users_livreurs) < 15)
                            @foreach($users as $user)
                                @if($user->role_id == 5)
                                @else
                                    <option value="{{ $user->id }}">{{ $user->prenom." ".$user->name }}</option>
                                @endif
                            @endforeach
                        @elseif(count($users_livreurs) > 15)
                            @foreach($users_livreurs as $user)
                                <option value="{{ $user->id }}">{{ $user->prenom." ".$user->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-outline-success">Valider</button>
                </div>
            </div>
        </form>
    @endif

    <h3>FACTURE PDF</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th id="numero">Nº</th>
                <th>DESIGNATION</th>
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
                <td>${{ $commande->prix_unitaire }}</td>
                <td>${{ $commande->prix_total }}</td>
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
</div>
@endsection