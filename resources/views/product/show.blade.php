@extends('layouts.app')

@include('include.navbar')

@section('content')
    <div class="container  align-items-center mt-4">

        <div class="col-md-12 my-auto">
            <div
                class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">{{ $item->Caption }}</strong>
                    <h5 class="mb-0"> {{ number_format($item->CostPrice, 2) }} €</h5>
                    <div class="mb-1 text-muted">{{ $item->DesComClear }}</div>
                    <p class="card-text "> En stock : <em>{{ number_format($item->RealStock, 0) }} </em>
                        pièces
                    </p>
                    <p class="card-text mb-auto"> Code Bar : {{ $item->BarCode }}</p>

                    @if (number_format($item->RealStock, 0) > 0 || !is_null($item->arrivage->first()))
                        @if (!is_null($item->arrivage->first()))
                            <div class="mt-4">
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
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf

                            <input type="text" name="item_id" value="{{ $item->Id }}">
                            <input type="number" name="quantity" max="{{ number_format($item->RealStock, 0) }}" min="1"
                                value="1">

                            <button type="submit" class="btn btn-success"> Ajouter au panier</button>

                        </form>
                    @else
                        <button type="submit" class="btn btn-warning" disabled="disabled"> Pas disponible pour le moment
                        </button>
                    @endif
                    <h6 class="mb-show">

                        <a href="{{ url('generate-feature', $item->Id) }}" class="btn btn-success"> Téléchargez la fiche produit</a>
                    </h6>
                </div>


                <div class="col-auto d-none d-lg-block">

                        <img class="" alt=""
                             src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}" id="image">

                    <div class="mt-2">
                          <img class="img-thumbnail" alt=""
                        src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}" width="50" alt=" ">
                        <img class="img-thumbnail" alt=""
                        src="{{asset('asset/item/images/'.$item->Id.'/Cart2.jpg')}}" width="50" alt=" ">
                        <img class="img-thumbnail" alt=""
                        src="{{asset('asset/item/images/'.$item->Id.'/Cart3.jpg')}}" width="50" alt=" ">
                        <img class="img-thumbnail" alt=""
                        src="{{asset('asset/item/images/'.$item->Id.'/Cart4.jpg')}}" width="50" alt=" ">


                        </div>
                </div>

                <script>
                    var thumbImage =document.querySelectorAll('.img-thumbnail');

                  thumbImage.forEach((element) => element.addEventListener('click', changeImage));

                function changeImage(element){
                        var data = $(this).find('img').data('zoom-image');
                        var image = document.getElementsByTagName("img").item(1);
                        image.setAttribute("src", this.src);
                  }
                    </script>
                </div>
            </div>




        <div class="container">
            <table class="table table-hover ">
                <thead class="thead-info" style="background-color: #d8b908;">
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Valeur</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($item->caracteristiques)>0)

                    @foreach ($item->caracteristiques as $caracteristiques)
                  <tr>
                    <th scope="row">{{$caracteristiques->Libelle}}</th>
                    <td>{{$caracteristiques->Value}}</td>
                  </tr>
                  @endforeach
                    @endif
                </tbody>
              </table>
        </div>

    </div>

@endsection
@section('footer')
@include('include.footer')
@endsection
