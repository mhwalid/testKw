@extends('layouts.app')


@section('content')

<div class="container-fluid">
    <img id="imgcatégorie"  class="" src="{{asset('asset/img/CM_long.jpg')}}"
    alt="Certification">


</div>



<div class="container-fluid">

<div id="barrefilter">

        <p style="margin-top:15px;"><strong style="margin-right: 10%; font-size: 18px;">44</strong>produits


        <p style="margin-top: 17px;"><input id="checkbox" type="checkbox" class="filter_all ram" value="4">En stock</p>



         <div style=" border:none; background-color:#D6D1C1; display: flex; justify-content: inline;"  class="list-group-item ">
            <p style="margin-top: 5px; margin-right:10px;">Trier par:</p>
            <select name="marque_id" style=" margin-top: 5px; height: 70%; border: none; border-radius: 20px; box-shadow: none; outline: 0;" >
                <option  class=""></option>
                <option class="filter_all mrq" value="_LG">Prix Croissants</option>
                <option class="filter_all mrq" value="_AOC">Prix décroissants</option>
                <option class="filter_all mrq" value="_LENOV">Meilleures ventes</option>

            </select>
        </div>


</div>
</div>

<div class=container>
    <div id="barreprix">
        <p><strong>Connectez-vous pour voir les prix</strong></p>


    </div>

</div>

<div style="display: flex; justify-content: align-items; margin-left: 200px;">
    @php
                    $re = explode('/',request()->segment(2));
    @endphp

@if (($re[0] == 'Family'))
    @include('include.filterPHP')
@endif


    <div class="row"  id="row">
        <div id="results" style="width: 1147px; margin-left: 100px;">
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

                            <button style="background-color: #FFD600; border-radius:20px;     padding-right: 0px;   padding-left: 0px;  padding-top: 0px; padding-bottom: 0px; height: 34px; width: 50px; " type="submit" id="panier" class="btn  "><img style="width: 20px; height:20px; "   class="" src="{{asset('asset/img/Ajouter au panier.svg')}}"
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
