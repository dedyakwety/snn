<!DOCTYPE html>
<html lang="en">
<head>
<title>DF | Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/login.css') }}">
<link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

    <div class="body-connexion">
        
        <!-- Session Status -->
        <div class="div-form">
            <div class="logo">
                <img src="{{ asset('images/logo/logo.png') }}" alt="image-logo" class="img-logo">
            </div>
            <div class="message">
                
                <x-auth-session-status class="mb-2" :status="session('status')" />

            <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-2" :errors="$errors" />
                
            </div>

            <form method="POST" action="{{ route('login') }}" class="form">
                @csrf
                
                <!-- Email Address -->
                <div class="div-password">
                    <div class="icone">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <input class="input" type="email" name="email" placeholder="example@gmail.com" required autofocus />
                </div>

                <!-- Password -->
                <div class="div-password">
                    <div class="icone">
                        <span class="glyphicon glyphicon-lock"></span>
                    </div>
                    <input class="input"
                            type="password"
                            name="password"
                            placeholder="Mot de passe"
                            required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <!--div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div-->

                
                <div class="bouttons">
                    <button class="boutton" id="btn">
                        Connexion
                    </button>
                </div>
                @if(Route::has('password.request'))
                    <div class="bouttons">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" id="compte" href="{{ route('password.request') }}">
                            Mot de passe oublier?
                        </a>

                        <a class="underline text-sm text-gray-600 hover:text-gray-900" id="compte" href="{{ route('register') }}">
                            Creer un compte
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>