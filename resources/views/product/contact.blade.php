@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div>
    <img style=" margin-left: 5%; margin-bottom: 20px; border-radius: 30px;"   src="{{asset('asset/img/img-contact_200x300.png')}}" alt="Connect">
    <div style="border-radius: 30px; color: #21201B;" class="border border-dark col-12">
    <ul class="list-unstyled pt-2   ">
        <li class="col-12 pb-3" style="font-size: 20px;  line-height: 12px;">
          <i style="font-size: 17px; color: #21201B; margin-top:10px; margin-bottom:10px;" class="fas fa-map-marker-alt"></i> <a href="https://www.google.com/maps/place/12t+Avenue+Eug%C3%A8ne+H%C3%A9naff,+69120+Vaulx-en-Velin/data=!4m2!3m1!1s0x47f4c0f1865b7ab1:0x25f997f1e5d4679e?sa=X&ved=2ahUKEwitstTSjfbwAhWwx4UKHXJyA40Q8gEwAHoECAoQAQ" id="contactecouleur">12T Avenue Eugène Hénaff, </a><p style="margin-left: 6%; margin-bottom: 0%;">69120 Vaulx-en-Velin</p>
        </li>
        <li class="col-12 pb-3" style="font-size: 20px;">
          <i style="font-size: 17px; color: #21201B; margin-top:10px; margin-bottom:10px;" class="fas fa-envelope"></i> <a href="mailto:vente@kw-distribution.com" id="contactecouleur">vente@kw-distribution.com</a>
        </li>

        <li class="col-12 pb-3" style="font-size: 20px;">
          <i style="font-size: 17px; color: #21201B; margin-top:10px; margin-bottom:10px;" class="fas fa-phone-alt"></i> <a href="tel:0486800800" id="contactecouleur">04 86 80 08 00</a>
        </li>
        <li class="col-12 " style="font-size: 20px; line-height: 12px;">
          <i style="font-size: 18px; color: #21201B; margin-top:10px; margin-bottom:10px;" class="far fa-clock"></i> <a href="tel:0486800800"  id="contactecouleur">Du Lundi au Vendredi </a><p style="margin-left: 6%;">9h-12h/14h-18h</p>
        </li>
        </ul>
        </div>
    </div>

    <div class=" col-8 ml-5 ">
                <h5 class="news">Contactez-nous</h5>
                <form class="form-card" onsubmit="event.preventDefault()">
                <div style="display: flex;">
                <p style=" margin-top: 5px; margin-right:10px;">Sujet:</p>
            <select class="col-7" name="marque_id" style=" margin-top: 5px; height: 70%;  border-radius: 20px; box-shadow: none; outline: 0;" >
                <option  class="">Suivi de commande</option>
                <option id="filter_o" class="filter_all mrq" value="_LG">Service client</option>
                <option id="filter_o" class="filter_all mrq" value="_AOC">Demande au service marketing</option>
                <option id="filter_o" class="filter_all mrq" value="_LENOV">Autre demande</option>
                </select>
                </div>

                <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label ">Société<span class="text-danger"> </span></label> <input type="text" id="log1" name="ans" placeholder="Nom de votre société" onblur="validate(6)"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Nom<span class="text-danger"> </span></label> <input type="text" id="log1" name="fname" placeholder="Votre nom" onblur="validate(1)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Prénom<span class="text-danger"> </span></label> <input type="text" id="log1" name="lname" placeholder="Votre prénom" onblur="validate(2)"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Adresse e-mail<span class="text-danger"> </span></label> <input type="text" id="log1" name="email" placeholder="Votre e-mail" onblur="validate(3)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label ">Numéro de téléphone<span class="text-danger"> *</span></label> <input type="text" id="log1" name="mob" placeholder="Votre numéro de téléphone" onblur="validate(4)"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label ">Message<span class="text-danger"> </span></label> <input type="text" id="log1" name="ans" placeholder="Votre message" onblur="validate(6)"> </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="form-group d-flex col-sm-6 justify-content-center"> <button type="submit" class="btn col-5 boutton">Envoyer</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




             <div class="form-group row">
                 <div class="col-md-6 offset-md-4">
                     <div class="g-recaptcha" data-sitekey="6LfS_NsaAAAAAF-GcBVZ8RU_h03K92ezFbsLgFFC"></div>
                 </div>

            </div>



</body>
</html>

@endsection


