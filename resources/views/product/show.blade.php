@extends('layouts.app')
@section('content')


























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
                    <a href="#" id="pop">
                    <img class="imagezoom" alt="" src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}" id="image">
                    </a>
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
               <button  id="plusinfo" class=" btn btn-success">Plus de détails</button>
              <button  id="moinsinfo" class=" btn btn-warning" >Moins de détails</button>


        </div>
    </div>
    <a href="#" id="pop">
        <img id="imageresource" src="http://patyshibuya.com.br/wp-content/uploads/2014/04/04.jpg" style="width: 400px; height: 264px;">
        Click to Enlarge
    </a>

    <!-- Creates the bootstrap modal where the image will appear -->
    <div class="modal fade mt-4" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
         {{--  <div class="modal-content">
          <div class="modal-header">--}}


          </div>
          <div class="modal-body d-flex justify-content-center pt-4" >
            <button  type="button" class="close" style="color: red" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

            <img src="{{asset('asset/item/images/'.$item->Id.'/Medium1.jpg')}}" id="imagepreview" style="width:1200px; height:auto;" >
          </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script>
    $("#pop").on("click", function() {
         $('#imagepreview').attr('src', $('#imagezoom').attr('src')); // here asign the image to the modal when the user click the enlarge link
         $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
      });
     </script>
{{--
    <div class="modal fade mt-4" id="imagemodal" tabindex="-1" data-dismiss="modal"s role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="model-dialog">
        <div class="modal-content">
            <div class="modal-header">

            <div class=" d-flex justify-content-center pt-4" data-dismiss="modal" >
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>


              <img src="{{asset('asset/item/images/'.$item->Id.'/Medium1.jpg')}}" id="imagepreview" style="width:1200px; height:auto;" >
            </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <script>
          $("#pop").on("click", function() {
         $('#imagepreview').attr('src', $('#imagezoom').attr('src')); // here asign the image to the modal when the user click the enlarge link
         $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
      });

          </script> --}}


    <script>
         $('#moinsinfo').hide();

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
                             $('#moinsinfo').show();
                         }
                     });
                 });

                 $(function () {
                     $('#moinsinfo').click(function () {
                         $('#datalist tr:visible ').slice(5, 150).hide();
                         if ($('#datalist tr').length !== $('#datalist tr:visible').length) {
                             $('#plusinfo').show();
                             $('#moinsinfo').hide();




                         }







                    });
                 });



    </script>

@endsection


