
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
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
    margin-left : 70%;
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

.desc{
    margin-bottom:35px;;
}
  .desc img{
    float:right;
    padding-right:8%;
    top:5;

}

  #company {

    position:absolute;
    top: 3%;


  }

  #desc div,
  #company div {
    white-space: nowrap;
  }

  table {

    width: 90%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-top:50px;
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

  table td {
    padding: 20px;
    text-align: center;
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
<header class="clearfix">
    <div id="logo">
      <img src="../../testKw/public/asset/img/kw-distribution.jpg">
    </div>
    <h1>Fiche Produit : {{$item->Id}}</h1>
    <div id="company" class="clearfix">
      <div>KW-DISTRIBUTION</div>
      <div>12T Avenue Eugène Hénaff,<br /> 69120 Vaulx-en-Velin, France</div>
      <div>04 86 80 08 00</div>
      <div><a href="mailto:vente@kw-distribution.com">vente@kw-distribution.com</a></div>
    </div>
                <div class="desc">
                    <img src={{public_path('asset/item/images/'.$item->Id.'/Cart1.jpg')}}>
                    <strong >{{ $item->Caption }}</strong>
                    <p > {{ number_format($item->CostPrice, 2) }} €</p>
                    <p >{{ $item->DesComClear }}</p>
                    <p >En stock : <em>{{ number_format($item->RealStock, 0) }} </em>
                        pièces
                    </p>
                    <p > Code Bar : {{ $item->BarCode }}</p>

                    @if (number_format($item->RealStock, 0) > 0 || !is_null($item->arrivage->first()))
                        @if (!is_null($item->arrivage->first()))
                            <div>
                                <h5>Arrivage</h5>
                                @if (count($item->arrivage->take(5)) > 1)
                                    @foreach ($item->arrivage->take(5) as $arriv)
                                    <em> <p> Quantité : {{ number_format($arriv->Quantity, 0) }} pièces</p></em>
                                        <p>Date d'arrivage : {{ date('d-m-Y ', strtotime($arriv->DeliveryDate)) }} </p>
                                    @endforeach
                                @else
                                   <em> <p> Quantité : {{ number_format($item->arrivage->first()->Quantity, 0) }} pièces</p></em>
                                    <p>Date d'arrivage : {{ date('d-m-Y ', strtotime($arrivage->DeliveryDate)) }} </p>
                                @endif
                            </div>
                        @endif
                    @else
                        <p> Pas disponible pour le moment
                        </p>
                    @endif



                </div>


        <div>
            <table >
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Caractéristique</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($item->caracteristiques)> 1)
                    @foreach ($item->caracteristiques as $caracteristiques)
                  <tr>
                    <th>{{$caracteristiques->Libelle}}</th>
                    <td>{{$caracteristiques->Value}}</td>
                  </tr>
                  @endforeach
                    @endif
                </tbody>
              </table>
        </div>
        <footer>
            <p>&copy; Copyright 2021 - KW-DISTRIBUTION. All rights reserved.
                <a href="https://www.kw-distribution.com/" class="">www.kw-distribution.com</a>
            </p>
        </footer>
    </div>

@endsection
