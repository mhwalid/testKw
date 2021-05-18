@extends('layouts.app')
<style>
  a {
    color: blue;
    text-decoration: underline;
  }
ul,li{
    list-style-type: none;
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



  #logo {
    display: flex;
      text-align: center;
    margin-bottom: 10px;
    margin-left : 70%;
  }

  #logo img {

    width: 150px;
  }

  h1,h2 {
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
    margin-bottom: 14%;
    padding-right:8%;
    bottom:5%;

}

  #company {
    position:absolute;
    top: 3%;
  }

.carac{
    margin-top:100px;
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
@section('content')
    <div id="logo">
      <img src={{public_path('asset/img/kw-distribution.jpg')}}>
    </div>
    <h1>Fiche Produit : {{$item->Id}}</h1>
    <div id="company">
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


        <div class="carac">
            <h2 >Caractéristiques</h2>
                <ul>
                    @if (count($item->caracteristiques)> 1)
                    @foreach ($item->caracteristiques as $caracteristiques)

                  <li>{{$caracteristiques->Libelle}}:
                  {{$caracteristiques->Value}}<li>

                  @endforeach
                    @endif
                </ul>
        </div>
        <footer>
            <p>&copy; Copyright 2021 - KW-DISTRIBUTION. All rights reserved.
                <a href="https://www.kw-distribution.com/" class="">www.kw-distribution.com</a>
            </p>
        </footer>
    </div>

@endsection
