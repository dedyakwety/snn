@extends('application')

@section('inscription')
    <div class="div-inscription">
        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf
            <p class="titre">Formulaire d'inscription</p>
            <!-- Name -->
            <div class="m-3">
                <input class="form-control" type="text" name="name" placeholder="Nom" required autofocus />
            </div>
            @if(count($users) == 0)
            <!-- Post nom -->
            <div class="m-3">
                <input class="form-control" type="text" name="postnom" placeholder="Postnom" required autofocus />
            </div>
            @endif

            <!-- Prénom -->
            <div class="m-3">
                <input class="form-control" type="text" name="prenom" placeholder="Prénom" required autofocus />
            </div>

            <!-- Sexe -->
            <div class="m-3">
                <select class="form-control" type="text" name="sexe" required autofocus />
                    <option>Sexe</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                <select>
            </div>
            @if(count($users) == 0)
            <!-- Etat civil -->
            <div class="m-3">
                <select class="form-control" type="text" name="etat_civil" required autofocus />
                    <option>Etat civil</option>
                    <option value="célibataire">Célibataire</option>
                    <option value="marié(e)">Marié(e)</option>
                    <option value="divorcé(e)">Divorcé(e)</option>
                    <option value="veuf(ve)">Veuf(ve)</option>
                <select>
            </div>
            @endif

            <!-- Contact 1 -->
            <div class="m-3">
                <input id="name" class="form-control" type="number" name="contact_whatsapp" placeholder="Contact Whatsapp" required autofocus />
            </div>

            @if(count($users) == 0)
            <!-- Contact 2 -->
            <div class="m-3">
                <input class="form-control" type="number" name="contact" placeholder="Contact 2" required autofocus />
            </div>
            @endif
            @if(count($users) == 0)
            <!-- Numéro -->
            <div class="m-3">
                <input class="form-control" type="number" name="numero" placeholder="numero domicile" required autofocus />
            </div>

            <!-- Avenue -->
            <div class="m-3">
                <input class="form-control" type="text" name="avenue" placeholder="Avenue domicile" required autofocus />
            </div>

            <!-- Quartier -->
            <div class="m-3">
                <input class="form-control" type="text" name="quartier" placeholder="Quartier domicile" required autofocus />
            </div>

            <!-- Commune -->
            <div class="m-3">
                <select class="form-control" type="text" name="commune" required autofocus />
                    <option desable>Commune</option>
                    @foreach($communes as $commune)
                    <option value="{{ $commune }}">{{ $commune }}</option>
                    @endforeach
                <select>
            </div>
            @endif
            <!-- Email Address -->
            <div class="m-3">
                <input class="form-control" type="email" name="email" placeholder="Adresse email" required />
            </div>

            <!-- Password -->
            <div class="m-3">
                <input id="password" class="form-control"
                                type="password"
                                name="password"
                                placeholder="Mot de passe" 
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="m-3">
                <input id="password_confirmation" class="form-control"
                                type="password"
                                placeholder="Confirmer mot de passe" 
                                name="password_confirmation" required />
            </div>

            <div class="bouttons">
                <a class="btn btn-primary" href="{{ route('login') }}" id="btn">
                    Déjà inscrit
                </a>

                <button class="btn btn-primary" id="btn">
                    S'inscrire
                </button>
            </div>
        </form>
    </div>
@endsection
