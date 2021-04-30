
@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"></head>
    <div class="container  align-items-center mt-4">
        {{-- <figure>
        <img class="logo" src="{{asset('asset/img/kw-distribution.jpg')}}">
    </figure> --}}
    <div class="container">

        <div class="brand-section">
            <div class="">
                <div class="">
                    <h1 class="text-white">KW-DISTRIBUTION</h1>
                    <p class="text-white">12T Avenue Eugène Hénaff </p>
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
            <div
                class="">
                <div class="">
                    <strong class="heading">{{ $item->Caption }}</strong>
                    <p class="sub-heading"> {{ number_format($item->CostPrice, 2) }} €</p>
                    <p class="sub-heading">{{ $item->DesComClear }}</p>
                    <p class="sub-heading "> En stock : <em>{{ number_format($item->RealStock, 0) }} </em>
                        pièces
                    </p>
                    <p class="sub-heading"> Code Bar : {{ $item->BarCode }}</p>

                    @if (number_format($item->RealStock, 0) > 0 || !is_null($item->arrivage->first()))
                        @if (!is_null($item->arrivage->first()))
                            <div class="sub-heading">
                                <h5>Arrivage</h5>
                                @if (count($item->arrivage->take(5)) > 1)
                                    @foreach ($item->arrivage->take(5) as $arriv)
                                    <em class="text-info"> <p class="text-info"> Quantité : {{ number_format($arriv->Quantity, 0) }} pièces</p></em>
                                        <p>Date d'arrivage : {{ date('d-m-Y ', strtotime($arriv->DeliveryDate)) }} </p>
                                    @endforeach
                                @else
                                   <em class="text-info"> <p > Quantité : {{ number_format($item->arrivage->first()->Quantity, 0) }} pièces</p></em>
                                    <p >Date d'arrivage : {{ date('d-m-Y ', strtotime($arrivage->DeliveryDate)) }} </p>
                                @endif
                            </div>
                        @endif
                    @else
                        <button type="submit" class="btn btn-warning" disabled="disabled"> Pas disponible pour le moment
                        </button>
                    @endif
                </div>
            </div>
        </div>



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

        <div class="body-section">
            <table class="table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th class="w-20" scope="col">Nom</th>
                    <th class="w-20" scope="col">Valeur</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($item->caracteristiques)> 1)
                    @foreach ($item->caracteristiques as $caracteristiques)
                  <tr>
                    <th  class="w-20" scope="row">{{$caracteristiques->Libelle}}</th>
                    <td>{{$caracteristiques->Value}}</td>
                  </tr>
                  @endforeach
                    @endif
                </tbody>
              </table>
        </div>
        <div class="body-section">
            <p>&copy; Copyright 2021 - KW-DISTRIBUTION. All rights reserved.
                <a href="https://www.kw-distribution.com/" class="">www.kw-distribution.com</a>
            </p>
        </div>
    </div>

@endsection
