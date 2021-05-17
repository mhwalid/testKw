{{-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KW-DISTRIBUTION</title>
    <style>
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
    </style>

</head>
<body>
    <figure>
        <img class="logo" src="../../testKw/public/asset/img/kw-distribution.jpg">
    </figure>
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
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2021 - KW-DISTRIBUTION. All rights reserved.
                <a href="https://www.kw-distribution.com/" class="float-right">www.kw-distribution.com</a>
            </p>
        </div>


</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Facture n°</title>
    {{-- <link rel="stylesheet" href="../../testKw/public/css/pdf.css" media="all" /> --}}
  </head>
  <style>
      .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }

  a {
    color: #5D6975;
    text-decoration: underline;
  }

  body {
    position: relative;
    width: 21cm;
    height: 29.7cm;
    margin: 0 auto;
    color: #001028;
    background: #FFFFFF;
    font-family: Arial, sans-serif;
    font-size: 12px;
    font-family: Arial;
  }

  header {
    padding: 10px 0;
    margin-bottom: 30px;
  }

  #logo {
    display: flex;
      text-align: center;
    margin-bottom: 10px;
  }

  #logo img {

    width: 150px;
  }

  h1 {
    border-top: 1px solid  #8f7631;
    border-bottom: 1px solid  #8f7631;
    color: #8f7631;
    font-size: 2.4em;
    line-height: 1.4em;
    font-weight: normal;
    text-align: center;
    margin: 0 70px 20px 0;
    background: url(../../testKw/public/asset/img/dimension.png);
  }

  #project {
    float: left;
  }

  #project span {
    color: #5D6975;
    text-align: right;
    width: 52px;
    margin-right: 10px;
    display: inline-block;
    font-size: 0.8em;
  }

  #company {
    /* float: right; */
    /* text-align: right; */
    position:absolute;
    top: 21%;
    left: 72% ;

  }

  #project div,
  #company div {
    white-space: nowrap;
  }

  table {
    width: 90%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
  }

  table tr:nth-child(2n-1) td {
    background: #ecc9695e;
  }

  table th,
  table td {
    text-align: center;
  }

  table th {
    padding: 5px 20px;
    color: #5D6975;
    border-bottom: 1px solid #8f7631;
    white-space: nowrap;
    font-weight: normal;
  }

  table .produit,
  table .desc {
    text-align: left;
  }

  table td {
    padding: 20px;
    text-align: right;
  }

  table td.produit,
  table td.desc {
    vertical-align: top;
  }

  table td.unit,
  table td.qty,
  table td.total {
    font-size: 1.2em;
  }

  table td.grand {
    border-top: 1px solid #5D6975;;
  }



  footer {
    color: #5D6975;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #C1CED9;
    padding: 8px 0;
    text-align: center;
  }
</style>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="../../testKw/public/asset/img/kw-distribution.jpg">
      </div>
      <h1>Facture n°</h1>
      <div id="company" class="clearfix">
        <div>KW-DISTRIBUTION</div>
        <div>12T Avenue Eugène Hénaff,<br /> 69120 Vaulx-en-Velin, France</div>
        <div>04 86 80 08 00</div>
        <div><a href="mailto:vente@kw-distribution.com">vente@kw-distribution.com</a></div>
      </div>
      <div id="project">
        <div><span>CLIENT</span> John Doe</div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>DATE</span> <?php echo date('d.m.y'); ?> </div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="produit">PRODUIT</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRIX</th>
            <th>QTE</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        @foreach (Cart::content() as $item)

        {{ $arrivage = false }}
        <tbody>
          <tr>
            <td class="produit">{{ $item->name }}</td>
            <td class="desc">desc</td>
            <td class="unit">{{ $item->price }}</td>
            <td class="qty">{{$item->qty}}</td>



            <td class="total">{{ $item->subtotal() }}</td>
          </tr>
          @endforeach

          <tr>
            <td colspan="4">SOUS-TOTAL</td>
            <td class="total">{{ Cart::subtotal() }}</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">{{ Cart::tax() }}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">{{ Cart::total() }}</td>
          </tr>
        </tbody>
      </table>
    </main>
    <footer>
        <p>&copy; Copyright 2021 - KW-DISTRIBUTION. All rights reserved.
            <a href="https://www.kw-distribution.com/" class="float-right">www.kw-distribution.com</a>
        </p>
    </footer>
  </body>
</html>
