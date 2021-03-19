@extends('layouts.app')


@section('content')


    <div class="container  align-items-center mt-4">
        <div class="col-md-12 my-auto">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">{{$item->Caption}}</strong>
                <h5 class="mb-0"> {{ number_format($item->CostPrice,2)}}</h5>
              <div class="mb-1 text-muted">{{ $item->DesComClear}}</div>
                <p class="card-text mb-auto"> le Stoke virul : <em>{{ number_format($item->VirtualStock,0)}} </em> Pice</p>
                <p class="card-text mb-auto"> le Stoke real : <em>{{ number_format($item->RealStock,0)}} </em> Pice</p>
                <p class="card-text mb-auto"> le BarCode : {{ $item->BarCode}}</p>
                  @if(number_format($item->RealStock,0)>0 && number_format($item->VirtualStock,0)>0)
                    <form action="{{route('cart.store')}}" method="POST">
                      @csrf
                    
                      <input type="text" name="item_id" value="{{$item->Id}}">
                      <input type="text" name="quantity" value="1">

                      <button type="submit" class="btn btn-success" > Ajouter au panier</button>
                    </form>
                      @else
                  <button type="submit" class="btn btn-warning" disabled="disabled"> Pas disponible pour l'instant </button>
                  @endif
              </div>
              <div class="col-auto d-none d-lg-block">
                <img style="width:200px;height:250px" src="https://inishop.com/img/gallery_mediums/67488779_1160213557.jpg" alt=" " class="bd-placeholder-img" >

              </div>
            </div>
          </div>

    </div>
    
@endsection