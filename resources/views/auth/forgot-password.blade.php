<!DOCTYPE html>
<html lang="en">
<head>
<title>Dad Favori</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/mp_oublier.css') }}">
<link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

    <div class="body-mp-oublier">
        
        <form action="{{ route('password.email') }}" method="POST" class="form">
            @csrf
            <div class="paragraph">
                Entrez votre adresse email pour recevoir un code par mail enfin de reinitialiser votre mot de passe
            </div>
            <div class="inputs">
                <div class="div-password">
                    <div class="icone">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <input type="email" name="email" class="input" placeholder="exemple@gmail.com" class="inpout" autofocus />
                </div>
                <button type="submit" class="boutton">Reinitialiser</button>
            </div>
        </form>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
