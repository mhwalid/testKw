<nav id="Nav" class="navbar navbar-expand-lg navbar-light indigo mb-4" style="background-color: white;" >

    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user') }}"> nouveau client/contact<span class="badge badge-light">{{$new_user}}</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.banner') }}"> gestion des bannière</a>
        </li>
    </ul>

    @include('include.admin_login')
</nav>
