<ul class="d-flex col-lg-7 col-md-5 " id="headerlon" style="justify-content: space-around;" >
    <div id="ite8" class="item" >
        <a style="text-decoration: none; color: black;" href="{{ route('cart.index') }}"> <img id="imgheader" src="{{asset('asset/img/mon_panier_header.svg')}}" alt=""> <p id="invisible">{{ __('Mon panier') }} <span class="number">{{Cart::content()->count()?? '0'}}</span></p></a>
    </div>
    @guest<div  id="ite9" class="item">
        <li style="list-style: none;" class="nav-item">

            <a  style="text-decoration: none; color: black;"class="nav-link1" href="{{ route('login') }}" style="color:black;"><img id="imgheader" src="{{asset('asset/img/bonhomme_mon_compte.svg')}}" alt=""> <p id="invisible"> {{ __('Mon compte') }}</p></a>
        </li></div>
    @else
        <li style="list-style: none"s class="nav-item dropdown">

            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->Contact->ContactFields_Name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('Customer.index') }}">Mes commandes</a>

                <a  class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf

                </form>

            </div>
        </li>
    @endguest
    </ul>
