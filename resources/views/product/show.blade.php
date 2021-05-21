@extends('layouts.app')
@section('content')


<section class="mb-5">

    <div class="row">
      <div class="col-md-6 mb-4 mb-md-0">

        <div id="mdb-lightbox-ui"></div>

        <div class="mdb-lightbox">

          <div class="row product-gallery mx-1">

            <div class="col-12 mb-0">
              <figure class="view overlay rounded z-depth-1 main-img" >
                <a href="{{asset('asset/item/images/'.$item->Id.'/Medium1.jpg')}}"
                  data-size="210x623">
                  <img src="{{asset('asset/item/images/'.$item->Id.'/Medium1.jpg')}}"
                    class="img-fluid z-depth-1" id="image">
                </a>
              </figure>

            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-3">
                  <div class="view overlay rounded z-depth-1 gallery-item">
                    <img id="img-thumbnail" src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}"
                      class="img-fluid">
                    <div class="mask rgba-white-slight"></div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="view overlay rounded z-depth-1 gallery-item">
                    <img id="img-thumbnail" src="{{asset('asset/item/images/'.$item->Id.'/Medium2.jpg')}}"
                      class="img-fluid">
                    <div class="mask rgba-white-slight"></div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="view overlay rounded z-depth-1 gallery-item">
                    <img id="img-thumbnail" src="{{asset('asset/item/images/'.$item->Id.'/Medium3.jpg')}}"
                      class="img-fluid">
                    <div class="mask rgba-white-slight"></div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="view overlay rounded z-depth-1 gallery-item">
                    <img id="img-thumbnail" src="{{asset('asset/item/images/'.$item->Id.'/Medium4.jpg')}}"
                      class="img-fluid">
                    <div class="mask rgba-white-slight"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>


      </div>
      <script>
        var thumbImage =document.getElementById('img-thumbnail');
                  thumbImage.forEach((element) => element.addEventListener('mouseenter', changeImage));
                function changeImage(element){
                        var image = document.getElementById('image');
                        image.setAttribute("src", this.src);
                  }



                  $(function () {
                    $('#plusinfo').click(function () {
                        $('#datalist li:hidden').slice(0, 60).show();
                        if ($('#datalist li').length == $('#datalist li:visible').length) {
                            $('#plusinfo').hide();
                        }
                    });
                });



    </script>

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

                <button type="submit" class="btn btn-light btn-md mr-1 mb-2"><i
                    class="fas fa-shopping-cart pr-2"></i> Ajouter au panier</button>

            </form>
            @else
                    <button type="submit" class="btn btn-warning" disabled="disabled"> Pas disponible pour le moment
                    </button>
                @endif
                <a href="{{ url('generate-feature', $item->Id) }}" class="btn btn-light btn-md mr-1 mb-2"><i class="fas fa-download "></i> Téléchargez la fiche produit</a>
      </div>
    </div>

  </section>

            <ul id="datalist">
                @if (count($item->caracteristiques)>0)
                    @foreach ($item->caracteristiques as $caracteristique)
                        <li>{{$caracteristique->Libelle}} :     {{$caracteristique->Value}}</li>
                     @endforeach

                @endif
                </ul>

          <button  id="plusinfo" class=" btn btn-primary">Plus de détails</button>
    </div>
</div>




@endsection


