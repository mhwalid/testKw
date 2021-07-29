


    <ul class="d-flex col-lg-12 col-md-12 " id="headerlon" >
    @guest

    <li style="list-style: none;">
        <div id="ttt">
        <a class="navbar-brand" href="{{ route('product.home') }}"><img id="kwhaut1"  src="{{asset('asset/img/kw.png')}}" alt=""></a>
        </div>
    </li>
<div id="ttt">
    <div class="md-form my-0" style="z-index: 9;" id="navpour">
        <li style="list-style: none;">
        <input class="form-control" type="text" placeholder="Recherche" id="search" name="q" value="{{ request()->q ?? '' }}">
        </li>
    </div>
</div>




    <div  id="ite9" class="item"  style="z-index: 9">
        <li   id="loginli" style="list-style: none;" class="nav-item">

            <a id="allignheader"  style="text-decoration: none; color: black;"class="nav-link1" href="{{ route('login') }}" style="color:black;"><img id="imgheader" src="{{asset('asset/img/bonhomme_mon_compte.svg')}}" alt=""> <p id="invisible"> {{ __('Mon compte') }}</p></a>
        </li></div>

        <div id="ite8" class="item" style="z-index: 9" >
            <li id="loginli"style="list-style: none;" class="nav-item">
            <a id="allignheader" style="text-decoration: none; color: black;" href="{{ route('cart.index') }}"> <img style="padding-right: 8%;" id="imgheader" src="{{asset('asset/img/mon_panier_header.svg')}}" alt=""> <p id="invisible">{{ __('Mon panier') }} </p></a>
        </li> </div>




    @else


    <li style="list-style: none;">
        <div id="ttt">
        <a class="navbar-brand" href="{{ route('product.home') }}"><img id="kwhaut1"  src="{{asset('asset/img/kw.png')}}" alt=""></a>
        </div>
    </li>
<div id="ttt">
    <div class="md-form my-0" style="z-index: 9;" id="navpour">
        <li style="list-style: none;">
        <input class="form-control" type="text" placeholder="Recherche" id="search" name="q" value="{{ request()->q ?? '' }}">
        </li>
    </div>
</div>




    <div  id="ite9" class=""  style="z-index: 9">
        <li style="list-style: none"s class="nav-item dropdown">

            <a id="navbarDropdown" style=" display: flex; align-items: flex-end;" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img id="imgheader" src="{{asset('asset/img/bonhomme_mon_compte.svg')}}" alt=""> <p id="invisible"> {{ __('Mon compte') }}</p>

            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                {{-- <a class="dropdown-item" href="{{ route('Customer.orders') }}">Mes commandes</a> --}}

                <a  class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Déconnexion') }}
                </a>
                <a  class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Déconnexion') }}
                </a>
                <a  class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Déconnexion') }}
                </a>
                <a  class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Déconnexion') }}
                </a>
                <a  class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Déconnexion') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf

                </form>

            </div>
        </li></div>

        <div id="ite8" class="item" style="z-index: 9" >
            <li id="loginli"style="list-style: none;" class="nav-item">
            <a id="allignheader" style="text-decoration: none; color: black;" href="{{ route('cart.index') }}"> <img style="padding-right: 8%;" id="imgheader" src="{{asset('asset/img/mon_panier_header.svg')}}" alt=""> <p id="invisible">{{ __('Mon panier') }} </p></a>
        </li> </div>



    @endguest

    </ul>

