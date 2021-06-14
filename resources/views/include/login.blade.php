
    <!-- Authentication Links -->
    <ul class="d-flex" style="padding: 0px; margin: 0px; ">
    @guest<div class="item">
        <li style="list-style: none;" class="nav-item">

            <a class="nav-link" href="{{ route('login') }}" style="color:black;"><i class="fas fa-user-circle"></i>  {{ __('Login') }}</a>
        </li></div>


        @if (Route::has('register'))
        <div class="item">
            <li style="list-style: none" class="nav-item">
                <a class="nav-link" href="{{ route('register') }}" style="color:black;">{{ __('Register') }}</a>
            </li>
        </div>
        @endif
    @else

        <li style="list-style: none"s class="nav-item dropdown">

            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('Customer.index') }}">Mes commandes</a>

                <a  class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf

                </form>

            </div>
        </li>
    @endguest

    </ul>

