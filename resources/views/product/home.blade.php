@extends('layouts.app')


@section('content')

<div class="container-fluid" id="longueurphotohome">
    <img id="imgcatégorie"  class="w-100" src="{{asset('asset/img/CM_long.jpg')}}" alt="Certification">


</div>



<div class="container-fluid">

<div id="barrefilter" style="display: none;">

        <p id="opfilt" ><strong style="margin-right: 10%; font-size: 18px;">{{$number}}</strong>produits


        <p style="margin-top: 17px;"><input id="checkbox" type="checkbox" class="filter_all ram" value="4">En stock</p>



         <div style=" border:none; background-color:#D6D1C1; display: flex; justify-content: inline;"  class="list-group-item ">
            <p style="margin-top: 5px; margin-right:10px;">Trier par:</p>
            <select name="marque_id" style=" margin-top: 5px; height: 70%; border: none; border-radius: 20px; box-shadow: none; outline: 0;" >
                <option  class=""></option>
                <option id="filter_o" class="filter_all mrq" value="_LG">Prix Croissants</option>
                <option id="filter_o" class="filter_all mrq" value="_AOC">Prix décroissants</option>
                <option id="filter_o" class="filter_all mrq" value="_LENOV">Meilleures ventes</option>

            </select>
        </div>


</div>
</div>

<div class=container>
    <div id="barreprix">
        <p id="coprix"><strong>Connectez-vous pour voir les prix</strong></p>


    </div>

</div>



{{-- fffffffffffffffffffffffffffff --}}
@php


$re = explode('_', last(request()->segments()));

@endphp
<div id="accordion12" style="background-color: #D6D1C1 ">
    <div class="card" style="background-color: #D6D1C1 ">
      <div class="card-header" id="headingTwelve">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed " data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
         Filtre
          </button>
        </h5>
      </div>

      <div id="collapseTwelve" class="collapse " aria-labelledby="headingTwelve" data-parent="#accordion12">
        <div class="card-body">
            <div   id="filter"  >


                    {{-- <form style="" action="{{ route('filter') }}" method="POST" class="form-inline ml-auto"
                        onsubmit="traitForm(a)" id="filter"> --}}
                        <div style=" background-color: #D6D1C1; border-radius: 20px;" class="list-group"   >
                            @php


                                $re = explode('_', last(request()->segments()));

                            @endphp

                                <div  id="accordion12" style="  display:flex; flex-direction:column;"  >
                                    <ul  style="background-color: #D6D1C1;  border-radius: 20px;"  id="datalist2">
                                    {{-- Titre --}}



                                @if(count($marques)>1)
                                   <li >  <div id="rond1"   class="card my-0" >
                                        <div  class="card-header"  id="heading">
                                          <h5  class="mb-0">
                                            <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapse">
                                              Marque <i class="fas fa-sort-down ml-2"></i>
                                            </button>
                                          </h5>
                                        </div>
                                        <div id="collapse" class="collapse " aria-labelledby="heading" data-parent="#accordion">
                                          <div class="card-body d-flex flex-column col-12 " >
                                            @foreach ($marques as $marque)
                                            @if($marque->marque!="")
                                              <label>
                                                <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                                {{$marque->marque}}
                                            </label>
                                            @endif
                                            @endforeach
                                          </div>
                                        </div>
                                      </div></li>
                                      @endif


                                    {{-- 1 --}}
                                    @if(count($memoire)>1)
                                    <li >  <div id="rond1"   class="card my-0" >
                                         <div  class="card-header"  id="headingOne">
                                           <h5  class="mb-0">
                                             <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                               Mémoire <i class="fas fa-sort-down ml-2"></i>
                                             </button>
                                           </h5>
                                         </div>
                                         <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                                           <div class="card-body d-flex flex-column  col-12 " >
                                             @foreach ($memoire as $mem)
                                             @if($mem->memoire!="")
                                               <label>
                                                 <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                                 {{$mem->memoire}}
                                             </label>
                                             @endif
                                             @endforeach
                                           </div>
                                         </div>
                                       </div></li>
                                       @endif
                                    {{-- 2 --}}

                                    @if(count($taille_ecran)>1)
                                    <li >  <div id="rond1"   class="card my-0" >
                                         <div  class="card-header"  id="headingTwo">
                                           <h5  class="mb-0">
                                             <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                               Taille écran <i class="fas fa-sort-down ml-2"></i>
                                             </button>
                                           </h5>
                                         </div>
                                         <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
                                           <div class="card-body d-flex flex-column  col-12" >
                                            @foreach ($taille_ecran as $ecran)
                                            @if($ecran->taille_ecran!="")
                                               <label>
                                                 <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                                 {{$ecran->taille_ecran}}"
                                             </label>
                                             @endif
                                             @endforeach
                                           </div>
                                         </div>
                                       </div></li>
                                       @endif
                                    {{-- 3 --}}
                                    @if(count($ssd)>1)
                                    <li >  <div id="rond1"   class="card my-0" >
                                         <div  class="card-header"  id="headingThree">
                                           <h5  class="mb-0">
                                             <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                               SSD <i class="fas fa-sort-down ml-2"></i>
                                             </button>
                                           </h5>
                                         </div>
                                         <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordion">
                                           <div class="  d-flex flex-column col-12 " >
                                            @foreach ($ssd as $ss)
                                            @if($ss->ssd!="")
                                               <label>
                                                 <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                                 {{$ss->ssd}}
                                            </label>
                                            @endif
                                             @endforeach
                                           </div>
                                         </div>
                                       </div></li>
                                       @endif
                                  {{-- 4 --}}
                                  @if(count($os)>1)
                                    <li >  <div id="rond1"   class="card my-0" >
                                         <div  class="card-header" style="background-color: transparent"  id="headingFour">
                                           <h5  class="mb-0">
                                             <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFive">
                                               OS <i class="fas fa-sort-down ml-2"></i>
                                             </button>
                                           </h5>
                                         </div>
                                         <div id="collapseFour" class="collapse " aria-labelledby="headingFour" data-parent="#accordion">
                                           <div class="card-body d-flex flex-column  col-12 " >
                                            @foreach ($os as $syst)
                                            @if($syst->os!="")
                                               <label>
                                                 <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                                 {{$syst->os}}
                                             </label>
                                             @endif
                                             @endforeach
                                           </div>
                                         </div>
                                       </div></li>
                                       @endif
                                 {{-- 5 --}}
                                 @if(count($chipset)>1)
                                 <li >  <div id="rond1"   class="card my-0" >
                                      <div  class="card-header"  id="headingFive">
                                        <h5  class="mb-0">
                                          <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            SSD <i class="fas fa-sort-down ml-2"></i>
                                          </button>
                                        </h5>
                                      </div>
                                      <div id="collapseFive" class="collapse " aria-labelledby="headingFive" data-parent="#accordion">
                                        <div class="card-body d-flex flex-column  col-12 " >
                                            @foreach ($chipset as $chip)
                                            @if($chip->chipset!="")
                                            <label>
                                              <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                              {{$chip->chipset}}
                                          </label>
                                          @endif
                                          @endforeach
                                        </div>
                                      </div>
                                    </div></li>
                                    @endif
                                  {{-- 6 --}}
                                  @if(count($fam_proc)>1)
                                  <li >  <div id="rond1"   class="card my-0" >
                                       <div  class="card-header"  id="headingSix">
                                         <h5  class="mb-0">
                                           <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                             Famille Processeur <i class="fas fa-sort-down ml-2"></i>
                                           </button>
                                         </h5>
                                       </div>
                                       <div id="collapseSix" class="collapse " aria-labelledby="headingSix" data-parent="#accordion">
                                         <div class="card-body d-flex flex-column  col-12 " >
                                            @foreach ($fam_proc as $fam)
                                            @if($fam->fam_proc!="")
                                             <label>
                                               <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                               {{$fam->fam_proc}}
                                           </label>
                                           @endif
                                           @endforeach
                                         </div>
                                       </div>
                                     </div></li>
                                     @endif
                                  {{-- 7 --}}
                                  @if(count($sock_proc)>1)
                                  <li >  <div id="rond1"   class="card my-0" >
                                       <div  class="card-header"  id="headingSeven">
                                         <h5  class="mb-0">
                                           <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                             Socket processeur <i class="fas fa-sort-down ml-2"></i>
                                           </button>
                                         </h5>
                                       </div>
                                       <div id="collapseSeven" class="collapse " aria-labelledby="headingSeven" data-parent="#accordion">
                                         <div class="card-body d-flex flex-column  col-12 " >
                                            @foreach ($sock_proc as $sock)
                                            @if($sock->sock_proc!="")
                                             <label>
                                               <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                               {{$sock->sock_proc}}
                                           </label>
                                           @endif
                                           @endforeach
                                         </div>
                                       </div>
                                     </div></li>
                                     @endif
                                     {{-- 8 --}}
                                     @if(count($gpu)>1)
                                     <li >  <div id="rond1"   class="card my-0" >
                                          <div  class="card-header"  id="headingEight">
                                            <h5  class="mb-0">
                                              <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                GPU <i class="fas fa-sort-down ml-2"></i>
                                              </button>
                                            </h5>
                                          </div>
                                          <div id="collapseEight" class="collapse " aria-labelledby="headingEight" data-parent="#accordion">
                                            <div class="card-body d-flex flex-column  col-12" >
                                                @foreach ($gpu as $gp)
                                                @if($gp->gpu!="")
                                                <label>
                                                  <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                                  {{$gp->gpu}}
                                              </label>
                                              @endif
                                              @endforeach
                                            </div>
                                          </div>
                                        </div></li>
                                        @endif
                                        {{-- 9 --}}
                                        @if(count($puissance)>1)
                                        <li >  <div id="rond1"   class="card my-0" >
                                             <div  class="card-header"  id="headingNine">
                                               <h5  class="mb-0">
                                                 <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                   Puissance <i class="fas fa-sort-down ml-2"></i>
                                                 </button>
                                               </h5>
                                             </div>
                                             <div id="collapseNine" class="collapse " aria-labelledby="headingNine" data-parent="#accordion">
                                               <div class="card-body d-flex flex-column  col-12 " >
                                                @foreach ($puissance as $pow)
                                                @if($pow->puissance!="")
                                                   <label>
                                                     <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                                     {{$pow->puissance}}
                                                 </label>
                                                 @endif
                                                 @endforeach
                                               </div>
                                             </div>
                                           </div></li>
                                           @endif
                                           {{-- 10 --}}
                                           @if(count($frequ_mem)>1)
                                           <li >  <div id="rond1"   class="card my-0" >
                                                <div  class="card-header"  id="headingTen">
                                                  <h5  class="mb-0">
                                                    <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                        Fréquence mémoire <i class="fas fa-sort-down ml-2"></i>
                                                    </button>
                                                  </h5>
                                                </div>
                                                <div id="collapseTen" class="collapse " aria-labelledby="headingTen" data-parent="#accordion">
                                                  <div class="card-body d-flex flex-column  col-12 " >
                                                    @foreach ($frequ_mem as $freq)
                                                    @if($freq->frequ_memoire!="")
                                                      <label>
                                                        <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                                        {{$freq->frequ_memoire}}
                                                    </label>
                                                    @endif
                                                    @endforeach
                                                  </div>
                                                </div>
                                              </div></li>
                                              @endif
                                              {{-- 11 --}}
                                              @if(count($nb_barrette)>1)
                                              <li >  <div id="rond1"   class="card my-0" >
                                                   <div  class="card-header"  id="headingEleven">
                                                     <h5  class="mb-0">
                                                       <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                                           Nombre de barrette <i class="fas fa-sort-down ml-2"></i>
                                                       </button>
                                                     </h5>
                                                   </div>
                                                   <div id="collapseEleven" class="collapse " aria-labelledby="headingEleven" data-parent="#accordion">
                                                     <div class="card-body d-flex flex-column  col-12 " >
                                                        @foreach ($nb_barrette as $barrette)
                                                        @if($barrette->nb_barrette!="")
                                                         <label>
                                                           <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                                           {{$barrette->nb_barrette}}
                                                       </label>
                                                       @endif
                                                       @endforeach
                                                     </div>
                                                   </div>
                                                 </div></li>
                                                 @endif
                                                 {{-- 12 --}}

                                </ul>
                                <div class="Box">
                                <button style="margin-bottom: 5px;"  id="appliquer" class=" btn  boutton">Appliquer</button>

                                <button id="reinitialiser" onclick='window.location.reload(false)'  class=" btn BouttonReinitialiser">Réinitialiser</button>



                            </div>




            <script>



                            //    LKIJLIKJL

                               $('#moinsinfo2').hide();
                if (0 == $('#datalist2 li:hidden').length) {
                            $('#plusinfo2').hide();
                            $('#moinsinfo2').hide();
                        }





                                $(function () {
                                   $('#plusinfo').click(function () {
                                       $('#datalist2 li:hidden').slice(0, 9).show();
                                       if ($('#datalist2 li').length == $('#datalist2 li:visible').length) {
                                           $('#plusinfo2').hide();
                                           $('#moinsinfo2').show();
                                       }
                                   });
                               });
                               $(function () {
                                   $('#moinsinfo2').click(function () {
                                       $('#datalist2 li:visible ').slice(3, 9).hide();
                                       if ($('#datalist2 li').length !== $('#datalist2 li:visible').length) {
                                           $('#plusinfo2').show();
                                          $('#moinsinfo2').hide();
                                       }
                                  });
                               });






              </script>
                </div>
            </div>

            </div>
            </div>        </div>
      </div>
    </div>


  </div>







{{-- ffffffffffffffffffffffffffffffffffff --}}

<div id="filterdispo" >
    @php
                    $re = explode('/',request()->segment(2));
    @endphp

@if (($re[0] == 'Family'))
    @include('include.filterPHP')
@endif


    <div class="row"  id="row">
        <div id="results" >
            @foreach ($items as $item)
                <div class="   border-bottom  overflow-hidden flex-md-row mb-4  " id="test">
                    <div>
                    <img style="margin-bottom: 8px; width: 80px; height: 60px; "class="img-responsive mr-4"
                    src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}" alt=" "
                    class="bd-placeholder-img"  >
                    @if ($item->RealStock>0)

                        <p>En stock <img style=" width: 15px; height: 15px;"   src="{{asset('asset/img/en stock.svg')}}"></p>
                        <p>


                    @else

                        <p>Pas de stock <img style=" width: 15x; height: 15px;"   src="{{asset('asset/img/plus en stock.svg')}}"></p>
                        <p>

                    @endif
                        </div>
                    <a id="Catégorie" href="{{ route('product.show', $item->Id) }}"> <strong
                            class="d-inline-block mb-2 text-primary">  {{ $item->Caption }}</strong> </a>




                        @if ($item->RealStock>0)
                        <form action="{{ route('cart.store') }}" method="POST" style="">
                            @csrf

                            <button id="boutton_panier" type="submit" id="panier" class="btn  "><img style="width: 20px; height:20px; "   class="" src="{{asset('asset/img/Ajouter au panier.svg')}}"
                                alt="Certification"></button>
                        </form>
                        @endif
                </div>
            @endforeach
            <p id="pagination" class="rounded-circle"> {{ $items->links('pagination::bootstrap-4') }}</p>
        </div>
        <div class="rounded-circle" id="paginat"></div>

    </div>
    <p class="rounded-circle" id="url" style="display: none"> {{ Request::path() }} </p>


</div>
</div>

@endsection


<script>
    function change() // no ';' here
{
    var elem = document.getElementById("myButton1");
    if (elem.value=="Close Curtain") elem.value = "Open Curtain";
    else elem.value = "Close Curtain";
}
    </script>
<script>
    $(document).ready(function() {
    <!-- the :first-child selector is using to select the first h1 child -->
    $(".page-item:first-child").css(
    "background-color", "red");
    });
    </script>

{{-- le scripte js de Searchbar et filter  --}}
@section('extra-js')
@include('include.SearchItem')
{{-- @include('include.filter') --}}
@endsection
