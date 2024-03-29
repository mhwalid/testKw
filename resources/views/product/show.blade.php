@extends('layouts.app')

@section('content')
<section class="">

    <div id="show" class="row m-lg-5 m-md-5 m-0">
      <div class="col-md-6 mb-4 mb-md-0">
        <div class="mdb-lightbox">
          <div class="row product-gallery mx-1">

            <div class="col-12 mb-4 pb-4" id="produitimage"  >

              <figure class="view overlay rounded z-depth-1 main-img" >

                <a href="#" id="pop">
                    @if (File::exists('asset/item/images/'.$item->Id.'/Medium1.jpg'))
                    <img src="{{asset('asset/item/images/'.$item->Id.'/Medium1.jpg')}}"
                    class="img-fluid z-depth-1" id="image">
                    @else
                    <img src="{{asset('asset/img/img-indispo-480.jpg')}}"
                    class="img-fluid z-depth-1 mr-8" id="image">
                    @endif
                </a>
              </figure>
            </div>
            <div class="col-12 mt-4 " id="paddingshow">
              <div class="row mt-4  pt-4 ">
                @for ($i = 1; $i < 5; $i++)
                  @if (File::exists('asset/item/images/'.$item->Id.'/Medium'.$i.'.jpg'))

                  <div class="col-3 ">
                    <div class="view overlay rounded z-depth-1 gallery-item">
                      <img class="img-thumbnail" src="{{asset('asset/item/images/'.$item->Id.'/Medium'.$i.'.jpg')}}" class="img-fluid">
                      <div class="mask rgba-white-slight"></div>
                    </div>
                  </div>
                  @endif
                @endfor
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-md-6 " >

        <h5>{{ $item->family->Caption ?? $item->FamilyId}}</h5>
        <p class="mb-2 text-muted text-uppercase small">{{ $item->DesComClear }}</p>

        @guest <div id="barreprix" class="ml-0">
            <p id="coprix"><strong>Connectez-vous pour voir les prix</strong></p></div> @else
        <p><span class="mr-1"><strong>{{ number_format($item->CostPrice, 2) }} €</strong></span></p>
{{--
        @guest <p><em class=" ml-4 bg-warning">Connectez-vous pour voir les prix !</em></p> @else
            @if (!is_null(Auth::user()->email_verified_at) && Auth::user()->compte_actif ==1)
                <p><span class="mr-1"><strong>{{ number_format($item->SalePriceVatExcluded, 2) }} €</strong></span></p>
            @endif
--}}
        @endguest
        @if ($item->maincarac)
        <div class="scroller">
          @if ($item->maincarac->marque!='')
        <ul class="pl-0">
          <li  scope="row"><strong>Marque  </strong> {{ $item->maincarac->marque }}</li>
        </ul>
        @endif
        @if ($item->maincarac->taille_ecran!='')
        <ul class="pl-0">
          <th class="pl-0 w-25" scope="row"><strong>Taille écran en cm </strong>{{ $item->maincarac->taille_ecran }}</th>
        </ul>
        @endif
        @if ($item->maincarac->fam_proc!='')
        <ul class="pl-0">
          <th class="pl-0 w-25" scope="row"><strong>Famille de processeur   </strong>{{ $item->maincarac->fam_proc }}</ul>
        </ul>
        @endif
        @if ($item->maincarac->mod_proc!='')
        <ul class="pl-0">
          <th class="pl-0 w-25" scope="row"><strong>Modèle de processeur  </strong>{{ $item->maincarac->mod_proc }}</ul>
        </ul>
        @endif
        @if ($item->maincarac->sock_proc!='')
        <ul class="pl-0">
          <th class="pl-0 w-25" scope="row"><strong>Socket processeur  </strong>{{ $item->maincarac->sock_proc }}</ul>
        </ul>
        @endif
        @if ($item->maincarac->syst_exploitation!='')
        <ul class="pl-0">
          <th class="pl-0 w-25" scope="row"><strong>Système d'exploitation  </strong>{{ $item->maincarac->syst_exploitation }}</ul>
        </ul>
        @endif
        @if ($item->maincarac->ssd!='')
        <ul class="pl-0">
          <th class="pl-0 w-25" scope="row"><strong>SSD  </strong>{{ $item->maincarac->ssd }}</ul>
        </ul>
        @endif
        @if ($item->maincarac->stockage!='')
        <ul class="pl-0">
          <th class="pl-0 w-25" scope="row"><strong>Stockage  </strong>{{ $item->maincarac->stockage }}</ul>
        </ul>
        @endif
        @if ($item->maincarac->memoire!='')
        <ul class="pl-0">
          <th class="pl-0 w-25" scope="row"><strong>Mémoire  </strong>{{ $item->maincarac->memoire }}</ul>
        </ul>
        @endif
        @if ($item->maincarac->puissance!='')
        <ul>
          <th class="pl-0 w-25" scope="row"><strong>Puissance  </strong>{{ $item->maincarac->puissance }}</ul>
        </ul>
        @endif
        @if ($item->maincarac->frequ_memoire!='')
        <ul class="pl-0">
          <th class="pl-0 w-25" scope="row"><strong>Fréquence mémoire  </strong>{{ $item->maincarac->frequ_memoire }}</ul>
        </ul>
        @endif
        @if ($item->maincarac->cg!='')
        <ul>
          <th class="pl-0 w-25" scope="row"><strong>Carte Graphique  </strong>{{ $item->maincarac->cg }}</ul>
        </ul>
        @endif
        @if ($item->maincarac->chipset!='')
        <ul class="pl-0">
          <th class="pl-0 w-25" scope="row"><strong>Chipset  </strong>{{ $item->maincarac->chipset }}</ul>
        </ul>
        @endif
        @if ($item->maincarac->ram!='')
        <ul class="pl-0">
          <th class="pl-0 w-25" scope="row"><strong>RAM  </strong>{{ $item->maincarac->ram }}</ul>
        </ul>
        @endif
      </div>
        @endif
        <hr>
        @auth <p class="card-text "> En stock : <em>{{ number_format($item->RealStock, 0) }} </em>pièces</p>@endauth
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
            @auth
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf

                <input type="text" name="item_id" value="{{ $item->Id }}">
                <input type="number" name="quantity" max="{{ number_format($item->RealStock, 0) }}" min="1"
                    value="1">
                <input type="hidden" name="price" value={{ $item->SalePriceVatExcluded }}>

                <button type="submit" class="btn mb-2 mt-2  boutton " id="btnshow"><i
                    class="fas fa-shopping-cart  pr-2"></i> Ajouter au panier</button>

            </form>
            @endauth
            @else
            <p>Pas de stock <img style=" width: 15x; height: 15px;"   src="{{asset('asset/img/plus_en_stock.svg')}}"></p>

                @endif
                <a href="{{ url('generate-feature', $item->Id) }}" class="btn boutton"><i class="fas fa-download "></i> Téléchargez la fiche produit</a>
      </div>
    </div>
    <div class="container">
    <p class="pt-4 mt-4 col-12   ">{{ $item->maincarac->description ?? "" }}</p>
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
        <button  id="plusinfo" class=" btn boutton btn-md ml-4 mb-2">Plus de détails</button>
        <button  id="moinsinfo" class=" btn boutton btn-md ml-4 mb-2">Moins de détails</button>
  </div>
</div>
  <!-- Creates the bootstrap modal where the image will appear -->


  @if (File::exists('asset/item/images/'.$item->Id.'/Medium1.jpg'))
  <div class="modal fade " id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  >

@endif

    <div class="contents">
        <div class="modal-dialog" id="placecarouspopup" >
            <div class="modal-content" style="background-color:transparent;" >
              <div class="modal-header" style="margin-bottom: -100px;
              margin-top: -100px; border-bottom:none; ">


        <div class="divCarousel" style="" >
            <div class="divCarousel" style=" height: 0px;" >

                <div id="carouselExampleCaptions" class="carousel divCarousel slide" data-ride="carousel" data-interval="false">
                    <ol class="carousel-indicators " style=" bottom: 95%;">
                        @if (File::exists('asset/item/images/'.$item->Id.'/Medium1.jpg'))
                        <li data-target="#carouselExampleCaptions" data-slide-to="1" class="li1"></li>
                        @endif
                        @if (File::exists('asset/item/images/'.$item->Id.'/Medium2.jpg'))
                        <li data-target="#carouselExampleCaptions" data-slide-to="2" class="li2"></li>
                        @endif
                        @if (File::exists('asset/item/images/'.$item->Id.'/Medium3.jpg'))
                        <li data-target="#carouselExampleCaptions" data-slide-to="3" class="li3"></li>
                        @endif
                        @if (File::exists('asset/item/images/'.$item->Id.'/Medium4.jpg'))
                        <li data-target="#carouselExampleCaptions" data-slide-to="4" class="li4"></li>
                        @endif
                    </ol>

                    <div class="carousel-inner" id="carouszoom" >
                        @if (File::exists('asset/item/images/'.$item->Id.'/Medium1.jpg') && (File::exists('asset/item/images/'.$item->Id.'/Medium2.jpg')))
                        <div class="carousel-item">
                            <img class="d-block w-100" id="imgzoom"     data-src="" alt="First slide" src="{{asset('asset/item/images/'.$item->Id.'/Medium1.jpg')}}" data-holder-rendered="true" >
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        @else
                        <div class="carousel-item active">
                            <img class="d-block w-100" id="imgzoom"     data-src="" alt="First slide" src="{{asset('asset/item/images/'.$item->Id.'/Medium1.jpg')}}" data-holder-rendered="true" >
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                       @endif
                        @if (File::exists('asset/item/images/'.$item->Id.'/Medium2.jpg'))
                        <div class="carousel-item active">
                            <img class="d-block w-100" id="imgzoom"    alt="Second slide" src="{{asset('asset/item/images/'.$item->Id.'/Medium2.jpg')}}" data-holder-rendered="true">
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        @endif
                        @if (File::exists('asset/item/images/'.$item->Id.'/Medium3.jpg'))
                        <div class="carousel-item active1">
                            <img class="d-block w-100" id="imgzoom"    alt="Second slide" src="{{asset('asset/item/images/'.$item->Id.'/Medium3.jpg')}}" data-holder-rendered="true">
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                        </div>
                        @endif
                        @if (File::exists('asset/item/images/'.$item->Id.'/Medium4.jpg'))
                        <div class="carousel-item active2">
                            <img class="d-block w-100" id="imgzoom"  alt="Second slide" src="{{asset('asset/item/images/'.$item->Id.'/Medium4.jpg')}}" data-holder-rendered="true">
                            <div class="carousel-caption d-none d-md-block">

                            </div>
                        </div>
                        @endif
                    </div>
                    @if (File::exists('asset/item/images/'.$item->Id.'/Medium2.jpg'))


                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev" style="opacity: 1; ">
                        <i class="fas fa-arrow-circle-left"></i>

                        {{-- <span class="carousel-control-prev-icon" aria-hidden="true" style="opacity: 1; ";></span> --}}

                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <i class="fas fa-arrow-circle-right"></i>

                    </a>
                    @endif
                </div>
            </div>
        </div>
        </div>

    </div>

            </div>
        </div>



<script>
$('#moinsinfo').hide();
if (0 == $('#datalist li:hidden').length) {
                $('#plusinfo').hide();
                $('#moinsinfo').hide();
            }


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





      var x = window.matchMedia("(min-width: 600px)")

myFunction(x) // Call listener function at run time
x.addListener(myFunction)

function myFunction(x) {
  if (x.matches) { // If media query matches
    $("#pop").on("click", function() {

         $('#imagepreview').attr('src', $('#imagezoom').attr('src')); // here asign the image to the modal when the user click the enlarge link
         $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
      });


  } else {

  }
}
$('#imagemodal').hide();
</script>

@endsection
