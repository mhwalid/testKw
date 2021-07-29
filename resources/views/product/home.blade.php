@extends('layouts.app')

@section('content')
@php
    $re = explode('/',request()->segment(2));
    $family = explode('/',request()->segment(3));
    $menu = explode('/',last(request()->segments()));
@endphp

<div class="container-fluid">
  <img id="imgcatégorie"  class="" src="{{asset('asset/menu/'.$menu[0].'.png')}}" alt="Certification">
</div>

<div class="container-fluid">
    @if ($re[0] == "Family")
        <form  id="form_tri" action="{{route('itembyCaption',$family[0]) }} " method="get" style="border: none">
            <div id="barrefilter">
              <p style="margin-top:15px;"><strong style="margin-right: 10%; font-size: 18px;">{{$items->total()}}</strong>produits

                <p style="margin-top: 17px"><input id="enStock" type="checkbox" class="filter_all ram"  name="stock" @if (isset($_GET["stock"])) checked @endif value="enStock"> En stock</p>

                <div style=" border:none; background-color:#D6D1C1; display: flex; justify-content: inline;"  class="list-group-item ">
                    <p style="margin-top: 5px; margin-right:10px;">Trier par:</p>
                    <select id="trie" name="trie" id="trie" style=" margin-top: 5px; height: 70%; border: none; border-radius: 20px; box-shadow: none; outline: 0;" >
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
                <div style=" border:none; background-color:#D6D1C1; display: flex; justify-content: inline;"  class="list-group-item ">
                    <p style="margin-top: 5px; margin-right:10px;">Trier par:</p>
                    <select id="trie" name="trie" id="trie" style=" margin-top: 5px; height: 70%; border: none; border-radius: 20px; box-shadow: none; outline: 0;" >
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

@guest
    <div class=container>
        <div id="barreprix">
            <p><strong>Connectez-vous pour voir les prix</strong></p>
        </div>
    </div>
@endguest

<div style="display: flex; justify-content: align-items; margin-left: 200px;">
  <div  style="width: 250px;   min-height:2000px; ">
        <div style=" background-color: #D6D1C1; border-radius: 20px;" class="list-group"   >
            {{-- {{$checked ?? ''}} --}}
    @if (($re[0] == 'Family'))
        @include('include.filterPHP')
    @endif
        </div> 
      </div>

    <div class="row"  id="row">
      <div id="results" style="width: 1147px; margin-left: 100px;">
        @foreach ($items as $item)
            <div class="   border-bottom  overflow-hidden flex-md-row mb-4  " id="test">
                <div>
                    @if (File::exists('asset/item/images/'.$item->Id.'/Cart1.jpg'))
                <img style="margin-bottom: 8px; width: 80px; height: 60px; "class="img-responsive mr-4"
                src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}" alt=" "
                class="bd-placeholder-img"  >
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
                <a id="Catégorie" href="{{ route('product.show', $item->Id) }}"><strong class="d-inline-block mb-2 text-primary">  {{ $item->Caption }}</strong> </a>
                    @auth <h5 style="position: absolute; margin-left:991px" class="mb-0">
                        {{ number_format($item->CostPrice, 2) }}
                        €</h5> @endauth
                        @if ($item->RealStock>0)
                        <form action="{{ route('cart.store') }}" method="POST" >
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->Id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button style="background-color: #FFD600; border-radius:20px;     padding-right: 0px;   padding-left: 0px;  padding-top: 0px; padding-bottom: 0px; height: 34px; width: 50px; " type="submit" id="panier" class="btn">
                                <img style="width: 20px; height:20px; "   class="" src="{{asset('asset/img/Ajouter_au_panier.svg')}}" alt="Certification"></button>
                        </form>
                        @else
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
    // <!-- the :first-child selector is using to select the first h1 child -->
    $(".page-item:first-child").css(
    "background-color", "red");
    });
    </script>

{{-- le scripte js de Searchbar et filter  --}}
@section('extra-js')

<script>

    $('#trie').change(function (e) {
        $('#form_tri').submit();

    });

    $('#enStock').change(function (e) {
        $('#form_tri').submit();
    });
</script>

@include('include.SearchItem')
{{-- @include('include.filter') --}}
@endsection
