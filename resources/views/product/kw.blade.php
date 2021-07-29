
@extends('layouts.app')
@section('content')

<div class="container-fluid d-flex justify-content-center" style=" margin-top: 3%;">

<img id="kwlieu" class="col-lg-3 col-4" style="  margin-bottom: 20px; border-radius: 50px;"   src="{{asset('asset/img/local1.jpeg')}}" alt="Connect">

<div id="fffff" style=" display: flex; flex-direction: row; align-content: space-around; justify-content: space-around;">
        <ul id="kwecriture" class="list-unstyled pt-2 ">
            <li class=" pl-0 pr-0 col-12 pb-lg-3 pb-md-3 pb-sm-3 pb-2" id="contacttexte" >
              <i style="font-size: 17px; color: #21201B; margin-top:10px; margin-bottom:10px;" class="fas fa-map-marker-alt"></i> <a href="https://www.google.com/maps/place/12t+Avenue+Eug%C3%A8ne+H%C3%A9naff,+69120+Vaulx-en-Velin/data=!4m2!3m1!1s0x47f4c0f1865b7ab1:0x25f997f1e5d4679e?sa=X&ved=2ahUKEwitstTSjfbwAhWwx4UKHXJyA40Q8gEwAHoECAoQAQ" id="contactecouleur">12T Avenue Eugène Hénaff, </a><p style="margin-left: 6%; margin-bottom: 0%;">69120 Vaulx-en-Velin</p>
            </li>
            <li class=" pl-0 pr-0 col-12 pb-lg-3 pb-md-3 pb-sm-3 " id="contacttexte1" >
              <i style="font-size: 17px; color: #21201B; margin-top:10px; margin-bottom:10px;" class="fas fa-envelope"></i> <a href="mailto:vente@kw-distribution.com" id="contactecouleur">vente@kw-distribution.com</a>
            </li>

            <li class=" pl-0 pr-0  col-12 pb-lg-3 pb-md-3 pb-sm-3 " id="contacttexte1" >
              <i style="font-size: 17px; color: #21201B; margin-top:10px; margin-bottom:10px;" class="fas fa-phone-alt"></i> <a href="tel:0486800800" id="contactecouleur">04 86 80 08 00</a>
            </li>
            <li class="col-12 pl-0 pr-0  " id="contacttexte">
                <i id="ptittextecontact1"  class="far fa-clock"></i> <a href="tel:0486800800"  id="contactecouleur">Du Lundi au Vendredi </a><p style="margin-left: 6%;">9h-12h/14h-18h</p>
              </li>
            </ul>
        </div>

    </div>
    <div class="container-fluid d-flex justify-content-center">
    <img id="kwlieu2" class="col-lg-3 col-11" style="  margin-bottom: 20px; border-radius: 50px;"   src="{{asset('asset/img/local1.jpeg')}}" alt="Connect">

    </div>


</body>
</html>

@endsection


<style>

        @media screen and (min-width: 0px) and (max-width: 650px) {
#kwlieu{
    display:none;

    }


    }

    @media screen and (min-width: 0px) and (max-width: 481px) {
        #kwecriture{
        margin-top: 40%;
        }

    }
    @media screen and (min-width: 650px) and (max-width: 2600px) {
#kwlieu2{
    display:none;

    }
    #fffff{
        margin-left: 10%;
    }

    }

</style>
