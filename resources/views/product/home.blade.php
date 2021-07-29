@extends('layouts.app')


@section('content')

<div class="container-fluid" id="longueurphotohome">
    <img id="imgcatégorie"  class="w-100" src="{{asset('asset/img/CM_long.jpg')}}" alt="Certification">
    <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Carte Mere</h2>
</div>



<div class="container-fluid">

    <div id="barrefilter" >

        <p id="opfilt" ><strong style="margin-right: 10%; font-size: 18px;">{{$number}}</strong>produits


        <p style="margin-top: 17px;"><input id="checkbox" type="checkbox" class="filter_all ram" value="4">En stock</p>



         <div style=" border:none; background-color: transparent; display: flex; justify-content: inline;"  class="list-group-item ">
            <p style="margin-top: 15px; margin-right:10px;">Trier par:</p>
            <select name="marque_id" style=" margin-top: 15px; height: fit-content; border: none; border-radius: 20px; box-shadow: none; outline: 0;" >
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
<div class="container-fluid">

    <div style=" background-color: #D6D1C1; border-radius: 20px; border: none; padding: 0px;    margin-bottom: 5%; " class="list-group col-12"   >
        <div id="Accordion" style="background-color: #D6D1C1; border-radius: 200px; border: none; ">
            <div class="card" style="background-color: #D6D1C1; border-radius: 200px; border: none; ">
                <div class="card-header" style="background-color: transparent; border: none; padding: 0px; " id="headingTwelve">
                    <h5 class="mb-0">
                     <button style="color: #21201B;     font-family: 'Poppins';   box-shadow: none;" class="btn btn-link collapsed w-100 d-flex" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                    Filtre
                    </button>
                    </h5>

                 </div>

                    <div id="collapseTwelve" class="collapse " aria-labelledby="headingTwelve" data-parent="#Accordion">
                        <div class="card-body">
                            <div   id="filter"  >



                        <div style=" background-color: #D6D1C1; border-radius: 20px;" class="list-group"   >
                            @php


                                $re = explode('_', last(request()->segments()));

                            @endphp

                                <div  id="Accordion" style="  display:flex; flex-direction:column;"  >
                                    <ul  style="background-color: #D6D1C1;  border-radius: 20px; list-style-type: none;"  id="datalist2">
                                    {{-- Titre --}}



                                @if(count($marques)>1)
                                   <li >
                                     <div id="rond1"   class="card my-0" >
                                        <div  class="card-header" style="background-color: transparent; "  id="heading">
                                          <h5  class="mb-0">
                                            <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                              Marque <i class="fas fa-sort-down ml-2"></i>
                                            </button>
                                          </h5>
                                        </div>
                                        <div id="collapse13" class="collapse " aria-labelledby="heading13" data-parent="#accordion">
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
                                         <div  class="card-header" style="background-color: transparent; " id="headingOne1">
                                           <h5  class="mb-0">
                                             <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1">
                                               Mémoire <i class="fas fa-sort-down ml-2"></i>
                                             </button>
                                           </h5>
                                         </div>
                                         <div id="collapseOne1" class="collapse " aria-labelledby="headingOne1" data-parent="#accordion">
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
                                         <div  class="card-header" style="background-color: transparent; " id="headingTwo2">
                                           <h5  class="mb-0">
                                             <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsgTwo2" aria-expanded="false" aria-controls="collapsgTwo2">
                                               Taille écran <i class="fas fa-sort-down ml-2"></i>
                                             </button>
                                           </h5>
                                         </div>
                                         <div id="collapsgTwo2" class="collapse " aria-labelledby="headingTwo2" data-parent="#accordion">
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
                                         <div  class="card-header" style="background-color: transparent; " id="headingThree3">
                                           <h5  class="mb-0">
                                             <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                               SSD <i class="fas fa-sort-down ml-2"></i>
                                             </button>
                                           </h5>
                                         </div>
                                         <div id="collapseThree3" class="collapse " aria-labelledby="headingThree3" data-parent="#accordion">
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
                                         <div  class="card-header" style="background-color: transparent"  id="headingFour4">
                                           <h5  class="mb-0">
                                             <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour4" aria-expanded="false" aria-controls="collapseFive5">
                                               OS <i class="fas fa-sort-down ml-2"></i>
                                             </button>
                                           </h5>
                                         </div>
                                         <div id="collapseFour4" class="collapse " aria-labelledby="headingFour4" data-parent="#accordion">
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
                                      <div  class="card-header" style="background-color: transparent; " id="headingFive5">
                                        <h5  class="mb-0">
                                          <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive5" aria-expanded="false" aria-controls="collapseFive5">
                                            SSD <i class="fas fa-sort-down ml-2"></i>
                                          </button>
                                        </h5>
                                      </div>
                                      <div id="collapseFive5" class="collapse " aria-labelledby="headingFive5" data-parent="#accordion">
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
                                       <div  class="card-header" style="background-color: transparent; " id="headingSix6">
                                         <h5  class="mb-0">
                                           <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix6" aria-expanded="false" aria-controls="collapseSix6">
                                             Famille Processeur <i class="fas fa-sort-down ml-2"></i>
                                           </button>
                                         </h5>
                                       </div>
                                       <div id="collapseSix6" class="collapse " aria-labelledby="headingSix6" data-parent="#accordion">
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
                                       <div  class="card-header" style="background-color: transparent; " id="headingSeven7">
                                         <h5  class="mb-0">
                                           <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven7" aria-expanded="false" aria-controls="collapseSeven7">
                                             Socket processeur <i class="fas fa-sort-down ml-2"></i>
                                           </button>
                                         </h5>
                                       </div>
                                       <div id="collapseSeven7" class="collapse " aria-labelledby="headingSeven7" data-parent="#accordion">
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
                                          <div  class="card-header" style="background-color: transparent; "  id="headingEight8">
                                            <h5  class="mb-0">
                                              <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight8" aria-expanded="false" aria-controls="collapseEight8">
                                                GPU <i class="fas fa-sort-down ml-2"></i>
                                              </button>
                                            </h5>
                                          </div>
                                          <div id="collapseEight8" class="collapse " aria-labelledby="headingEight8" data-parent="#accordion">
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
                                             <div  class="card-header" style="background-color: transparent; "  id="headingNine9">
                                               <h5  class="mb-0">
                                                 <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine9" aria-expanded="false" aria-controls="collapseNine9">
                                                   Puissance <i class="fas fa-sort-down ml-2"></i>
                                                 </button>
                                               </h5>
                                             </div>
                                             <div id="collapseNine9" class="collapse " aria-labelledby="headingNine9" data-parent="#accordion">
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
                                                <div  class="card-header" style="background-color: transparent; "  id="headingTen10">
                                                  <h5  class="mb-0">
                                                    <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen10" aria-expanded="false" aria-controls="collapseTen10">
                                                        Fréquence mémoire <i class="fas fa-sort-down ml-2"></i>
                                                    </button>
                                                  </h5>
                                                </div>
                                                <div id="collapseTen10" class="collapse " aria-labelledby="headingTen10" data-parent="#accordion">
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
                                                   <div  class="card-header" style="background-color: transparent; "  id="headingEleven11">
                                                     <h5  class="mb-0">
                                                       <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEleven11" aria-expanded="false" aria-controls="collapseEleven11">
                                                           Nombre de barrette <i class="fas fa-sort-down ml-2"></i>
                                                       </button>
                                                     </h5>
                                                   </div>
                                                   <div id="collapseEleven11" class="collapse " aria-labelledby="headingEleven11" data-parent="#accordion">
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
                                       $('#datalist2 li:visible ').slice(3,11).hide();
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
                </div>
                    </div>
                        </div>
                                </div>
                                    </div>
                                        </div>



<div id="filterbarreinvisible" class="mb-3" >

        <p style="     display: flex; justify-content: center; flex-direction: row; align-items: center;"  ><strong style="margin-right: 5%; font-size: 18px;">{{$number}}</strong>produits</p>


    <div id="tttt">
        <p style="   display: flex; justify-content: center; flex-direction: row; align-items: center;     width: max-content;   font-size: 69%; background-color: #FFD600; border-radius: 20px; padding-left: 1%; padding-right: 1%;"><strong>Connectez-vous pour voir les prix</strong></p>
    </div>

        <div style="  display: flex; justify-content: center; flex-direction: row; align-items: center;">
            <select name="marque_id" style="     width: fit-content;  height: fit-content;  border: none; border-radius: 20px; box-shadow: none; outline: 0;" >
            <option  class="">Trier par:</option>
            <option id="filter_o" class="filter_all mrq" value="_LG">Prix Croissants</option>
            <option id="filter_o" class="filter_all mrq" value="_AOC">Prix décroissants</option>
            <option id="filter_o" class="filter_all mrq" value="_LENOV">Meilleures ventes</option>
            </select>
        </div>



    <div id="tttt">
        <p style="  margin-bottom: 0%; width: max-content; display: flex; justify-content: center; flex-direction: row; align-items: center;" ><input id="checkbox" type="checkbox" class="filter_all ram" value="4">En stock</p>
    </div>


</div>








{{-- ffffffffffffffffffffffffffffffffffff --}}
<div class="container">
<div id="filterdispo" >
    @php
                    $re = explode('/',request()->segment(2));
    @endphp

@if (($re[0] == 'Family'))
    @include('include.filterPHP')
@endif

        <div id="cach">
             <div class="row"  id="row">
                <div id="results" >
                     @foreach ($items as $item)
                        <div style="column-gap: 25px;" class="   border-bottom  overflow-hidden flex-md-row mb-4  " id="test">
                            <div>
                                <img style="margin-bottom: 8px; width: 80px; height: 60px; "class="img-responsive mr-4" src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}" alt=" " class="bd-placeholder-img"  >
                                @if ($item->RealStock>0)

                                    <p>En stock <img style=" width: 15px; height: 15px;"   src="{{asset('asset/img/en stock.svg')}}"></p>
                                    <p>


                                @else

                                    <p style=" width: max-content;">Pas de stock <img style=" width: 15x; height: 15px;"   src="{{asset('asset/img/plus en stock.svg')}}"></p>
                                    <p>

                                @endif
                            </div>
                            <a class="col-lg-6 col-md-4 col-xl-8" id="Catégorie2" href="{{ route('product.show', $item->Id) }}"> <p style="color: #21201B;" class="d-inline-block mb-2 ">  {{ $item->Caption }}</p> </a>

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
</div>


<div id="cach2">
<div class="row"  id="row">
    <div id="results" >
        @foreach ($items as $item)
        <div class="   border-bottom   " >
            <div style="justify-content: space-evenly; align-content: center;" class="   overflow-hidden  d-flex mt-2 " id="test">
                    <div>
                    <img style="margin-bottom: 8px; width: 80px; height: 60px; "class="img-responsive mr-4" src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}" alt=" " class="bd-placeholder-img"  >
                    @if ($item->RealStock>0)

                        <p>En stock <img style=" width: 15px; height: 15px;"   src="{{asset('asset/img/en stock.svg')}}"></p>



                    @else

                        <p>Pas de stock <img style=" width: 15x; height: 15px;"   src="{{asset('asset/img/plus en stock.svg')}}"></p>


                    @endif
                    </div>




                        @if ($item->RealStock>0)
                        <form action="{{ route('cart.store') }}" method="POST" style="">
                            @csrf

                            <button id="boutton_panier" type="submit" id="panier" class="btn mt-4  "><img style="width: 20px; height:20px; "   class="" src="{{asset('asset/img/Ajouter au panier.svg')}}"
                                alt="Certification"></button>
                        </form>
                        @endif
            </div>
                    <a id="Catégorie2" href="{{ route('product.show', $item->Id) }}"> <p style="color: #21201B"
                        class="d-inline-block mb-4">  {{ $item->Caption }}</p> </a>
        </div>


        @endforeach
        <p id="pagination" class="rounded-circle"> {{ $items->links('pagination::bootstrap-4') }}</p>
    </div>
    <div class="rounded-circle" id="paginat"></div>

</div>
<p class="rounded-circle" id="url" style="display: none"> {{ Request::path() }} </p>


        </div>




@endsection

<script>



    function change() // no ';' here
{
    var elem = document.getElementById("myButton1");
    if (elem.value=="Close Curtain") elem.value = "Open Curtain";
    else elem.value = "Close Curtain";
}

    $(document).ready(function() {
    $(".page-item:first-child").css(
    "background-color", "red");
    });
    </script>

{{-- le scripte js de Searchbar et filter  --}}
@section('extra-js')
@include('include.SearchItem')
{{-- @include('include.filter') --}}
@endsection
