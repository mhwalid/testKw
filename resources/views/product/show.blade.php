@extends('layouts.app')
@section('content')


<section class="mb-5">

    <div id="show" class="row">
      <div class="col-md-6 mb-4 mb-md-0">

        <div id="mdb-lightbox-ui"></div>

        <div class="mdb-lightbox">

          <div class="row product-gallery mx-1">

            <div class="col-12 mb-0">
              <figure class="view overlay rounded z-depth-1 main-img" >
                <a href="#" id="pop">
                  <img src="{{asset('asset/item/images/'.$item->Id.'/Medium1.jpg')}}"
                    class="img-fluid z-depth-1" id="image">
                </a>
              </figure>

            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-3">
                  <div class="view overlay rounded z-depth-1 gallery-item">
                    <img class="img-thumbnail" src="{{asset('asset/item/images/'.$item->Id.'/Medium1.jpg')}}"
                      class="img-fluid">
                    <div class="mask rgba-white-slight"></div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="view overlay rounded z-depth-1 gallery-item">
                    <img class="img-thumbnail" src="{{asset('asset/item/images/'.$item->Id.'/Medium2.jpg')}}"
                      class="img-fluid">
                    <div class="mask rgba-white-slight"></div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="view overlay rounded z-depth-1 gallery-item">
                    <img class="img-thumbnail" src="{{asset('asset/item/images/'.$item->Id.'/Medium3.jpg')}}"
                      class="img-fluid">
                    <div class="mask rgba-white-slight"></div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="view overlay rounded z-depth-1 gallery-item">
                    <img class="img-thumbnail" src="{{asset('asset/item/images/'.$item->Id.'/Medium4.jpg')}}"
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

        <h5>{{ $item->FamilyId }}</h5>
        <p class="mb-2 text-muted text-uppercase small">{{ $item->DesComClear }}</p>
        <p><span class="mr-1"><strong>{{ number_format($item->CostPrice, 2) }} €</strong></span></p>
        <p class="pt-1">{{ $item->maincarac->description }}</p>
        <div class="table-responsive">
          <table class="table table-sm table-borderless mb-0">
            <tbody>
                @if ($item->maincarac->marque!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Marque</strong></th>
                <td>{{ $item->maincarac->marque }}</td>
              </tr>
              @endif
              @if ($item->maincarac->taille_ecran!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Taille écran en cm</strong></th>
                <td>{{ $item->maincarac->taille_ecran }}</td>
              </tr>
              @endif
              @if ($item->maincarac->fam_proc!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Famille de processeur</strong></th>
                <td>{{ $item->maincarac->fam_proc }}</td>
              </tr>
              @endif
              @if ($item->maincarac->mod_proc!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Modèle de processeur</strong></th>
                <td>{{ $item->maincarac->mod_proc }}</td>
              </tr>
              @endif
              @if ($item->maincarac->sock_proc!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Socket processeur</strong></th>
                <td>{{ $item->maincarac->sock_proc }}</td>
              </tr>
              @endif
              @if ($item->maincarac->syst_exploitation!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Système d'exploitation</strong></th>
                <td>{{ $item->maincarac->syst_exploitation }}</td>
              </tr>
              @endif
              @if ($item->maincarac->ssd!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>SSD</strong></th>
                <td>{{ $item->maincarac->ssd }}</td>
              </tr>
              @endif
              @if ($item->maincarac->stockage!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Stockage</strong></th>
                <td>{{ $item->maincarac->stockage }}</td>
              </tr>
              @endif
              @if ($item->maincarac->memoire!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Mémoire</strong></th>
                <td>{{ $item->maincarac->memoire }}</td>
              </tr>
              @endif
              @if ($item->maincarac->puissance!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Puissance</strong></th>
                <td>{{ $item->maincarac->puissance }}</td>
              </tr>
              @endif
              @if ($item->maincarac->frequ_memoire!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Fréquence mémoire</strong></th>
                <td>{{ $item->maincarac->frequ_memoire }}</td>
              </tr>
              @endif
              @if ($item->maincarac->cg!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Carte Graphique</strong></th>
                <td>{{ $item->maincarac->cg }}</td>
              </tr>
              @endif
              @if ($item->maincarac->chipset!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>Chipset</strong></th>
                <td>{{ $item->maincarac->chipset }}</td>
              </tr>
              @endif
              @if ($item->maincarac->ram!='')
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>RAM</strong></th>
                <td>{{ $item->maincarac->ram }}</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
        <hr>

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

                <button type="submit" class="btn  boutton "><i
                    class="fas fa-shopping-cart pr-2"></i> Ajouter au panier</button>

            </form>
            @else
                    <button type="submit" class="btn btn-warning boutton" disabled="disabled"> Pas disponible pour le moment
                    </button>
                @endif
                <a href="{{ url('generate-feature', $item->Id) }}" class="btn boutton"><i class="fas fa-download "></i> Téléchargez la fiche produit</a>
      </div>
    </div>

  </section>

  <div class="container">
    <ul id="datalist">
            @if (count($item->caracteristiques)>0)
                @foreach ($item->caracteristiques as $caracteristique)

                  <li><strong>{{$caracteristique->Libelle}} </strong>: {{$caracteristique->Value}}</li>

            @endforeach

            @endif
            </ul>
        <button  id="plusinfo" class=" btn btn-dark btn-md mr-1 mb-2">Plus de détails</button>
        <button  id="moinsinfo" class=" btn btn-dark btn-md mr-1 mb-2">Moins de détails</button>
  </div>
</div>


   <!-- Creates the bootstrap modal where the image will appear -->
   <div class="modal fade " id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  >






    <div class="contents">
        <div class="modal-dialog" style="position: absolute; top: 13%; left: 30%;  ">
            <div class="modal-content" style="background-color:transparent;" >
              <div class="modal-header" style="margin-bottom: -100px;
              margin-top: -100px; border-bottom:none; ">


        <div class="divCarousel" style="" >
            <div class="divCarousel" >

                <div id="carouselExampleCaptions" class="carousel divCarousel slide" data-ride="carousel" data-interval="false">
                    <ol class="carousel-indicators " style=" bottom: 95%;">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="li"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1" class="activeli"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2" class="activeli1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="3" class="activeli2"></li>
                    </ol>
                    <div class="carousel-inner"style="width:1000px;  height: 1000px;">
                        <div class="carousel-item">
                            <img class="d-block w-100" style="width: auto; height:750px;"    data-src="" alt="First slide" src="{{asset('asset/item/images/'.$item->Id.'/Medium1.jpg')}}" data-holder-rendered="true" >
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block w-100" style="width: auto; height:750px;"    alt="Second slide" src="{{asset('asset/item/images/'.$item->Id.'/Medium2.jpg')}}" data-holder-rendered="true">
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                        </div>
                        <div class="carousel-item active1">
                            <img class="d-block w-100" style="width: auto; height:750px;"   alt="Second slide" src="{{asset('asset/item/images/'.$item->Id.'/Medium3.jpg')}}" data-holder-rendered="true">
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                        </div>
                        <div class="carousel-item active2">
                            <img class="d-block w-100" style="width: auto; height:750px;"  alt="Second slide" src="{{asset('asset/item/images/'.$item->Id.'/Medium4.jpg')}}" data-holder-rendered="true">
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev" style="opacity: 1; ">
                        <i class="fas fa-arrow-circle-left"></i>

                        {{-- <span class="carousel-control-prev-icon" aria-hidden="true" style="opacity: 1; ";></span> --}}

                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <i class="fas fa-arrow-circle-right"></i>

                    </a>
                </div>



            </div>


        </div>


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
                         $('#datalist li:hidden').slice(0,60).show();
                         if ($('#datalist li').length == $('#datalist li:visible').length) {
                             $('#plusinfo').hide();
                             $('#moinsinfo').show();
                         }
                         if ($('#datalist li').length !== $('#datalist li:visible').length) {
                             $('#plusinfo').show();
                             $('#moinsinfo').show();
                         }
                     });
                 });
                 $(function () {
                     $('#moinsinfo').click(function () {
                         $('#datalist li:visible ').slice(5, 150).hide();
                         if ($('#datalist li').length !== $('#datalist li:visible').length) {
                             $('#plusinfo').show();
                             $('#moinsinfo').hide();
                         }
                    });
                 });
</script>

@endsection


