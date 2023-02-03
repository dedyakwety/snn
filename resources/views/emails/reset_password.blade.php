<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/logo/logo.jpg') }}">
    <title>Dad Favori</title>
</head>
<body>
    <h3>Code de reinitialisation de mot de passe : {{ $infos['code'] }}<br>
        Cliquez sur le liens ci-déssous pour changer votre mot de passe<br>
        https://www.dadfavori.com/infos_reset_password/{{ $infos['liens'] }}
    </h3>
</body>
</html>