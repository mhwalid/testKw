@extends('layouts.app')



@section('content')

<div id="row" >
{{-- Virement --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body" >
                    <fieldset class="form-group row">
                        <legend class="col-form-label col-sm-2 float-sm-left pt-0">{{ __('Mode de paiement')}} : </legend>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="french_compagny" id="french_yes" value="CarteBancaire" checked="checked" onchange="display()">
                                <label class="form-check-label" for="french_yes">{{ __('CarteBancaire')}} </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="french_compagny" id="french_yes" value="Retrait" checked="checked" onchange="display()">
                                <label class="form-check-label" for="french_yes">{{ __('Retrait')}} </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="french_compagny" id="french_no" value="Virement" onchange="display()">
                                <label class="form-check-label" for="french_no">{{ __('Virement')}} </label>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>


                    </fieldset>

                    <div id="contact_form">
                        <form action=""  method="POST">
                            @csrf

                            <div class="card" id="registerRequestCard">
                                <div class="card-header">{{ __('Contact') }}</div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="contact_civility" class="col-md-4 col-form-label text-md-right">{{ __('Civilité') }}*</label>
                                        <div class="col-md-6">
                                            <select id="contact_civility" name="contact_civility" class="form-select" aria-label="Default select example">
                                                <option selected value="Monsieur">M.</option>
                                                <option value="Madame">Mme.</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Numero_Carte" class="col-md-4 col-form-label text-md-right">{{ __('Numero Carte') }}*</label>

                                        <div class="col-md-6">
                                            <input id="Numero_Carte" type="text" class="form-control @error('Numero_Carte') is-invalid @enderror" name="Numero_Carte" value="{{ old('Numero_Carte') }}" required autocomplete="name" autofocus>

                                            @error('Numero_Carte')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Cryptogramme" class="col-md-4 col-form-label text-md-right">{{ __('Cryptogramme Visuel') }}*</label>

                                        <div class="col-md-6">
                                            <input id="Cryptogramme" type="text" class="form-control @error('Cryptogramme') is-invalid @enderror" name="Cryptogramme" value="{{ old('Cryptogramme') }}" required autocomplete="name" autofocus>

                                            @error('Cryptogramme')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="contact_email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}*</label>

                                        <div class="col-md-6">
                                            <input id="contact_email" type="email" class="form-control @error('contact_email') is-invalid @enderror" name="contact_email" value="{{ old('contact_email') }}" required autocomplete="email">

                                            @error('contact_email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>







                                    <div class="form-group row">
                                        <label for="contact_message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="contact_message" type="date" class="form-control @error('contact_message') is-invalid @enderror" name="contact_message" value="{{ old('contact_message') }}"></textarea>
                                            @error('contact_message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

{{-- CB --}}

                    <div id="register_form" >
                        <form method="POST"  enctype="multipart/form-data" action="{{ route('register') }}">
                            @csrf



                            <div class="card-details">


                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="left border">
                                                    <div class="row"> <span class="header">Payement</span>
                                                        <div class="icons"> <img src="https://img.icons8.com/color/48/000000/visa.png" /> <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /> <img src="https://img.icons8.com/color/48/000000/maestro.png" /> </div>
                                                    </div>
                                                    <form> <span style="color: black">Titulaire de la Carte:</span> <input class="CommandeCB" placeholder="Titulaire de la Carte"> <span  style="color: black">Numéro de Carte:</span> <input class="CommandeCB" placeholder="Numéro de Carte">
                                                        <div class="row">
                                                            <div class="col-4"><span style="color: black">Expiration:</span> <input class="CommandeCB" placeholder="YY/MM"> </div>
                                                            <div class=" Right col-6"><span style="color: black">CVV:</span><label data-toggle="tooltip" title="Les 3 chiffres se localisant sur le dos de votre carte"><i class="fa fa-question-circle d-inline"></i></label> <input class="CommandeCB" > </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="right border">
                                                    <div class="header">Résumé de Commande</div>
                                                    <p>Nombre d'items</p>
                                                    <div class="row item">
                                                        <div class="col-4 align-self-center"><img class="img-fluid" src="https://i.imgur.com/79M6pU0.png"></div>
                                                        <div class="col-8">
                                                            <div class="row"><b>$ 26.99</b></div>
                                                            <div class="row text-muted">Be Legandary Lipstick-Nude rose</div>
                                                            <div class="row">Qty:1</div>
                                                        </div>
                                                    </div>
                                                    <div class="row item">
                                                        <div class="col-4 align-self-center"><img class="img-fluid" src="https://i.imgur.com/Ew8NzKr.jpg"></div>
                                                        <div class="col-8">
                                                            <div class="row"><b>$ 19.99</b></div>
                                                            <div class="row text-muted">Be Legandary Lipstick-Sheer Navy Cream</div>
                                                            <div class="row">Qty:1</div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row lower">
                                                        <div class="col text-left">Subtotal</div>
                                                        <div class="col text-right">$ 46.98</div>
                                                    </div>
                                                    <div class="row lower">
                                                        <div class="col text-left">Delivery</div>
                                                        <div class="col text-right">Free</div>
                                                    </div>
                                                    <div class="row lower">
                                                        <div class="col text-left"><b>Total to pay</b></div>
                                                        <div class="col text-right"><b>$ 46.98</b></div>
                                                    </div>
                                                    <div class="row lower">
                                                        <div class="col text-left"><a href="#"><u>Add promo code</u></a></div>
                                                    </div> <button class="btn">Place order</button>
                                                    <p class="text-muted text-center">Complimentary Shipping & Returns</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div> </div>
                                </div>








                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Proceed') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<script>


$(function() {
$('[data-toggle="tooltip"]').tooltip()
})

    display();

    function display() {

        if ($("#french_yes").is(':checked')) {

            $("#register_form").show()
            $("#contact_form").hide()

            if ($("#inlineRadio1").is(':checked')) {
                // show compagnyDataCard
                $("#compagnyDataCard").show();
                $("#siret").attr("required",true);
                $("#socialReason").attr("required",true);
                $("#ape").attr("required",true);
                $("#domiciliation").attr("required",true);
                $("#iban").attr("required",true);
                $("#bic").attr("required",true);

                // show adress card
                $("#adressCard").show();
                $("#invoicingAdress").attr("required",true);
                $("#invoivingZipCode").attr("required",true);
                $("#invoicingCity").attr("required",true);
                $("#invoicingPhoneNumber").attr("required",true);
                $("#deliveryAdressInput").attr("required",true);
                $("#deliveryZipCode").attr("required",true);
                $("#deliveryCity").attr("required",true);

                // show necessary document card
                $("#document").show()
                $("#cgv_signed").attr("required",true);
                $("#rib").attr("required",true);
                $("#kbis").attr("required",true);

                // hide compagny card
                $("#compagny").hide();
                $("#compagnyId").attr("required",false);

                if ($("#sameDeliveryInvoicing").is(':checked')) {
                    //hide delivery adress input because same delivery and invoicing adress
                    $("#deliveryAdress").hide();
                    $("#deliveryAdressInput").attr("required",false);
                    $("#deliveryZipCode").attr("required",false);
                    $("#deliveryCity").attr("required",false);
                    $("#deliveryAdressInput").val($("#invoicingAdress").val());
                    $("#deliveryZipCode").val($("#invoivingZipCode").val());
                    $("#deliveryCity").val($("#invoicingCity").val());
                    console.log($("#deliveryAdressInput").val());


                }else{
                    //show delivery adress input because different delivery and invoicing adress
                    $("#deliveryAdress").show();
                    $("#deliveryAdressInput").attr("required",true);
                    $("#deliveryZipCode").attr("required",true);
                    $("#deliveryCity").attr("required",true);
                    $("#deliveryAdressInput").val("");
                    $("#deliveryZipCode").val("");
                    $("#deliveryCity").val("");
                }

            } else if ($("#inlineRadio2").is(':checked')) {
                //hide compagny data card
                $("#compagnyDataCard").hide();
                $("#siret").attr("required",false);
                $("#socialReason").attr("required",false);
                $("#ape").attr("required",false);
                $("#domiciliation").attr("required",false);
                $("#iban").attr("required",false);
                $("#bic").attr("required",false);

                //hide adress card
                $("#adressCard").hide();
                $("#invoicingAdress").attr("required",false);
                $("#invoivingZipCode").attr("required",false);
                $("#invoicingCity").attr("required",false);
                $("#invoicingPhoneNumber").attr("required",false);
                $("#deliveryAdressInput").attr("required",false);
                $("#deliveryZipCode").attr("required",false);
                $("#deliveryCity").attr("required",false);

                //hide necessary document card
                $("#document").hide()
                $("#cgv_signed").attr("required",false);
                $("#rib").attr("required",false);
                $("#kbis").attr("required",false);

                //show compagny card
                $("#compagny").show();
                $("#compagnyId").attr("required",true);
            }
        } else if($("#french_no").is(':checked')) {
            $("#register_form").hide()
            $("#contact_form").show()
        }



    }
</script>
</div>


@endsection




{{-- le scripte js de Searchbar et filter  --}}
@section('extra-js')
@include('include.SearchItem')
{{-- @include('include.filter') --}}
@endsection

