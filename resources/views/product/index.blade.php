@extends('layouts.app')
@section('extra-css')
<link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
@endsection

@section('home')

{{-- Caroussel 1  --}}

    <div   id="carouselExampleControls" class="carousel slide w-100" data-ride="carousel">
        <div class="carousel-inner" id="hg">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('asset/banner/Visuel_maquette.jpg')}}" alt="First slide">
        </div>

        </div>

  </div>

{{-- premier caroussel --}}

    <div class="container-fluid">

        <p style="margin-top: 20px;" class="news">Les nouveautés</p>
         <div  id="ty"  class=" owl-two owl-carousel">
            @foreach ($news as $new)
        <div class="item itemcar">

            @if (File::exists('asset/item/images/'.$new->Id.'/Medium1.jpg'))
            <a href="{{ route('product.show', $new->Id) }}"><img id="itemcarouss" class="card-img-top" src="{{asset('asset/item/images/'.$new->Id.'/Medium1.jpg')}}" alt="Card image cap"></a>
            @else
            <a href="{{ route('product.show', $new->Id) }}"><img id="itemcarouss" class="card-img-top" src="{{asset('asset/img/img-indispo-480.jpg')}}" alt="Card image cap"></a>
            @endif
            <h4 class="card-title col-6" style="font-size:12px;">{{ $new->Caption }}</h4>
        </div>

        @endforeach
        </div>
    </div>
    {{-- Caroussel 2  --}}
    <div class="container-fluid">
        <p class="news">  Des promotions à ne pas louper !</p>

         <div  id="ty2" class=" owl-two owl-carousel">
            @foreach ($promotions as $prom)
            <div class="item itemcar">
                @if (File::exists('asset/item/images/'.$prom->Id.'/Medium1.jpg'))
                <a href="{{ route('product.show', $prom->Id) }}"><img id="itemcarouss" class="card-img-top" src="{{asset('asset/item/images/'.$prom->Id.'/Medium1.jpg')}}" alt="Card image cap"></a>
                @else
                <a href="{{ route('product.show', $prom->Id) }}"><img id="itemcarouss" class="card-img-top" src="{{asset('asset/img/img-indispo-480.jpg')}}" alt="Card image cap"></a>
                @endif
                    <h4 class="card-title col-5 col-sm-6  col-md-9" id="ecrituretailleindex">{{ $prom->Caption }}</h4>
            </div>
            @endforeach
        </div>
    </div>


{{-- Caroussel 3 --}}
    <div id="mv"  style=" background-color: #D6D1C1; " class="container-fluid w-100 m-md-0">
        <p class="news">Nos meilleures ventes</p>
        <div   id="encadrement" class=" owl-two owl-carousel">
            @foreach ($bestsell as $sell)
            <div class="item" id="item3">

                @if (File::exists('asset/item/images/'.$sell->item->Id.'/Medium1.jpg'))
                <a href="{{ route('product.show', $sell->item->Id ) }}"><img id="itemcarouss" class="card-img-top" src="{{asset('asset/item/images/'.$sell->item->Id.'/Medium1.jpg')}}" alt="Card image cap"></a>
                @else
                <a href="{{ route('product.show', $sell->item->Id ) }}"><img id="itemcarouss" class="card-img-top" src="{{asset('asset/img/img-indispo-480.jpg')}}" alt="Card image cap"></a>
                @endif
                    <h4 class="card-title col-5 col-sm-6  col-md-9 "id="ecrituretailleindex" >{{ $sell->item->Caption }}</h4>


            </div>
            @endforeach

        </div>
    </div>

    {{-- Caroussel4 --}}


    <p class="news">
      Nos partenaires
    </p>

    <div class="container">
        <div id="parte"  class=" owl-one owl-carousel"  >

        <div class="item1">  <img  id="par" class="card-img-top"  src="{{asset('asset/img/aoc4.png')}}"
            alt="Card image cap"></div>
        <div class="item1">  <img id="par" class="card-img-top"  src="{{asset('asset/img/infosec4.png')}}"
            alt="Card image cap"></div>
        <div class="item1"> <img id="par"   class="card-img-top"  src="{{asset('asset/img/Lenovo4.png')}}"
            alt="Card image cap"></div>
        <div class="item1"><img id="par"class="card-img-top"  src="{{asset('asset/img/LG24.png')}}"
            alt="Card image cap"></div>
        <div class="item1">  <img id="par" class="card-img-top"  src="{{asset('asset/img/MSI4.png')}}"
            alt="Card image cap"></div>
        <div class="item1">  <img id="par" class="card-img-top"  src="{{asset('asset/img/seagate4.png')}}"
            alt="Card image cap"></div>
            <div class="item1">  <img id="par" class="card-img-top"  src="{{asset('asset/img/western_digital4.png')}}"
            alt="Card image cap"></div>


        </div>
    </div>



        <div id="divpartenaire" style="display:flex; justify-content: center; ">
            <img id="imgpart"  class="" src="{{asset('asset/img/Certification.svg')}}"
            alt="Certification">
            <h1  id="ecritpart">En plus de certains partenariats, nous sommes<strong> distributeur officiel.</strong>
            Cette preuve de <strong>qualité</strong> est pour nous primordiale, pour répondre au mieux à <strong>vos besoins.</strong></h1>
            <img id="imgpart2"  class="" src="{{asset('asset/img/Certification.svg')}}"
            alt="Certification">
        </div>




@endsection


@section('extra-js')
<script src="{{ asset('js/owl.carousel.min.js') }}" ></script>
<script>
$('.owl-one').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:true
        },
        1000:{
            items:5,
            nav:true,
            loop:true
        }
    }
})

$('.owl-two').owlCarousel({
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3500,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        500:{
            items:2,
            nav:true
        },

        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:true,

        },
        1400:{
            items:5,
            nav:true,

        }
    }
})

var owl = $('.owl-two');
owl.owlCarousel({
    items:4,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true
});


    </script>




@endsection
