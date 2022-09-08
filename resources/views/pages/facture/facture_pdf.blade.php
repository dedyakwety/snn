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
            font-family: sans-serif;
        }
        .div-facture{
            background: white;
            width: 85%;
            top: 0%;
            left: 7.5%;
            display: flex;
            flex-direction: column;
        }
        .div-header{
            margin-top: 0%;
            width: 100%;
            height:150px;
            top: 0%;
        }
        .div-centre{
            width: 77.5%;
        }
        .div-logo-1{
            float: left;
            width: 22.5%;
            height: 150px;
            display: flex;
        }
        .div-logo-2{
            float: right;
            margin-top: -20.8%;
            width: 22.5%;
            height: 150px;
        }
        .logo{
            width: 120px;
            height: 60px;
            margin-top: 19px;
            margin-left: 15px;
        }
        h1{
            font-family: sans-serif;
            text-align: center;
            font-size: 20px;
        }
        .p-site{
            font-family: sans-serif;
            text-align: center;
            color: #1315b9;
            margin-top: 0px;
            font-size: 16px;
        }
        .p-infos{
            font-family: sans-serif;
            text-align: center;
            position: ;
            margin-top: -20px;
        }
        .date{
            background: transparent;
            border-top: 1px solid #1315b9;
            width: 100%;
            height: 30px;
            bottom: 5px;
        }
        .p-date{
            font-family: sans-serif;
            margin-top: 10px;
            text-align: right;
        }
        .infos{
            width: 100%;
            width: 90%;
            left: 5%;
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
            display: flex;
            flex-direction: row;
        }
        .facture{
            width: 100%;
            margin-top: 150px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .h1{
            font-family: sans-serif;
            text-align: center;
            font-size: 25;
        }
        h3{
            font-family: sans-serif;
            text-align: center;
            margin-top: -20px;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        th{
            font-family: sans-serif;
            background-color: #1315b9;
            color: #fff;
            padding-top: 7px;
            padding-bottom: 7px;
            height: 35px;
            font-size: 18px;
            border: 1px solid #1315b9;
        }
        td{
            font-family: sans-serif;
            background-color: transparent;
            border: 1px solid #1315b9;
            padding-top: 7px;
            padding-bottom: 7px;
        }
        .td-designation{
            font-family: sans-serif;
            padding-left: 10px;
        }    
        .td{
            font-family: sans-serif;
            width: 115px;
            text-align: center;
        }
        .td-n{
            font-family: sans-serif;
            width: 50px;
            text-align: center;
        }
        #tab-2{
            font-family: sans-serif;
            margin-top: 20px;
        }
        .td-designation-2{
            font-family: sans-serif;
            text-align: center;
        }    
        .td-2{
            font-family: sans-serif;
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
            font-family: sans-serif;
            text-decoration: underline;
            float: right;
        }
        .footer{
            position: absolute;
            width: 100%;
            height: 200px;
            bottom: 0px;
            z-index: 0.5;
        }
        .cachet{
            position: absolute;
            width: 200px;
            height: 200px;
            left: 65%;
            bottom: 0px;
            opacity: 0.6;
            transform: rotate(-45deg);
        }
        .fond{
            position: absolute;
            width: 80%;
            height: 300px;
            left: 10%;
            bottom: 0px;
            opacity: 0.6;
            transform: rotate(-45deg);
        }
    </style>
    
    <div class="contenair">
            <img src="images/cachet/CACHET.jpg" class="fond">
        <div class="div-header">
            <div class="div-logo-1">
                <img src="images/logo/logo.jpg" class="logo">
            </div>
            <div class="div-centre">
                <h1>Somba Na Ndaku en ligne</h1>
                <p class="p-site">Site web : www.snn.com</p>
                <p class="p-infos">Facebook : snn-officiel</p>
                <p class="p-infos">Contact : +243 813 896 978</p>
                <p class="p-infos">Whatsapp : +243 897 283 842</p>
                <p class="p-infos">Twetter : @snn-ifficiel</p>
            </div>
            <div class="div-logo-2">
                <img src="images/logo/logo.jpg" class="logo">
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
                        <strong>Adresse Livraison</strong>
                    : {{ $livraison->adresse_livraison }} bvzge fujzqeifi jirqjgij rqjgir gqor,gk rkqeg,r,g kqrkkn
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
            <h1 class="h1">FACTURE </h1>
            <h3>Nº SNN/{{ $client->id."/".$livraison->id."/".explode('-', $livraison->date_livraison)[2]."/".explode('-', $livraison->date_livraison)[1]."/".explode('-', $livraison->date_livraison)[0] }}</h3>
        </div>
        <div class="droit">
            A droit à ce qui suit:
        </div>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>DESIGNATION</th>
                        <th>Qté</th>
                        <th>P.U$</th>
                        <th>P.T$</th>
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

                    @if($livraison->beneficier)
                    <tr>
                        <td class="td-designation-2">REMISE</td>
                        <td class="td-2"><strong>-{{ $livraison->montant_remise }}</strong></td>
                    </tr>
                    <tr>
                        <td class="td-designation-2">MONTANT A PAYER</td>
                        <td class="td-2"><strong>{{ (double)$total_general - (double)$livraison->montant_remise }}</strong></td>
                    </tr>
                    @else
                    <tr>
                        <td class="td-designation-2">MONTANT A PAYER</td>
                        <td class="td-2"><strong>{{ $total_general }}</strong></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="footer">
                <p class="p-livreur">{{ $livreur->name." ".$livreur->postnom." ".$livreur->prenom }}<br>
                    Livreur
                </p>
            <img src="images/cachet/CACHET.jpg" class="cachet">
        </div>
        <img src="images/cachet/PAYER.jpg" class="div-payer">
    </div>

    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
</body>
</html>