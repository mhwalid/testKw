<nav id="Nav" class="navbar navbar-expand-lg navbar-light indigo mb-4" style="background-color: white;" >

    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user') }}">nouveau client/contact<span class="badge badge-light">{{$new_user}}</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.banner') }}">gestion des bannière</a>
        </li>

        <li class="nav-item">
            {{-- ajouter la route nécessaire --}}
            <a class="nav-link" href="">ajouter un produit</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.allContact') }}">liste des contacts</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.allCustomer') }}">liste des entreprises</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.factures') }}">factures</a>
        </li>
        @if ($ldap_admin->memberof[0] == "CN=Direction KWD,OU=Groupe raic,DC=RAIC,DC=local")
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.direction.devalidation.facture.show') }}">dévalider une facture</a>
            </li>
        @endif
    </ul>

    @include('include.admin_login')
</nav>
