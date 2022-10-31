<!DOCTYPE html>
<html lang="en">
<head>
<title>SNN</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/login.css') }}">
</head>
<body>

    <div class="body-connexion">
        
        <!-- Session Status -->
        <div class="div-form">
            <div class="logo">
                <img src="{{ asset('images/logo/logo.png') }}" alt="image-logo" class="img-logo">
            </div>
            <h3>Se conneter</h3>
            <div class="message">
                
                <x-auth-session-status class="mb-2" :status="session('status')" />

            <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-2" :errors="$errors" />
            </div>

            <form method="POST" action="{{ route('login') }}" class="form">
                @csrf
                
                <!-- Email Address -->
                <input class="champ" type="email" name="email" placeholder="example@gmail.com" required autofocus />

                <!-- Password -->
                <input class="champ"
                        type="password"
                        name="password"
                        placeholder="Mot de passe"
                        required autocomplete="current-password" />

                <!-- Remember Me -->
                <!--div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div-->

                <div class="bouttons">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            Mot de passe oublier?
                        </a>
                    @endif

                    <button class="boutton" id="btn">
                        Connexion
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>