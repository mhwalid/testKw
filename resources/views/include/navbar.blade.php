<nav id="Nav" class="navbar navbar-expand-lg navbar-dark indigo mb-4">
    <a class="navbar-brand" href="{{ route('product.index') }}"><img style="width: 80px; heigth:80px" src="{{asset('asset/img/kw-distribution.jpg')}}" alt=""></a>
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
                type="text"></button>
        </form>
    </div>
    @include('include.login')
</nav>