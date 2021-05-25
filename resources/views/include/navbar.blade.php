<nav id="Nav" class="navbar navbar-expand-lg navbar-light indigo mb-4" style="background-color: white;" >
    <a class="navbar-brand" href="{{ route('product.index') }}"><img style="width: 80px; heigth:80px" src="{{asset('asset/img/kw.png')}}" alt=""></a>
    <div class="col-4pt-1">
        <a href="{{ route('cart.index') }}"> <i class="fas fa-shopping-cart"></i> <span
                class="badge badge-pill badge-warning">{{ Cart::content()->count() }} </span></a>
    </div>
   

    <div class="md-form my-0">
        <input class="form-control" type="text" placeholder="Recherche" id="search" name="q"
            value="{{ request()->q ?? '' }}">
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <form action="{{ route('search') }}" method="POST" class="form-inline ml-auto" onsubmit="traitForm(a)"
            id="SearchFrom">
            @csrf

            <button class="btn btn-outline-white btn-md my-0 ml-sm-2" onclick='showOld(event)' type="text"></button>
        </form>
    </div>
    @include('include.login')
</nav>

@include('include.navbarSlide')