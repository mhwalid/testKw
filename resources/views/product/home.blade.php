@extends('layouts.app')

@section('content')

@include('include.filterPHP')
    <div class="row mb-2 mt-4">

        <div id="results" style="width: 1147px;">
            @foreach ($items as $item)
                <div class=" p-4 d-flex border rounded overflow-hidden flex-md-row mb-4 shadow-sm  " id="test">
                    <img class="img-responsive mr-4" 
                    src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}" alt=" "
                    class="bd-placeholder-img" style="width: 80px ;heigth:60px" >
                    <a href="{{ route('product.show', $item->Id) }}"> <strong
                            class="d-inline-block mb-2 text-primary">  {{ $item->Caption }}</strong> </a>
                   
                            @guest  <em class=" ml-4">Connectez-vous pour voir les prix !</em>    @else    <h5 style="position: absolute; margin-left:991px" class="mb-0">
                        {{ number_format($item->CostPrice, 2) }}
                        €</h5> @endguest
                        
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
