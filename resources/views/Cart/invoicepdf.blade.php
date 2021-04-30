<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KW-DISTRIBUTION</title>
    <style>
        body{
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #d8b908;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
        figure img {
            float: left;
            /* width: 60px;
            height: 60px; */
            margin-right: 10px;
            margin-top: 13px;
        }
    </style>
</head>
<body>
    {{-- <figure>
        <img class="logo" src="{{asset('asset/img/kw-distribution.jpg')}}">
    </figure> --}}
    <div class="container">

        <div class="brand-section">
            <div class="">
                <div class="">
                    <h1 class="text-white">KW-DISTRIBUTION</h1>
                    <p class="text-white">12T Avenue Eugène Hénaff
                    </p>
                    <p class="text-white">69120 Vaulx-en-Velin, France</p>
                    <p class="text-white">04 86 80 08 00</p>
                </div>
                <div class="">
                    <div class="company-details">

                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="body-section">
            <div class="">
                <div class="">
                    <h2 class="heading">Numéro Facture: 001</h2>
                    <p class="sub-heading">Numéro de colis </p>
                    <p class="sub-heading">Date Commande: <?php echo date('d.m.y'); ?>   </p>
                    <p class="sub-heading">Adresse email: customer@gmail.com </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading">Nom Complet:  </p>
                    <p class="sub-heading">Adresse:  </p>
                    <p class="sub-heading">Numéro de téléphone:  </p>
                    <p class="sub-heading">Ville, Pays, Code Postal:  </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Produit Commandé</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th class="w-20">Prix</th>
                        <th class="w-20">Quantité</th>
                        <th class="w-20">Total</th>
                    </tr>
                </thead>
                @foreach (Cart::content() as $item)
                {{ $arrivage = false }}
                <tbody>
                    <tr>
                        <td> <h6 class="mb-0"> <a href="{{ route('product.show', $item->id) }}"
                            class="text-dark d-inline-block align-middle">{{ $item->name }}</a>
                    </h6></td>
                        <td class="border-0 align-middle">{{ $item->price }} <strong></strong></td>
                        <td class="border-0 align-middle">
                                    {{ $item->qty }}
                    </td>
                        <td class="border-0 align-middle"> {{ $item->subtotal() }}<strong></strong></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right">Sous-Total</td>
                        <td> <strong>{{ Cart::subtotal() }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Taxe Total</td>
                        <td> <strong>{{ Cart::tax() }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right"> Total</td>
                        <td> {{ Cart::total() }} </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Statut du paiement: </h3>
            <h3 class="heading">Mode de paiement:</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2021 - KW-DISTRIBUTION. All rights reserved.
                <a href="https://www.kw-distribution.com/" class="float-right">www.kw-distribution.com</a>
            </p>
        </div>


</body>
</html>

