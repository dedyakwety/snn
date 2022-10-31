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
    <title>SOMBA NA NDAKU</title>
</head>
<body>
    <style type="text/css">
        body{
            font-family: cursive;
        }
        .logo-header{
            width: 70%;
            height: 75px;
            margin-top: 0%;
            margin-left: 15%;
        }
        .div-header{
            width: 100%;
            height: 75px;
            border-bottom: 1px solid black;
        }
        .div-site{
            width: 100%;
            height: 25px;
            font-size: 13px;
            text-align: center;
        }
        .div-adresse{
            width: 100%;
            height: 25px;
            font-size: 12px;
            display: flex;
            flex-direction: row;
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
        <div class="div-header">
            <div class="div-site">
                www.sombanandaku.com<br>
                155 Avenue de la justice, Quartier Joli parc Commune de la Gombe<br>
                RCCM : AAB-4D-14D-45<br>
                Id.nat : 251456
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
            <h3>Nº SNN/{{ $client->id."/".$livraison->id."/".explode('-', $livraison->date_livraison)[2]."/".explode('-', $livraison->date_livraison)[1]."/".explode('-', $livraison->date_livraison)[0] }}</h3>
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
                    <tr>
                        <td class="td-designation-2">TOTAL GENERAL</td>
                        <td class="td-2"><strong>{{ $total_general }}</strong></td>
                    </tr>

                    @if($livraison->montant_remise > 0)
                        <tr>
                            <td class="td-designation-2">REMISE</td>
                            <td class="td-2"><strong>-{{ number_format($livraison->montant_remise, "2", ".", " ") }}</strong></td>
                        </tr>
                        <tr>
                            <td class="td-designation-2">MONTANT A PAYER</td>
                            <td class="td-2"><strong>{{ number_format((double)$total_general - (double)$livraison->montant_remise, "2", ".", " ") }}</strong></td>
                        </tr>
                    @else
                    <tr>
                        <td class="td-designation-2">MONTANT A PAYER</td>
                        <td class="td-2"><strong>{{ number_format($total_general, "2", ".", " ") }}</strong></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!--div class="footer">
                <p class="p-livreur">{{ $livreur->name." ".$livreur->postnom." ".$livreur->prenom }}<br>
                    Livreur
                </p>
            <img src="images/cachet/CACHET.jpg" class="cachet">
        </div-->
        <div class="footer">
            {{ $livreur->name." ".$livreur->postnom." ".$livreur->prenom }}
        </div>
        <div class="footer-1">
            <div class="header">
                <div class="header-1">
                    <div class="div-header-1">
                        <img src="images/rx/contact.jpg">
                        <img src="images/rx/whatsapp.jpg">
                    </div>
                    <div class="div-header-2">
                        +243 813 896 978
                    </div>
                </div>
                <div class="header-2">
                    <div class="div-header-1">
                        <img src="images/rx/facebook.jpg">
                    </div>
                    <div class="div-header-2">
                        somba na ndaku
                    </div>
                </div>
                <div class="header-3">
                    <div class="div-header-1">
                        <img src="images/rx/email.jpg">
                    </div>
                    <div class="div-header-2">
                        somba.na.ndaku@gmail.com
                    </div>
                </div>
                <div class="header-4">
                    <div class="div-header-1">
                        <img src="images/rx/twitter.jpg">
                    </div>
                    <div class="div-header-2">
                        @SombaNaNdaku
                    </div>
                </div>
                <div class="header-5">
                    <div class="div-header-1">
                        <img src="images/rx/instagram.jpg">
                    </div>
                    <div class="div-header-2">
                        somba na ndaku
                    </div>
                </div>
            </div>
        </div>
        <!--img src="images/logo/logo.png" class="fond"-->
        <img src="images/cachet/PAYER.jpg" class="div-payer">
        <img src="images/cachet/CACHET.jpg" class="cachet">
    </div>

    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
</body>
</html>