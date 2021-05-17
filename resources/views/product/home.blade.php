@extends('layouts.app')

@section('content')

@if (count($Arrivages)>0)

<div id="carouselArrivage" class="carousel slide" data-ride="carousel" >
    {{-- indicateur si besoin
    <ol class="carousel-indicators">
        @for ($i = 0; $i < count($Arrivages); $i++)
            <li data-target="#carouselArrivage" data-slide-to="{{ $i }}" class="active"></li>
        @endfor
    </ol> --}}
    <div class="carousel-inner">
        @foreach ($Arrivages as $item)
            @if ($item == $Arrivages[0])
                <div class="carousel-item active" id="testArrivage">
                    <div class=" p-4 d-flex border rounded overflow-hidden flex-md-row mb-4 shadow-sm  " id="testArrivage">
                        <a href="{{ route('product.show', $Arrivages[0]->ItemId) }}"> <strong
                                class="d-inline-block mb-2 text-primary">{{ $Arrivages[0]->Caption }}</strong> </a>
                        <h5 style="position: absolute; margin-left:991px" class="mb-0">
                            {{ number_format($Arrivages[0]->CostPrice, 2) }}
                            €</h5>
                            <img
                            src="{{asset('asset/item/images/'.$Arrivages[0]->ItemId.'/Small1.jpg')}}" alt=" "
                            class="bd-placeholder-img" style="float:right;">
                            @if ($Arrivages[0]->RealStock>0)
                            <form action="{{ route('cart.store') }}" method="POST" style="position: absolute; margin-left:921px">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $Arrivages[0]->ItemId }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-shopping-cart mr-2"></i></button>
                            </form>
                            @endif
                    </div>
                </div>
            @else
                <div class="carousel-item" id="testArrivage">
                    <div class=" p-4 d-flex border rounded overflow-hidden flex-md-row mb-4 shadow-sm  " id="testArrivage">
                        <a href="{{ route('product.show', $item->ItemId) }}"> <strong
                                class="d-inline-block mb-2 text-primary">{{ $item->Caption }}</strong> </a>
                        <h5 style="position: absolute; margin-left:991px" class="mb-0">
                            {{ number_format($item->CostPrice, 2) }}
                            €</h5>
                            <img
                            src="{{asset('asset/item/images/'.$item->ItemId.'/Small1.jpg')}}" alt=" "
                            class="bd-placeholder-img" style="float:right;">
                            @if ($item->RealStock>0)
                            <form action="{{ route('cart.store') }}" method="POST" style="position: absolute; margin-left:921px">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item->ItemId }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-shopping-cart mr-2"></i></button>
                            </form>
                            @endif
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselArrivage" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselArrivage" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

@endif

@include('include.filterPHP')
    <div class="row mb-2 mt-4">

        <div id="results" style="width: 1147px;">
            @foreach ($items as $item)
                <div class=" p-4 d-flex border rounded overflow-hidden flex-md-row mb-4 shadow-sm  " id="test">
                    <img
                        src="{{asset('asset/item/images/'.$item->Id.'/Small1.jpg')}}" alt=" "
                        class="bd-placeholder-img" style="float:right;">
                    <a href="{{ route('product.show', $item->Id) }}"> <strong
                            class="d-inline-block mb-2 text-primary">{{ $item->Caption }}</strong> </a>
                    <h5 style="position: absolute; margin-left:991px" class="mb-0">
                        {{ number_format($item->CostPrice, 2) }}
                        €</h5>
                        @if ($item->RealStock>0)
                        <form action="{{ route('cart.store') }}" method="POST" style="position: absolute; margin-left:921px">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->Id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-shopping-cart mr-2"></i></button>
                        </form>
                        @endif
                </div>
            @endforeach
            <p> {{ $items->links('pagination::bootstrap-4') }}</p>
        </div>
        <div id="paginat"></div>

    </div>
    <p id="url" style="display: none"> {{ Request::path() }} </p>

@endsection

    @include('include.navbar')
    @include('include.navbarSlide')

{{-- le scripte js de Searchbar et filter  --}}
@section('extra-js')
@include('include.SearchItem')
@include('include.filter')
@include('include.footer')
@endsection
