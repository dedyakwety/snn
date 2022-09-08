@extends('application')

@section('connexion')

    <div class="body-connexion">
        <!-- Session Status -->
        <div class="div-form">
            <h3>Se conneter</h3>
            <div class="message">
                
                <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>

            <form method="POST" action="{{ route('login') }}" class="form">
                @csrf
                
                <!-- Email Address -->
                <div>
                    <x-input id="email" class="form-control" type="email" name="email" placeholder="Adresse e-mail" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input id="password" class="form-control"
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
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            Mot de passe oublier?
                        </a>
                    @endif

                    <button class="btn btn-primary" id="btn">
                        Connexion
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection