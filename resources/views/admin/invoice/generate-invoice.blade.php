<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Facture #{{$order->id}}</title>
    <link rel="shortcut icon" href="{{asset('admin/images/logogolden.png')}}" >


    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">{{$appSetting->website_name ?? "Golden"}}</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Facture #{{$order->id}}</span> <br>
                    <span>Date : {{$order->created_at->format('d-m-Y h:i A')}}</span> <br>
                    <span>Zip code : {{$order->pincode}}</span> <br>
                    <span>Adresse: {{$order->adresse}}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Détails de la commande</th>
                <th width="50%" colspan="2">Détails de l'utilisateur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Identifiant:</td>
                <td>{{$order->id}}</td>

                <td>Nom complet:</td>
                <td>{{$order->nom}} {{$order->prenom}}</td>

            </tr>
            <tr>
                <td>Numéro:</td>
                <td>{{$order->tracking_no}}</td>

                <td>Email:</td>
                <td>{{$order->email}}</td>
            </tr>
            <tr>
                <td>Date:</td>
                <td>{{$order->created_at->format('d-m-Y h:i A')}}</td>

                <td>Numéro de Téléphone:</td>
                <td>{{$order->phone}}</td>
            </tr>
            <tr>
                <td>Mode Paiment:</td>
                <td>{{$order->payment_mode}}</td>

                <td>Adresse:</td>
                <td>{{$order->adresse}}</td>
            </tr>
            <tr>
                <td>Status de la commande:</td>
                <td>{{$order->status_message}}</td>

                <td>Pin code:</td>
                <td>{{$order->pincode}}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Articles commandés
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Identifiants</th>
                <th>Produits</th>
                <th>Prix</th>
                <th>Quantités</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPrice = 0;
            @endphp
            @foreach ($order->orderItems as $Orderitem )
            <tr>
                <td width="10%">{{$Orderitem->id}}</td>
                <td>
                    {{$Orderitem->product->nom}}
                    @if($Orderitem->productColor)
                        @if($Orderitem->productColor->color)
                            <span>- Couleur: {{$Orderitem->productColor->color->nom_couleur}}</span>
                        @endif
                    @endif
                </td>
                <td width="10%">{{$Orderitem->product->prix_de_vente}} F CFA</td>
                <td width="10%">{{$Orderitem->quantity}}</td>
                <td class="fw-bold">{{$Orderitem->quantity * $Orderitem->product->prix_de_vente}} F CFA</td>
                @php
                    $totalPrice += $Orderitem->quantity * $Orderitem->product->prix_de_vente;
                @endphp
            </tr>
            @endforeach
            <tr class="bg-blue">
                <td colspan="5" class="total-heading">Montant total</td>
                <td colspan="1"  class="total-heading">{{$totalPrice}} F CFA</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Merci d'avoir choisi Golden market
    </p>

</body>
</html>
