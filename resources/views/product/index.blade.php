@extends('layouts.app')
@section('extra-css')
<link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
@endsection

@section('home')

{{-- Caroussel 1  --}}
    <div   id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('asset/banner/acceuil.jpg')}}" alt="First slide">
            </div>
        </div>

  </div>

{{-- premier caroussel --}}

    <div class="container-fluid">

        <p style="margin-top: 20px;" class="news">Les nouveautés</p>


         <div  style="height: 420px;" class=" owl-two owl-carousel">

        <div class="item" style="width: 350px; height: 400px; margin: auto; margin-top: 30px;"  >
            <img  style="height: 280px; width: 280px;" class="card-img-top" src="{{asset('asset/item/images/DDR432SKILL32GVK/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a  class="btn   boutton">Ajouter Au Panier</a>
        </div>
        <div class="item"  style="width: 350px; height: 400px;margin: auto; margin-top: 30px;"  >
            <img style="height: 280px; width: 280px;" class="card-img-top" src="{{asset('asset/item/images/CMGIGABYTEB550AORUSE/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a class="btn   boutton">Ajouter Au Panier</a>
        </div>
        <div class="item" style="width: 350px; height: 400px; margin: auto; margin-top: 30px;"  >
            <img  style="height: 280px; width: 280px;" class="card-img-top" src="{{asset('asset/item/images/DDR432SKILL32GVK/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a  class="btn   boutton">Ajouter Au Panier</a>
        </div>
        <div class="item"  style="width: 350px; height: 400px;margin: auto; margin-top: 30px;"  >
            <img style="height: 280px; width: 280px;" class="card-img-top" src="{{asset('asset/item/images/CMGIGABYTEB550AORUSE/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a class="btn   boutton">Ajouter Au Panier</a>
        </div>
        <div class="item" style="width: 350px; height: 400px; margin: auto; margin-top: 30px;"  >
            <img  style="height: 280px; width: 280px;" class="card-img-top" src="{{asset('asset/item/images/DDR432SKILL32GVK/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a  class="btn   boutton">Ajouter Au Panier</a>
        </div>
        <div class="item"  style="width: 350px; height: 400px;margin: auto; margin-top: 30px;"  >
            <img style="height: 280px; width: 280px;" class="card-img-top" src="{{asset('asset/item/images/CMGIGABYTEB550AORUSE/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a class="btn   boutton">Ajouter Au Panier</a>
        </div>


        </div>
    </div>
    {{-- Caroussel 2  --}}
    <div class="container-fluid">

        <p class="news">  Des promotions à ne pas louper !</p>


         <div  style="height: 420px;" class=" owl-two owl-carousel">

        <div class="item" style="width: 350px; height: 400px; margin: auto; margin-top: 30px;"  >
            <img  style="height: 280px; width: 280px;" class="card-img-top" src="{{asset('asset/item/images/DDR432SKILL32GVK/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a  class="btn   boutton">Ajouter Au Panier</a>
        </div>
        <div class="item"  style="width: 350px; height: 400px;margin: auto; margin-top: 30px;"  >
            <img style="height: 280px; width: 280px;" class="card-img-top" src="{{asset('asset/item/images/CMGIGABYTEB550AORUSE/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a class="btn   boutton">Ajouter Au Panier</a>
        </div>
        <div class="item" style="width: 350px; height: 400px; margin: auto; margin-top: 30px;"  >
            <img  style="height: 280px; width: 280px;" class="card-img-top" src="{{asset('asset/item/images/DDR432SKILL32GVK/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a  class="btn   boutton">Ajouter Au Panier</a>
        </div>
        <div class="item"  style="width: 350px; height: 400px;margin: auto; margin-top: 30px;"  >
            <img style="height: 280px; width: 280px;" class="card-img-top" src="{{asset('asset/item/images/CMGIGABYTEB550AORUSE/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a class="btn   boutton">Ajouter Au Panier</a>
        </div>
        <div class="item" style="width: 350px; height: 400px; margin: auto; margin-top: 30px;"  >
            <img  style="height: 280px; width: 280px;" class="card-img-top" src="{{asset('asset/item/images/DDR432SKILL32GVK/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a  class="btn   boutton">Ajouter Au Panier</a>
        </div>
        <div class="item"  style="width: 350px; height: 400px;margin: auto; margin-top: 30px;"  >
            <img style="height: 280px; width: 280px;" class="card-img-top" src="{{asset('asset/item/images/CMGIGABYTEB550AORUSE/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a class="btn   boutton">Ajouter Au Panier</a>
        </div>

        </div>
    </div>


{{-- Caroussel 3 --}}

    <div style=" background-color: #D6D1C1; " class="container-fluid">

        <p class="news">Nos meilleures ventes</p>


         <div  style=" height: 440px;" class=" owl-two owl-carousel">

        <div class="item" style="  background-color: white; width: 350px; height: 410px; padding: 30px;"  >
            <img style="height: 280px; width: 280px;"   class="card-img-top" src="{{asset('asset/item/images/DDR432SKILL32GVK/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a  class="btn   boutton">Ajouter Au Panier</a>
        </div>
        <div class="item"  style="  background-color: white; width: 350px; height: 410px; padding: 30px;"  >
            <img style="height: 280px; width: 280px;" class="card-img-top" src="http://www.kw-distribution.com/themes/mobicity/assets/img/header/msi.png" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a  class="btn   boutton">Ajouter Au Panier</a>
        </div>

        <div class="item" style="  background-color: white; width: 350px; height: 410px; padding: 30px;"  >
            <img style="height: 280px; width: 280px;"   class="card-img-top" src="{{asset('asset/item/images/DDR432SKILL32GVK/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a  class="btn   boutton">Ajouter Au Panier</a>
        </div>
        <div class="item" style="  background-color: white; width: 350px; height: 410px; padding: 30px;"  >
            <img style="height: 280px; width: 280px;" class="card-img-top" src="http://www.kw-distribution.com/themes/mobicity/assets/img/header/msi.png" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a  class="btn   boutton">Ajouter Au Panier</a>
        </div>

        <div class="item" style="  background-color: white; width: 350px; height: 410px; padding: 30px;"  >
            <img style="height: 280px; width: 280px;"   class="card-img-top" src="{{asset('asset/item/images/DDR432SKILL32GVK/Medium1.jpg')}}" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a  class="btn   boutton">Ajouter Au Panier</a>
        </div>
        <div class="item" style="  background-color: white; width: 350px; height: 410px; padding: 30px;"  >
            <img style="height: 280px; width: 280px;" class="card-img-top" src="http://www.kw-distribution.com/themes/mobicity/assets/img/header/msi.png" alt="Card image cap">
                <h4 class="card-title">Nom Produit</h4>
                    <a  class="btn   boutton">Ajouter Au Panier</a>
        </div>


        </div>
    </div>

    {{-- Caroussel4 --}}


    <p class="news">
      Nos partenaires
    </p>

    <div class="container">
        <div  class=" owl-one owl-carousel"  >

        <div class="item1">  <img  class="card-img-top"  src="{{asset('asset/img/aoc4.png')}}"
            alt="Card image cap"></div>
        <div class="item1">  <img  class="card-img-top"  src="{{asset('asset/img/infosec4.png')}}"
            alt="Card image cap"></div>
        <div class="item1"> <img    class="card-img-top"  src="{{asset('asset/img/Lenovo4.png')}}"
            alt="Card image cap"></div>
        <div class="item1"><img class="card-img-top"  src="{{asset('asset/img/LG24.png')}}"
            alt="Card image cap"></div>
        <div class="item1">  <img  class="card-img-top"  src="{{asset('asset/img/MSI4.png')}}"
            alt="Card image cap"></div>
        <div class="item1">  <img  class="card-img-top"  src="{{asset('asset/img/seagate4.png')}}"
            alt="Card image cap"></div>
            <div class="item1">  <img  class="card-img-top"  src="{{asset('asset/img/western_digital4.png')}}"
            alt="Card image cap"></div>


        </div>
    </div>


    <div style="display:flex; justify-content: center; ">
        <img style=" width: 200px; height: 300px; margin-bottom: 50px;" class="" src="{{asset('asset/img/Certification.svg')}}"
        alt="Certification">
        <h1  style=" padding-left: 40px; padding-top: 50px; width: 600px; font-family: 'Roboto', sans-serif; ">En plus de certains partenariats, nous sommes<strong> distributeur officiel.</strong>
        Cette preuve de <strong>qualité</strong> est pour nous primordiale, pour répondre au mieux à <strong>vos besoins.</strong></h1>

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
        600:{
            items:3,
            nav:false
        },
        1000:{
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

