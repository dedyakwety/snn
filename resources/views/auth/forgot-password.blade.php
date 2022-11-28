<!DOCTYPE html>
<html lang="en">
<head>
<title>SNN</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/mp_oublier.css') }}">
</head>
<body>

    <div class="body-mp-oublier">
        
        <form action="{{ route('password.email') }}" method="POST" class="form">
            @csrf
            <p>Entrez votre adresse email pour recevoir un code par mail enfin de reinitialiser votre mot de passe</p>
            <div class="inputs">
                <input type="email" name="email" class="input" placeholder="exemple@gmail.com" class="inpout" autofocus />
                <button type="submit" class="boutton">Reinitialiser</button>
            </div>
        </form>

    </div>

</body>
</html>
