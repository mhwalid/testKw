@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row d-flex " id="contacte">
        <div  id="contactinvisiblemobile">
            <img style=" margin-left: 5%; margin-bottom: 20px; border-radius: 30px;"   src="{{asset('asset/img/img-contact_200x300.png')}}" alt="Connect">
            <div style="border-radius: 30px; color: #21201B;" class="border border-dark mb-3 col-12">
                <ul class="list-unstyled pt-2 ">
                    <li class="col-12 pb-3" id="contacttexte" >
                        <i style="font-size: 17px; color: #21201B; margin-top:10px; margin-bottom:10px;" class="fas fa-map-marker-alt"></i> <a href="https://www.google.com/maps/place/12t+Avenue+Eug%C3%A8ne+H%C3%A9naff,+69120+Vaulx-en-Velin/data=!4m2!3m1!1s0x47f4c0f1865b7ab1:0x25f997f1e5d4679e?sa=X&ved=2ahUKEwitstTSjfbwAhWwx4UKHXJyA40Q8gEwAHoECAoQAQ" id="contactecouleur">12T Avenue Eugène Hénaff, </a><p style="margin-left: 6%; margin-bottom: 0%;">69120 Vaulx-en-Velin</p>
                    </li>
                    <li class="col-12 pb-3" id="contacttexte1" >
                        <i style="font-size: 17px; color: #21201B; margin-top:10px; margin-bottom:10px;" class="fas fa-envelope"></i> <a href="mailto:vente@kw-distribution.com" id="contactecouleur">vente@kw-distribution.com</a>
                    </li>

                    <li class="col-12 pb-3" id="contacttexte1" >
                        <i style="font-size: 17px; color: #21201B; margin-top:10px; margin-bottom:10px;" class="fas fa-phone-alt"></i> <a href="tel:0486800800" id="contactecouleur">04 86 80 08 00</a>
                    </li>
                    <li class="col-12  " id="contacttexte">
                        <i id="ptittextecontact1"  class="far fa-clock"></i> <a href="tel:0486800800"  id="contactecouleur">Du Lundi au Vendredi </a><p style="margin-left: 6%;">9h-12h/14h-18h</p>
                    </li>
                </ul>
            </div>
        </div>


        <div class=" col-md-8 col-10 ml-lg-5 ">
            <h5 class="news">Contactez-nous</h5>
            <form class="form-card" method="POST" action="{{ route('contact.send') }} ">
                @csrf
                <div style="display: flex;">
                    <p style=" margin-top: 5px; margin-right:10px;">Sujet:</p>
                    <select class="col-7" name="reason" style=" margin-top: 5px; height: 70%;  border-radius: 20px; box-shadow: none; outline: 0;" >
                        <option  class="" value="Suivi_de_commande">Suivi de commande</option>
                        <option id="filter_o" class="filter_all mrq" value="Service_client">Service client</option>
                        <option id="filter_o" class="filter_all mrq" value="Demande_au_service_marketing">Demande au service marketing</option>
                        <option id="filter_o" class="filter_all mrq" value="Autre_demande">Autre demande</option>
                    </select>
                </div>

                <div class="row justify-content-between text-left">
                    <div class="form-group col-12 flex-column d-flex">
                        <label class="form-control-label ">Société<span class="text-danger"> </span></label>
                        <input type="text" class="contact" id="log1" name="compagny" placeholder="Nom de votre société"  @auth value="{{ Auth::user()->Customer->Name }}" @endauth required >
                    </div>
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex">
                        <label class="form-control-label ">Nom<span class="text-danger"> </span></label>
                        <input type="text" class="contact" id="log1" name="fname" placeholder="Votre nom" @auth value="{{ Auth::user()->name }}" @endauth required >
                    </div>
                    <div class="form-group col-sm-6 flex-column d-flex">
                        <label class="form-control-label ">Prénom<span class="text-danger"> </span></label>
                        <input type="text" class="contact" id="log1" name="lname" placeholder="Votre prénom" @auth value="{{ Auth::user()->first_name }}" @endauth required >
                    </div>
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column d-flex">
                        <label class="form-control-label ">Adresse e-mail<span class="text-danger"> </span></label>
                        <input type="email" class="contact" id="log1" name="email" placeholder="Votre e-mail" @auth value="{{ Auth::user()->email }}" @endauth required >
                    </div>
                    <div class="form-group col-sm-6 flex-column d-flex">
                        <label class="form-control-label ">Numéro de téléphone<span class="text-danger"> *</span></label>
                        <input type="tel" class="contact" id="log1" name="phone" placeholder="Votre numéro de téléphone" @auth value="{{ Auth::user()->phone }}" @endauth required >
                    </div>
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-12 flex-column d-flex">
                        <label class="form-control-label ">Message<span class="text-danger"> </span></label>
                        <textarea id="log1" class="contact" name="msg" placeholder="Votre message" required ></textarea>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="form-group d-flex col-sm-6 justify-content-center"> <button type="submit" class="btn col-5 boutton">Envoyer</button> </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div  class="row d-flex justify-content-center">
        <div id="contactvisiblemobile">
            <img id="msgcontactimg"    src="{{asset('asset/img/img-contact_200x300.png')}}" alt="Connect">
            <div style="border-radius: 30px; color: #21201B;" class="border border-dark mb-3 col-12">
                <ul class="list-unstyled pt-2   ">
                    <li class="col-12 pb-sm-1 pb-2 pb-md-3" id="contacttexte">
                        <i id="ptittextecontact"  class="fas fa-map-marker-alt"></i> <a href="https://www.google.com/maps/place/12t+Avenue+Eug%C3%A8ne+H%C3%A9naff,+69120+Vaulx-en-Velin/data=!4m2!3m1!1s0x47f4c0f1865b7ab1:0x25f997f1e5d4679e?sa=X&ved=2ahUKEwitstTSjfbwAhWwx4UKHXJyA40Q8gEwAHoECAoQAQ" id="contactecouleur">12T Avenue Eugène Hénaff, </a><p style="margin-left: 6%; margin-bottom: 0%;">69120 Vaulx-en-Velin</p>
                    </li>
                    <li class="col-12  pb-1 pb-sm-1 pb-md-3" id="contacttexte1">
                        <i id="ptittextecontact"  class="fas fa-envelope"></i> <a href="mailto:vente@kw-distribution.com" id="contactecouleur">vente@kw-distribution.com</a>
                    </li>


                    <li class="col-12 pb-1 pb-sm-1 pb-md-3" id="contacttexte1">
                        <i id="ptittextecontact" class="fas fa-phone-alt"></i> <a href="tel:0486800800" id="contactecouleur">04 86 80 08 00</a>
                    </li>
                    <li class="col-12" id="contacttexte">
                        <i id="ptittextecontact1"  class="far fa-clock"></i> <a href="tel:0486800800"  id="contactecouleur">Du Lundi au Vendredi </a><p style="margin-left: 6%;">9h-12h/14h-18h</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>

@endsection

