<div id="haut">
    <nav id="Nav" class="navbar1  navbar-expand-lg navbar-light indigo " style="background-color: white;" >
        <a class="navbar-brand" href="{{ route('product.home') }}"><img style="width: 80px; heigth:80px;" src="{{asset('asset/img/kw.png')}}" alt=""></a>


        <div class="md-form " style="margin-bottom: 5%; z-index: 9;" id="loupe">
            <button style="border: none; background-color : white; " id="loupe"   >
            <img style="width: 20px; heigth:20px;" src="{{asset('asset/img/loupe.png')}}" alt="">

            </button>
        </div>
        <div class="md-form my-0" style="z-index: 9;" id="navpour">
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
 
 function myFunction(x) {
  if (x.matches) { // If media query matches
    $(document).mouseup(function(e){
    var container = $("#navpour");

    // If the target of the click isn't the container
    if(!container.is(e.target) && container.has(e.target).length === 0){
        container.hide();
        $('#ite8').show();
         $('#ite9').show();
         $('#loupe').show();

    }
});

  } else {

  }
}

var x = window.matchMedia("(max-width: 480px)")
myFunction(x) // Call listener function at run time
x.addListener(myFunction)

</script>
