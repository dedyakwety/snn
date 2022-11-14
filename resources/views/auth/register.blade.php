@extends('application')

@section('inscription')
    <div class="div-inscription">
        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf
            <p class="titre">Formulaire d'inscription</p>
            <!-- Name -->
            
            <input type="text" name="name" placeholder="Nom" required autofocus />
            
            @if(count($users) == 0)
            <!-- Post nom -->
                <input type="text" name="postnom" placeholder="Postnom" required autofocus />
            @endif

            <!-- Prénom -->
            <input type="text" name="prenom" placeholder="Prénom" required autofocus />

            <!-- Sexe -->
            <select type="text" name="sexe" required autofocus />
                <option>Sexe</option>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            <select>

            @if(count($users) == 0)
            <!-- Etat civil -->
                <select type="text" name="etat_civil" required autofocus />
                    <option>Etat civil</option>
                    <option value="célibataire">Célibataire</option>
                    <option value="marié(e)">Marié(e)</option>
                    <option value="divorcé(e)">Divorcé(e)</option>
                    <option value="veuf(ve)">Veuf(ve)</option>
                <select>
            @endif

            <!-- Contact 1 -->
            <input id="name" type="number" name="contact_whatsapp" placeholder="Contact Whatsapp" required autofocus />

            @if(count($users) == 0)
            <!-- Contact 2 -->
                <input type="number" name="contact" placeholder="Contact 2" required autofocus />
            @endif

            @if(count($users) == 0)
            <!-- Numéro -->
                <input type="number" name="numero" placeholder="numero domicile" required autofocus />

            <!-- Avenue -->
            <input type="text" name="avenue" placeholder="Avenue domicile" required autofocus />

            <!-- Quartier -->
                <input type="text" name="quartier" placeholder="Quartier domicile" required autofocus />
            </div>

            <!-- Commune -->
                <select type="text" name="commune" required autofocus />
                    <option desable>Commune</option>
                    @foreach($communes as $commune)
                    <option value="{{ $commune }}">{{ $commune }}</option>
                    @endforeach
                <select>
            @endif
            <!-- Email Address -->
            <input type="email" name="email" placeholder="Adresse email" required />

            <!-- Password -->
                <input id="password" type="password"
                                name="password"
                                placeholder="Mot de passe" 
                                required autocomplete="new-password" />

            <!-- Confirm Password -->
                <input id="password_confirmation" type="password"
                                placeholder="Confirmer mot de passe" 
                                name="password_confirmation" required />

            <div class="bouttons">
                <a class="boutton-1" href="{{ route('login') }}" id="btn">
                    Déjà inscrit
                </a>

                <button class="boutton-2" id="btn">
                    S'inscrire
                </button>
            </div>
        </form>
    </div>
@endsection
