@extends('layouts.app')
@section('content')




  

<section class="mb-5">

    <div class="row">
      <div class="col-md-6 mb-4 mb-md-0">
  
        <div id="mdb-lightbox-ui"></div>
  
        <div class="mdb-lightbox">
  
          <div class="row product-gallery mx-1">
  
            <div class="col-12 mb-0">
              <figure class="view overlay rounded z-depth-1 main-img">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                  data-size="210x623">
                  <img src="{{asset('asset/item/images/'.$item->Id.'/Medium1.jpg')}}" 
                    class="img-fluid z-depth-1">
                </a>
              </figure>
          
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-3">
                  <div class="view overlay rounded z-depth-1 gallery-item">
                    <img src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}" 
                      class="img-fluid">
                    <div class="mask rgba-white-slight"></div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="view overlay rounded z-depth-1 gallery-item">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
                      class="img-fluid">
                    <div class="mask rgba-white-slight"></div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="view overlay rounded z-depth-1 gallery-item">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg"
                      class="img-fluid">
                    <div class="mask rgba-white-slight"></div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="view overlay rounded z-depth-1 gallery-item">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                      class="img-fluid">
                    <div class="mask rgba-white-slight"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
        </div>
  
      </div>
      <div class="col-md-6">
  
        <h5>Fantasy T-shirt</h5>
        <p class="mb-2 text-muted text-uppercase small">Shirts</p>
        <ul class="rating">
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="far fa-star fa-sm text-primary"></i>
          </li>
        </ul>
        <p><span class="mr-1"><strong>$12.99</strong></span></p>
        <p class="pt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, sapiente illo. Sit
          error voluptas repellat rerum quidem, soluta enim perferendis voluptates laboriosam. Distinctio,
          officia quis dolore quos sapiente tempore alias.</p>
        <div class="table-responsive">
          <table class="table table-sm table-borderless mb-0">
            <tbody>
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Model</strong></th>
                <td>Shirt 5407X</td>
              </tr>
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Color</strong></th>
                <td>Black</td>
              </tr>
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Delivery</strong></th>
                <td>USA, Europe</td>
              </tr>
            </tbody>
          </table>
        </div>
        <hr>
        <div class="table-responsive mb-2">
          <table class="table table-sm table-borderless">
            <tbody>
              <tr>
                <td class="pl-0 pb-0 w-25">Quantity</td>
                <td class="pb-0">Select size</td>
              </tr>
              <tr>
                <td class="pl-0">
                  <div class="def-number-input number-input safari_only mb-0">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                      class="minus"></button>
                    <input class="quantity" min="0" name="quantity" value="1" type="number">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                      class="plus"></button>
                  </div>
                </td>
                <td>
                  <div class="mt-1">
                    <div class="form-check form-check-inline pl-0">
                      <input type="radio" class="form-check-input" id="small" name="materialExampleRadios"
                        checked>
                      <label class="form-check-label small text-uppercase card-link-secondary"
                        for="small">Small</label>
                    </div>
                    <div class="form-check form-check-inline pl-0">
                      <input type="radio" class="form-check-input" id="medium" name="materialExampleRadios">
                      <label class="form-check-label small text-uppercase card-link-secondary"
                        for="medium">Medium</label>
                    </div>
                    <div class="form-check form-check-inline pl-0">
                      <input type="radio" class="form-check-input" id="large" name="materialExampleRadios">
                      <label class="form-check-label small text-uppercase card-link-secondary"
                        for="large">Large</label>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <button type="button" class="btn btn-primary btn-md mr-1 mb-2">Buy now</button>
        <button type="button" class="btn btn-light btn-md mr-1 mb-2"><i
            class="fas fa-shopping-cart pr-2"></i>Add to cart</button>
      </div>
    </div>
  
  </section>





<div class="container  align-items-center mt-4">
    <div class="col-md-12 my-auto">
        {{-- {{ddd($item)}} --}}
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
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
                <img class="" alt="" src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}" id="image">
                    <div class="mt-2">
                        <img class="img-thumbnail" alt="" src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}" width="50" alt=" ">
                        <img class="img-thumbnail" alt="" src="{{asset('asset/item/images/'.$item->Id.'/Cart2.jpg')}}" width="50" alt=" ">
                        <img class="img-thumbnail" alt="" src="{{asset('asset/item/images/'.$item->Id.'/Cart3.jpg')}}" width="50" alt=" ">
                        <img class="img-thumbnail" alt="" src="{{asset('asset/item/images/'.$item->Id.'/Cart4.jpg')}}" width="50" alt=" ">
                   </div>
            </div>
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
            <tbody id="datalist">
                @if (count($item->caracteristiques)>0)
                    @foreach ($item->caracteristiques as $caracteristique)
                    <tr >
                        <td>{{$caracteristique->Libelle}}</td>
                        <td>{{$caracteristique->Value}}</td>
                    </tr>
                     @endforeach
                     
                @endif
            </tbody>
          </table>
          <button  id="plusinfo" class=" btn btn-primary">Plus de détails</button>
    </div>
</div>



    <script>
        var thumbImage =document.querySelectorAll('.img-thumbnail');
                  thumbImage.forEach((element) => element.addEventListener('mouseenter', changeImage));
                function changeImage(element){
                        var data = $(this).find('img').data('zoom-image');
                        var image = document.getElementById('image');
                        image.setAttribute("src", this.src);
                  }

                  $(function () {
                    $('#plusinfo').click(function () {
                        $('#datalist tr:hidden').slice(0, 60).show();
                        if ($('#datalist tr').length == $('#datalist tr:visible').length) {
                            $('#plusinfo').hide();
                        }
                    });
                });  

              
                  
    </script>

@endsection


