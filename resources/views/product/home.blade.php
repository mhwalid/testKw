@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-2">
            <form style="" action="{{ route('filter') }}" method="POST" class="form-inline ml-auto"
                onsubmit="traitForm(a)" id="filter">
                <div class="list-group">
                    @php
                        
                        $re = explode('_', last(request()->segments()));
                        
                    @endphp

                    @if (($re[0] == 'PORT' || $re[0] == 'MON') && !isset($re[1]))
                        <h3>marque</h3>
                        <div class="list-group-item checkbox">
                            <select>
                                <option selected class="" value="_ASUS"></option>
                                @if ($re[0] == 'MON')
                                    <option class="filter_all mrq" value="_LG">LG</option>
                                    <option class="filter_all mrq" value="_AOC">AOC</option>
                                @endif
                                @if ($re[0] == 'PORT')
                                    <option class="filter_all mrq" value="_LENOV">LENOVO</option>
                                @endif
                                <option class="filter_all mrq" value="_ASUS">Asus</option>
                                <option class="filter_all mrq" value="_MSI">Msi</option>
                            </select>
                        </div>
                    @endif


                    @if ($re[0] == 'PORT')
                        <h3>Disque</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                SSD
                                <input type="checkbox" class="filter_all disque" value="SSD">
                            </label>
                        </div>
                        <h3>Processeur</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                I9
                                <input type="checkbox" class="filter_all proc" value="9">
                            </label>
                            <label>
                                I7
                                <input type="checkbox" class="filter_all proc" value="7">
                            </label>
                            <label>
                                i5
                                <input type="checkbox" class="filter_all proc" value="5">
                            </label>
                            <label>
                                i3
                                <input type="checkbox" class="filter_all proc" value="3">
                            </label>
                        </div>
                        <h3>RAM</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                4 Go
                                <input type="checkbox" class="filter_all ram" value="4">
                            </label>
                            <label>
                                8 Go
                                <input type="checkbox" class="filter_all ram" value="8">
                            </label>
                            <label>
                                16 Go
                                <input type="checkbox" class="filter_all ram" value="16">
                            </label>
                        </div>
                        <h3>Stockage</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                256 Go
                                <input type="checkbox" class="filter_all Stockage" value="256">
                            </label>
                            <label>
                                500 Go
                                <input type="checkbox" class="filter_all Stockage" value="500">
                            </label>
                            <label>
                                512 Go
                                <input type="checkbox" class="filter_all Stockage" value="512">
                            </label>
                            <label>
                                1T
                                <input type="checkbox" class="filter_all Stockage" value="1">
                            </label>
                        </div>
                    @endif

                    @if ($re[0] == 'MON')
                        <h3>taille d'écran</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                21"
                                <input type="checkbox" class="filter_all size" value="21">
                            </label>
                            <label>
                                22"
                                <input type="checkbox" class="filter_all size" value="22">
                            </label>
                            <label>
                                23
                                <input type="checkbox" class="filter_all size" value="23">
                            </label>
                            <label>
                                24
                                <input type="checkbox" class="filter_all size" value="24">
                            </label>
                            <label>
                                27
                                <input type="checkbox" class="filter_all size" value="27">
                            </label>
                            <label>
                                32
                                <input type="checkbox" class="filter_all size" value="32">
                            </label>
                        </div>
                    @endif

                    @if ($re[0] == 'CG')
                        <h3>RAM</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                4 Go
                                <input type="checkbox" class="filter_all ram" value="4">
                            </label>
                            <label>
                                8 Go
                                <input type="checkbox" class="filter_all ram" value="8">
                            </label>
                            <label>
                                16 Go
                                <input type="checkbox" class="filter_all ram" value="16">
                            </label>
                        </div>
                        <h3>Type</h3>
                        <div class="list-group-item checkbox">
                            <select>
                                <option selected class="" value="">choose</option>
                                <option class="filter_all CGType" value="GTX">GTX</option>
                                <option class="filter_all CGType" value="GT">GT</option>
                                <option class="filter_all CGType" value="RTX">RTX</option>
                            </select>
                        </div>
                    @endif
                    @if ($re[0] == 'PROC')
                        <h3>Processeur</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                I9
                                <input type="checkbox" class="filter_all proc" value="9">
                            </label>
                            <label>
                                I7
                                <input type="checkbox" class="filter_all proc" value="7">
                            </label>
                            <label>
                                i5
                                <input type="checkbox" class="filter_all proc" value="5">
                            </label>
                            <label>
                                i3
                                <input type="checkbox" class="filter_all proc" value="3">
                            </label>
                        </div>
                    @endif

                    <button class="btn btn-outline-white btn-md my-0 ml-sm-2" style="display: none" onclick='showOld(event)'
                        type="text">Search</button>
            </form>
        </div>
    </div>

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
