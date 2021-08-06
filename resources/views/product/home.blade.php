@extends('layouts.app')

@section('content')
@php
  // $re = explode('_', last(request()->segments()));
  $re = explode('/',request()->segment(2));
  $family = explode('/',request()->segment(3));
  $menu = explode('/',last(request()->segments()));
  $res = explode('/', last(request()->segments()));

@endphp
{{-- {{dd($checked)}} --}}
<div class="container-fluid" id="longueurphotohome">
  @if ($family[0] == "")
    <img id="imgcatégorie"  class="w-100" src="{{asset('asset/banner/boutique.png')}}" alt="Certification">
    <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Boutique</h2>
  @else
    @if ($family[0] == "ACC")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Accessoires</h2>
    @elseif ($family[0] == "AIO")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">All In One</h2>
    @elseif ($family[0] == "ALARM")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Pièces Alarmes</h2>
    @elseif ($family[0] == "ALIM")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Alimentation Interne</h2>
    @elseif ($family[0] == "BARBO")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Barebones</h2>
    @elseif ($family[0] == "BATT")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Batteries</h2>
    @elseif ($family[0] == "BOIT")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Boitiers</h2>
    @elseif ($family[0] == "CAB")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Câbles</h2>
    @elseif ($family[0] == "CG")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Cartes Graphiques</h2>
    @elseif ($family[0] == "CM")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Carte Mere</h2>
    @elseif ($family[0] == "DALLE")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Dalles</h2>
    @elseif ($family[0] == "HDD")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Disques Durs Interne</h2>
    @elseif ($family[0] == "HP")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Haut-parleurs</h2>
    @elseif ($family[0] == "IMP")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Imprimantes</h2>
    @elseif ($family[0] == "LEC")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Optiques</h2>
    @elseif ($family[0] == "LOG")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Logiciels</h2>
    @elseif ($family[0] == "MEM")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Mémoires</h2>
    @elseif ($family[0] == "MK")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Clavier-Souris</h2>
    @elseif ($family[0] == "MON")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Moniteurs</h2>
    @elseif ($family[0] == "ONDU")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Onduleurs</h2>
    @elseif ($family[0] == "PORT")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Portables</h2>
    @elseif ($family[0] == "PROC")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Processeurs</h2>
    @elseif ($family[0] == "RES")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Réseaux</h2>
    @elseif ($family[0] == "SDCARD")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Cartes SD</h2>
    @elseif ($family[0] == "SSD")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Disques SSD</h2>
    @elseif ($family[0] == "TAB")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Tablettes</h2>
    @elseif ($family[0] == "TEL")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Pieces téléphones</h2>
    @elseif ($family[0] == "USBKEY")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Clés usb</h2>
    @elseif ($family[0] == "VIDEO")
        <h2 id="dffdf" style="font-size: 20px; margin-top: 25%;" class="news">Pièces Vidéos</h2>
    @endif
    <img id="imgcatégorie"  class="w-100" src="{{asset('asset/banner/'.$family[0].'.png')}}" alt="Certification">
  @endif
</div>

{{-- trie alix --}}
<div class="container-fluid">
  @if ($re[0] == "Family")
      <form  id="form_tri" action="{{route('itembyCaption',$family[0]) }} " method="get" style="border: none">
          <div id="barrefilter">
            <p style="margin-top:15px;"><strong style="margin-right: 10%; font-size: 18px;">{{$items->total()}}</strong>produits

              <p style="margin-top: 17px"><input id="enStock" type="checkbox" class="filter_all ram"  name="stock" @if (isset($_GET["stock"])) checked @endif value="enStock"> En stock</p>

              <div style=" border:none; background-color:transparent; display: flex; justify-content: inline;"  class="list-group-item ">
                  <p style="margin-top: 15px; margin-right:10px;">Trier par:</p>
                  <select id="trie" name="trie" id="trie" style=" margin-top: 15px; height: fit-content; border: none; border-radius: 20px; box-shadow: none; outline: 0;" >
                      <option @if (!isset($_GET["trie"]) || $_GET["trie"] == "noTrie") selected @endif class="" value="noTrie"></option>
                      <option @if (isset($_GET["trie"]) && $_GET["trie"] == "PrixCroissant") selected @endif class="filter_all mrq" value="PrixCroissant">Prix Croissants</option>
                      <option @if (isset($_GET["trie"]) && $_GET["trie"] == "PrixDecroissant") selected @endif class="filter_all mrq" value="PrixDecroissant">Prix décroissants</option>
                      <option @if (isset($_GET["trie"]) && $_GET["trie"] == "meilleurVente") selected @endif class="filter_all mrq" value="meilleurVente">Meilleures ventes</option>
                  </select>
              </div>
          </div>
      </form>
  @else
      <form  id="form_tri" action="{{route('product.index') }} " method="get" style="border: none">
          <div id="barrefilter">
              <p style="margin-top:15px;"><strong style="margin-right: 10%; font-size: 18px;">{{$items->total()}}</strong>produits
              <p style="margin-top: 17px"><input id="enStock" type="checkbox" class="filter_all ram" name="stock" @if (isset($_GET["stock"])) checked @endif value="enStock"> En stock</p>
              <div style=" border:none; background-color:transparent; display: flex; justify-content: inline;"  class="list-group-item ">
                  <p style="margin-top: 15px; margin-right:10px;">Trier par:</p>
                  <select id="trie" name="trie" id="trie" style=" margin-top: 15px; height:fit-content ; border: none; border-radius: 20px; box-shadow: none; outline: 0;" >
                      <option @if (!isset($_GET["trie"]) || $_GET["trie"] == "noTrie") selected @endif class="" value="noTrie"></option>
                      <option @if (isset($_GET["trie"]) && $_GET["trie"] == "PrixCroissant") selected @endif class="filter_all mrq" value="PrixCroissant">Prix Croissants</option>
                      <option @if (isset($_GET["trie"]) && $_GET["trie"] == "PrixDecroissant") selected @endif class="filter_all mrq" value="PrixDecroissant">Prix décroissants</option>
                      <option @if (isset($_GET["trie"]) && $_GET["trie"] == "meilleurVente") selected @endif class="filter_all mrq" value="meilleurVente">Meilleures ventes</option>
                  </select>
              </div>
          </div>
      </form>
  @endif
</div>
{{-- fffffffffffffffffffffffffffff --}}
<input style="color: blue" type="hidden" id="checked" name="checked" value="{{$checked ?? ''}}"> 

@guest
       

<div class="container"> 
  <div id="barreprix">
      <p id="coprix"><strong>Connectez-vous pour voir les prix</strong></p>
  </div>
</div> 
  @endguest

  @if ($re[0] == 'Family')
  <div class="container-fluid">

    <div id="accordion" style=" background-color: #D6D1C1; border-radius: 20px; border: none; padding: 0px;    margin-bottom: 5%; " class="list-group col-12"   >
            <div class="card-header" style="background-color: transparent; border: none; padding: 0px; " id="headingTwelve">
              <h5 class="mb-0">
                <button type="button" style="color: #21201B;     font-family: 'Poppins';   box-shadow: none;" class="btn btn-link collapsed w-100 d-flex" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">Filtre</a>
              </h5>
            </div>
              <div id="collapseTwelve"style="z-index: 1;" class="collapse " aria-labelledby="headingTwelve" data-parent="#Accordion">
                <div class="card-body">
                  <div   id="filter"  >
                    <div style=" background-color: #D6D1C1; border-radius: 20px;" class="list-group">
                      <div  id="Accordion" style="  display:flex; flex-direction:column;"  >
                        <form  id="longfiltermobile" action="{{ route('filter' ,$res[0])  }}" method="POST" class=" mt-0 pt-0" style="z-index: 2">
                          @csrf
                        @include('include.filterPHP')
                        </form>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>

  </div>
  @endif

  




  <form  id="form_tri_mobile" action="{{route('product.index') }} " method="get" style="border: none">
    <div id="filterbarreinvisible">
        <p style="display: flex; justify-content: center; flex-direction: row; align-items: center;"  ><strong style="margin-right: 5%; font-size: 18px;">{{$items->total()}}</strong>produits</p>
        @guest
          <div id="tttt">
            <p style="display: flex; justify-content: center; flex-direction: row; align-items: center;     width: max-content;   font-size: 69%; background-color: #FFD600; border-radius: 20px; padding-left: 1%; padding-right: 1%;"><strong>Connectez-vous pour voir les prix</strong></p>
          </div>
        @endguest
        <div id="tttt">
          <p style="  margin-bottom: 0%; width: max-content; display: flex; justify-content: center; flex-direction: row; align-items: center;"><input id="enStock_mobile" type="checkbox" class="filter_all ram" name="stock" @if (isset($_GET["stock"])) checked @endif value="enStock"> En stock</p>
        </div>
          
        <div style="  display: flex; justify-content: center; flex-direction: row; align-items: center;"  class="list-group-item ">
            <select id="trie_mobile" name="trie" id="trie"  style="width: fit-content;  height: fit-content;  border: none; border-radius: 20px; box-shadow: none; outline: 0;" >
                <option @if (!isset($_GET["trie"]) || $_GET["trie"] == "noTrie") selected @endif class="" value="noTrie">Trier par:</option>
                <option @if (isset($_GET["trie"]) && $_GET["trie"] == "PrixCroissant") selected @endif class="filter_all mrq" value="PrixCroissant">Prix Croissants</option>
                <option @if (isset($_GET["trie"]) && $_GET["trie"] == "PrixDecroissant") selected @endif class="filter_all mrq" value="PrixDecroissant">Prix décroissants</option>
                <option @if (isset($_GET["trie"]) && $_GET["trie"] == "meilleurVente") selected @endif class="filter_all mrq" value="meilleurVente">Meilleures ventes</option>
            </select>
        </div>
    </div>
  </form>

{{-- ffffffffffffffffffffffffffffffffffff --}}


<div class="container">
  <div id="filterdispo" >
 

<div id="divfiltermobileinvisible"  style="width:250px; z-index: 2; ">
  @if (($re[0] == 'Family'))
@if (count($marques)>1 || count($memoire)>1 ||count($taille_ecran)>1 || count($ssd)>1 ||count($os)>1 || count($chipset)>1 ||count($fam_proc)>1 || count($sock_proc)>1 ||count($gpu)>1 || count($puissance)>1 ||count($frequ_mem)>1 || count($nb_barrette)>1 )

  <div style=" background-color: #D6D1C1; border-radius: 20px;" class="list-group"   >
    
    <form  id="longfilter" action="{{ route('filter' ,$res[0])  }}" method="POST" class=" mt-0 pt-0" style="z-index: 2">
      @csrf
        @include('include.filterPHP')
    </form>
    <div class="selected">
      <button   id="plusinfo"  type="button" class=" btn  "><i class="fas fa-plus"></i></button>
      <button  id="moinsinfo" type="button"  class=" btn "><img src="{{asset('asset/img/moins.png')}}" alt="rocket_contact"/></button>
      </div>
       
  </div> 
  @endif
  @endif
</div>
<div class="row"  id="row">
  <div id="results" >
   @foreach ($items as $item)
     <div class="   border-bottom   " id="centr" >
         <div  class="  tg overflow-hidden  d-flex mt-2 " id="test">
                 <div>
               
                 @if (File::exists('asset/item/images/'.$item->Id.'/Cart1.jpg'))
             <img style="margin-bottom: 8px; width: 80px; height: 60px; "class="img-responsive mr-4" src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}" alt=" " class="bd-placeholder-img"  >
           @else
             <img style="margin-bottom: 8px; width: 80px; height: 60px; "class="img-responsive mr-4"
             src="{{asset('asset/img/img-indispo-80x60.jpg')}}" alt=" "
             class="bd-placeholder-img">
           @endif
                 @if ($item->RealStock>0)

                     <p>En stock <img style=" width: 15px; height: 15px;"   src="{{asset('asset/img/en_stock.svg')}}"></p>

                 @else
                     <p>Pas de stock <img style=" width: 15x; height: 15px;"   src="{{asset('asset/img/plus_en_stock.svg')}}"></p>
                 @endif
                 </div>

                 <a class="col-lg-6 col-md-3 col-xl-7 dg" id="Catégorie2"  href="{{ route('product.show', $item->Id) }}"> <p style="color: #21201B;" class="d-inline-block mb-2 ">  {{ $item->Caption }}</p> </a>

                <div>
                       @auth
                      <h5  class="mb-0">{{ number_format($item->SalePriceVatExcluded, 2) }}€</h5>
                      @endauth
                     @if ($item->RealStock>0)
                     <form action="{{ route('cart.store') }}" method="POST" style="">
                         @csrf
                         <input type="hidden" name="item_id" value="{{ $item->Id }}">
                          <input type="hidden" name="price" value={{ $item->SalePriceVatExcluded }}>
                         <input type="hidden" name="quantity" value="1">

                         <button id="boutton_panier" type="submit" id="panier" class="btn mt-4  "><img style="width: 20px; height:20px; "   class="" src="{{asset('asset/img/Ajouter_au_panier.svg')}}"
                             alt="Certification"></button>
                     </form>
                     @endif
               </div>
         </div>
                 <a class="dg2" id="Catégorie2" href="{{ route('product.show', $item->Id) }}"> <p style="color: #21201B"
                     class="d-inline-block mb-4">  {{ $item->Caption }}</p> </a>
     </div>


     @endforeach
          <p id="pagination" class="rounded-circle">
            @if (isset($_GET["trie"]) && isset($_GET["stock"]))
                {{$items->appends(['stock' => $_GET["stock"]])->appends(['trie' => $_GET["trie"]])->links('pagination::bootstrap-4')}}
            @elseif (isset($_GET["trie"]))
                {{$items->appends(['trie' => $_GET["trie"]])->links('pagination::bootstrap-4')}}
            @elseif (isset($_GET["stock"]))
                {{$items->appends(['stock' => $_GET["stock"]])->links('pagination::bootstrap-4')}}
            @else
                {{$items->links('pagination::bootstrap-4')}}
            @endif
        </p>
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

{{-- le scripte js de Searchbar et filter  --}}
@section('extra-js')


<script>
  $('#moinsinfo').hide();


    if($("#checked").val()!==""){
      var result=$("#checked").val().split(';')
        $.each((result), function(key,value ) {
        console.log(value);
          $.each($('input[type=checkbox]'),function(){
            if($(this).val()==value){
               $(this).prop("checked", true);
            }
          });
        });
    }
  
  if ($('.datalist li:hidden').length <5) {
            $('#plusinfo').hide();
            $('#moinsinfo').hide();
        }
  $(function () {
    $('#plusinfo').click(function () {
      
   
        $('.datalist li:hidden').slice(0, 14).show();
        
        if ($('.datalist li').length >=7) {
            $('#plusinfo').hide();
           $('#moinsinfo').show();
        }
    });
  });
  $(function () {
    $('#moinsinfo').click(function () {
        $('.datalist li:visible ').slice(4, 14).hide();
        if ($('.datalist li').length !== $('.datalist li:visible').length) {
            $('#plusinfo').show();
          $('#moinsinfo').hide();
        }
  });
  });
  </script>
<script>

var y = window.matchMedia("(max-width: 600px)")
myFunction(y) // Call listener function at run time
y.addListener(myFunction)

function myFunction(y) {
  if (y.matches) { // If media query matches
    $('#divfiltermobileinvisible').remove();
  }}

    $('#trie').change(function (e) {
        $('#form_tri').submit();

    });

    $('#enStock').change(function (e) {
        $('#form_tri').submit();
    });
    $('#trie_mobile').change(function (e) {
        $('#form_tri_mobile').submit();

    });

    $('#enStock_mobile').change(function (e) {
        $('#form_tri_mobile').submit();
    });
</script>

@include('include.SearchItem')
@endsection
