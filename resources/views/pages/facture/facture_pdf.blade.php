<?php
use App\Models\Articles;

$incrementation = 1;
?>

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
    <style type="text/css">
        body{
            font-family: sans-serif;
        }
        .logo-header{
            width: 130px;
            height: 125px;
            margin-top: 0%;
            margin-left: 0%;
        }
        .header{
            width: 75%;
            margin-top: -120px;
        }
        .nom{
            font-family: sans-serif;
            font-size: 35px;
            width: 75%;
            margin-left: 25%;
            height: 50px;
        }
        .div-header{
            width: 75%;
            height: 75px;
            margin-left: 25%;
        }
        .div-site{
            width: 100%;
            height: 25px;
            font-size: 14px;
        }
        .div-adresse{
            width: 100%;
            height: 25px;
            font-size: 12px;
            display: flex;
            flex-direction: row;
        }
        .reseaux{
            width: 100%;
            height: 65px;
        }
        .reseau-1{
            width: 100%;
            height: 50%;
            display: flex;
            flex-direction: row;
        }
        .reseau-2{
            width: 100%;
            height: 27%;
            margin-top: 0%;
        }
        .rx-1{
            width: 16.66%;
            height: 100%;
            margin-left: 0%;
        }
        .rx-2{
            width: 16.66%;
            height: 100%;
            margin-left: 16.66%;
            margin-top: -100%;
        }
        .rx-3{
            width: 16.66%;
            height: 100%;
            margin-left: 33.32%;
            margin-top: -100%;
        }
        .rx-4{
            width: 16.66%;
            height: 100%;
            margin-left: 49.98%;
            margin-top: -100%;
        }
        .rx-5{
            width: 16.66%;
            height: 100%;
            margin-left: 66.64%;
            margin-top: -100%;
        }
        .rx-6{
            width: 16.66%;
            height: 100%;
            margin-left: 83.3%;
            margin-top: -100%;
        }
        .icone{
            width: 30px;
            height: 80%;
            margin-top: 5%;
            margin-left: 40%;
        }
        .r-1{
            width: 16.66%;
            height: 100%;
            margin-left: 0%;
        }
        .r-2{
            width: 16.66%;
            height: 100%;
            margin-left: 16.66%;
            margin-top: -100%;
        }
        .r-3{
            width: 16.66%;
            height: 100%;
            margin-left: 33.32%;
            margin-top: -100%;
        }
        .r-4{
            width: 16.66%;
            height: 100%;
            margin-left: 49.98%;
            margin-top: -100%;
        }
        .r-5{
            width: 16.66%;
            height: 100%;
            margin-left: 66.64%;
            margin-top: -100%;
        }
        .r-6{
            width: 16.66%;
            height: 100%;
            margin-left: 83.3%;
            margin-top: -100%;
        }
        .p-rx{
            font-family: sans-serif;
            text-align: center;
            font-size: 12px;
        }


        .header{
            width: 100%;
            height: 50px;
            display: block;
        }
        .header-1, .header-2, .header-3, .header-4, .header-5{
            width: 20%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .header-1{
            margin-left: 0%;
            margin-top: 0%;
        }
        .header-2{
            margin-left: 20%;
            margin-top: -50px;
        }
        .header-3{
            margin-left: 40%;
            margin-top: -50px;
        }
        .header-4{
            margin-left: 60%;
            margin-top: -50px;
        }
        .header-5{
            margin-left: 80%;
            margin-top: -50px;
        }
        .div-header-1{
            width: 100%;
            height: 50%;
        }
        .p-date{
            font-family: sans-serif;
        }
        .div-header-1 img{
            width: 15%;
            margin-left: 42.5%;
            height: 20px;
            float: center;
        }
        .div-header-2{
            width: 100%;
            height: 50%;
            font-size: 11px;
            text-align: center;
            padding-top: 7px;
        }
        /* INFOS */

        .infos{
            width: 100%;
            width: 90%;
            left: 5%;
            margin-top: 25px;
            display: flex;
            flex-direction: row;
        }
        .infos-1{
            position: absolute;
            width: 50%;
            left: 0%;
            display: flex;
            flex-direction: column;
        }
        .infos-2{
            position: absolute;
            width: 50%;
            right: 0%;
            display: flex;
            flex-direction: column;
        }
        .info{
            width: 100%;
            font-size: 13px;
            display: flex;
            flex-direction: row;
        }
        .facture{
            width: 100%;
            margin-top: 75px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .h1{
            text-align: center;
            font-size: 25;
            font-family: sans-serif;
        }
        h3{
            text-align: center;
            margin-top: -20px;
            text-decoration: underline;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        th{
            background-color: #051959;
            color: #fff;
            padding-top: 7px;
            padding-bottom: 7px;
            height: 35px;
            font-size: 18px;
            border: 1px solid #051959;
        }
        td{
            background-color: transparent;
            border: 1px solid #051959;
            padding-top: 7px;
            padding-bottom: 7px;
        }
        #total{
            background-color: #0a0a4b;
        }
        .td-designation{
            padding-left: 10px;
        }    
        .td{
            width: 115px;
            text-align: center;
        }
        .td-n{
            width: 50px;
            text-align: center;
        }
        #tab-2{
            margin-top: 20px;
        }
        .td-designation-2{
            text-align: center;
        }    
        .td-2{
            width: 115px;
            text-align: center;
        }
        .droit{
            width: 100%;
        }
        .div-payer{
            position: relative;
            width: 200px;
            height: 100px;
            left: 10%;
            transform: rotate(-30deg);
            opacity: 0.5;
        }
        .p-livreur{
            text-decoration: underline;
            float: right;
        }
        .date{
            background: transparent;
            border-top: 1px solid #051959;
            width: 100%;
            height: 30px;
            bottom: 5px;
        }
        .p-date{
            font-family: cursive;
            margin-top: 10px;
            text-align: right;
        }
        .fond{
            position: absolute;
            width: 100%;
            height: 220px;
            left: 0%;
            bottom: 0px;
            top: 35%;
            transform: rotate(-45deg);
        }
        .cachet{
            position: absolute;
            width: 200px;
            height: 200px;
            left: 65%;
            bottom: 100px;
            opacity: 0.6;
            transform: rotate(-45deg);
        }


        .footer{
            position: absolute;
            width: 100%;
            height: 225px;
            bottom: 0px;
            left: 0%;
            border-top: 1px solid black;
            text-align: right;
        }
        .footer-1{
            position: absolute;
            width: 100%;
            height: 55px;
            padding-top: 5px;
            bottom: 0px;
            left: 0%;
            border-top: 1px solid black;
        }
    </style>
    
    <div class="contenair">
                
        <img src="images/logo/logo.jpg" class="logo-header">
        <div class="header">
            <div class="nom">Dad Favori</div>
            <div class="div-header">
                <div class="div-site">
                    www.dadfavori.com<br>
                    155 Avenue de la justice, Quartier Joli parc Commune de la Gombe<br>
                    RCCM : AAB-4D-14D-45<br>
                    Id.nat : 251456
                </div>
            </div>
        </div>
        <div class="reseaux">
            <div class="reseau-1">
                <div class="rx-1">
                    <img src="images/rx/email.jpg" class="icone">
                </div>
                <div class="rx-2">
                    <img src="images/rx/whatsapp.jpg" class="icone">
                </div>
                <div class="rx-3">
                    <img src="images/rx/facebook.jpg" class="icone">
                </div>
                <div class="rx-4">
                    <img src="images/rx/twitter.jpg" class="icone">
                </div>
                <div class="rx-5">
                    <img src="images/rx/instagram.jpg" class="icone">
                </div>
                <div class="rx-6">
                    <img src="images/rx/instagram.jpg" class="icone">
                </div>
            </div>
            <div class="reseau-2">
                <div class="r-1">
                    <p class="p-rx">dadfavori@gmail.com</p>
                </div>
                <div class="r-2">
                    <p class="p-rx">+243 897 283 842</p>
                </div>
                <div class="r-3">
                    <p class="p-rx">Dad Favori Officiel</p>
                </div>
                <div class="r-4">
                    <p class="p-rx">@DadFavoriOfficiel</p>
                </div>
                <div class="r-5">
                    <p class="p-rx">Dad Favori Officiel</p>
                </div>
                <div class="r-6">
                    <p class="p-rx">Dad_Favori_Officiel</p>
                </div>
            </div>
        </div>
        <div class="date">
            <p class="p-date">Kinshasa, le {{ $livraison->date_livraison }}
        </div>
        <div class="infos">
            <div class="infos-1">
                <div class="info">
                        <strong>Client</strong>
                        : {{ $client->prenom." ".$client->name }}
                </div>
                <div class="info">
                        <strong>Code Client</strong>
                        : {{ $client->numero->numero }}
                </div>
                <div class="info">
                        <strong>Adresse E-mail</strong>
                        : {{ $client->email }}
                </div>
                <div class="info">
                        <strong>Paiement</strong>
                        : Espèce
                </div>
                <div class="info">
                        <strong>Nombre article</strong>
                        : {{ count($commandes) }}
                </div>
            </div>
            <div class="infos-2">
                <div class="info">
                        <strong>Livraison</strong>
                    : {{ $livraison->adresse_livraison }}
                </div>
                <div class="info">
                        <strong>Achat Nº</strong>
                    : {{ $livraison->achat_numero }}
                </div>
                <div class="info">
                        <strong>Nbr Rémise</strong>
                    : {{ count($remise) }}
                </div>
                <div class="info">
                        <strong>Date commande</strong>
                    : {{ $livraison->created_at }}
                </div>
            </div>
        </div>
        <div class="facture">
            <h1 class="h1">FACTURE</h1>
            <h3>Nº DF/{{ $client->id."/".$livraison->id."/".explode('-', $livraison->date_livraison)[2]."/".explode('-', $livraison->date_livraison)[1]."/".explode('-', $livraison->date_livraison)[0] }}</h3>
        </div>
        <div class="droit">
            Doit pour ce qui suit:
        </div>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><strong>Nº</strong></th>
                        <th><strong>DESIGNATION</strong></th>
                        <th><strong>Qté</strong></th>
                        <th><strong>P.U($)</strong></th>
                        <th><strong>P.T($)</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commandes as $commande)
                    <tr>
                        <td class="td-n">{{ $incrementation++; }}</td>
                        <td class="td-designation">{{ Articles::find($commande->article->id)->modele->modele." Taille ".$commande->taille }}</td>
                        <td class="td">{{ $commande->quantite }}</td>
                        <td class="td">{{ $commande->prix_unitaire }}</td>
                        <td class="td">{{ $commande->prix_total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table table-bordered" id="tab-2">
                <tbody>
                    <tr id="total">
                        <td class="td-designation-2">TOTAL GENERAL</td>
                        <td class="td-2"><strong>{{ $total_general }}</strong></td>
                    </tr>

                    @if($livraison->montant_remise > 0)
                        <tr class="remise">
                            <td class="td-designation-2">REMISE</td>
                            <td class="td-2"><strong>-{{ number_format($livraison->montant_remise, "2", ".", " ") }}</strong></td>
                        </tr>
                        <tr class="color">
                            <td class="td-designation-2">MONTANT A PAYER</td>
                            <td class="td-2"><strong>{{ number_format($montant_payer, "2", ".", " ") }}</strong></td>
                        </tr>
                    @else
                    <tr class="color">
                        <td class="td-designation-2">MONTANT A PAYER</td>
                        <td class="td-2"><strong>{{ number_format($montant_payer, "2", ".", " ") }}</strong></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{ $total_general_lettre }}
        <div class="footer">
            {{ "Nous disons : ".$livreur->name." ".$livreur->postnom." ".$livreur->prenom }}
        </div>
        <!--img src="images/logo/logo.png" class="fond"-->
        <img src="images/cachet/PAYER.jpg" class="div-payer">
        <img src="images/cachet/CACHET.jpg" class="cachet">
    </div>

    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
</body>
</html>