@extends('layouts.app')

@section('content')
    
@include('include.filterPHP')
    <div class="row mb-2 mt-4">

        <div id="results" style="width: 1147px;">
            @foreach ($items as $item)
                <div class=" p-4 d-flex border rounded overflow-hidden flex-md-row mb-4 shadow-sm  " id="test">
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

@section('sidebar')
    @parent
    <nav id="Nav" class="navbar navbar-expand-lg navbar-dark indigo mb-4">
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="col-4pt-1">
            <a href="{{ route('cart.index') }}"> Panier <span
                    class="badge badge-light badge-pill">{{ Cart::content()->count() }} </span></a>
        </div>
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form action="{{ route('search') }}" method="POST" class="form-inline ml-auto" onsubmit="traitForm(a)"
                id="SearchFrom">
                @csrf
                <div class="md-form my-0">
                    <input class="form-control" type="text" placeholder="Search" id="search" name="q"
                        value="{{ request()->q ?? '' }}">
                </div>
                <button class="btn btn-outline-white btn-md my-0 ml-sm-2" onclick='showOld(event)'
                    type="text">Search</button>
            </form>



        </div>
    </nav>
    @include('include.navbar')

@endsection


{{-- le scripte js de Searchbar et filter  --}}
@section('extra-js')
@include('include.SearchItem')
@include('include.filter')
@endsection
