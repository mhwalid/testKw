<div id="haut">

    <nav id="Nav" class="navbar1  navbar-expand-lg navbar-light indigo " style="background-color: white;" >
        <a class="navbar-brand" href="{{ route('product.index') }}"><img style="width: 80px; heigth:80px;" src="{{asset('asset/img/kw.png')}}" alt=""></a>



        <div class="md-form my-0" id="loupe">
            <button   id="loupe" >
            <img style="width: 20px; heigth:20px;" src="{{asset('asset/img/kw.png')}}" alt="">
            </button>
        </div>
        <div class="md-form my-0" id="navpour">
            <input class="form-control" type="text" placeholder="Recherche" id="search" name="q"
                value="{{ request()->q ?? '' }}">
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form action="{{ route('search') }}" method="POST"  onsubmit="traitForm(a)"
                id="SearchFrom">
                @csrf

                <button class="btn btn-outline-white btn-md my-0 ml-sm-2" onclick='showOld(event)' type="text"></button>
            </form>
        </div>
        @include('include.login')
    </nav>
</div>
    @include('include.navbarSlide')

<script>

     $(function () {
                 $('#loupe').click(function () {

                         $('#loupe').hide();
                         $('#navpour').show();

                         $('#ite8').hide();
                         $('#ite9').hide();




                 });
             });

</script>
