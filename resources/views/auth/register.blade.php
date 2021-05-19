@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="card" id="personalDataCard">
                            <div class="card-header">{{ __('Personnal Information') }}</div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Civilité') }}*</label>
                                    <div class="col-md-6">
                                        <select id="civilite" class="form-select" aria-label="Default select example">
                                            <option selected value="Monsieur">M.</option>
                                            <option value="Madame">Mme.</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}*</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}*</label>

                                    <div class="col-md-6">
                                        <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

                                        @error('firstName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}*</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}*</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}*</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="birthDate" class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>

                                    <div class="col-md-6">
                                        <input id="birthDate" type="date" class="form-control @error('birthDate') is-invalid @enderror" name="birthDate" value="{{ old('birthDate') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phoneNumber" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}*</label>

                                    <div class="col-md-6">
                                        <input id="phoneNumber" type="tel" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" required>

                                        @error('phoneNumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <fieldset class="form-group row">
                                    <legend class="col-form-label col-sm-2 float-sm-left pt-0">{{ __('Customer')}} : </legend>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="new" checked="checked" onchange="display()">
                                            <label class="form-check-label" for="inlineRadio1">{{ __('new')}} </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="existing" onchange="display()">
                                            <label class="form-check-label" for="inlineRadio2">{{ __('existing')}} </label>
                                        </div>
                                    </div>
                                  </fieldset>


                            </div>
                        </div>

                        <div class="card" id="compagnyDataCard">

                            <div class="card-header">{{ __('Information Societe') }}</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="siret" class="col-md-4 col-form-label text-md-right">{{ __('Siret Number') }}*</label>

                                    <div class="col-md-6">
                                        <input id="siret" type="text" class="form-control @error('siret') is-invalid @enderror" name="siret" value="{{ old('siret') }}" required autocomplete="" autofocus>

                                        @error('siret')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Forme Juridique') }}*</label>
                                    <div class="col-md-6">
                                        <select id="formeJuridique" class="form-select" aria-label="Default select example">
                                            <option selected value="Auto-Entrepreneur">Auto-Entrepreneur</option>
                                            <option value="EURL">EURL</option>
                                            <option value="SARL">SARL</option>
                                            <option value="SAS">SAS</option>
                                            <option value="SA">SA</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="socialReason" class="col-md-4 col-form-label text-md-right">{{ __('Social Reason') }}*</label>
                                    <div class="col-md-6">
                                        <input id="socialReason" type="text" class="form-control @error('socialReason') is-invalid @enderror" name="socialReason" value="{{ old('socialReason') }}" required autofocus>

                                        @error('socialReason')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="ape" class="col-md-4 col-form-label text-md-right">{{ __('APE') }}*</label>
                                    <div class="col-md-6">
                                        <input id="ape" type="text" class="form-control @error('ape') is-invalid @enderror" name="ape" value="{{ old('ape') }}" required autofocus>

                                        @error('ape')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="webSite" class="col-md-4 col-form-label text-md-right">{{ __('WebSite') }}</label>
                                    <div class="col-md-6">
                                        <input id="webSite" type="url" class="form-control @error('webSite') is-invalid @enderror" name="webSite" value="{{ old('webSite') }}" placeholder="https://exemple.com" pattern="https://.*" autofocus>

                                        @error('webSite')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <h6 class="col-md-4 col-form-label text-md-right">{{ __('Bank Details') }} :</h6>
                                </div>

                                <div class="form-group row">
                                    <label for="domiciliation" class="col-md-4 col-form-label text-md-right">{{ __('Domiciliation') }}*</label>
                                    <div class="col-md-6">
                                        <input id="domiciliation" type="text" class="form-control @error('domiciliation') is-invalid @enderror" name="domiciliation" value="{{ old('domiciliation') }}" required autofocus>

                                        @error('domiciliation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="iban" class="col-md-4 col-form-label text-md-right">{{ __('IBAN') }}*</label>
                                    <div class="col-md-6">
                                        <input id="iban" type="text" class="form-control @error('iban') is-invalid @enderror" name="iban" value="{{ old('iban') }}" required autofocus>

                                        @error('iban')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bic" class="col-md-4 col-form-label text-md-right">{{ __('BIC') }}*</label>
                                    <div class="col-md-6">
                                        <input id="bic" type="text" class="form-control @error('bic') is-invalid @enderror" name="bic" value="{{ old('bic') }}" required autofocus>

                                        @error('bic')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card" id="adressCard">
                            <div class="card-header">{{ __('Adresse') }}</div>

                            <div class="card-body">

                                <div class="invoicingAdress">

                                    <div class="form-group row">
                                        <h6 class="col-md-4 col-form-label text-md-right">{{ __('Invoicing Adress') }} :</h6>
                                    </div>

                                    <div class="form-group row">
                                        <label for="invoicingAdress" class="col-md-4 col-form-label text-md-right">{{ __('Adress') }}*</label>
                                        <div class="col-md-6">
                                            <input id="invoicingAdress" type="text" class="form-control @error('invoicingAdress') is-invalid @enderror" name="invoicingAdress" value="{{ old('invoicingAdress') }}" required autofocus>

                                            @error('invoicingAdress')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="invoicingAdressNext" class="col-md-4 col-form-label text-md-right">{{ __('Adress Next') }}</label>
                                        <div class="col-md-6">
                                            <input id="invoicingAdressNext" type="text" class="form-control @error('invoicingAdressNext') is-invalid @enderror" name="invoicingAdressNext" value="{{ old('invoicingAdressNext') }}" autofocus>

                                            @error('invoicingAdressNext')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="invoivingZipCode" class="col-md-4 col-form-label text-md-right">{{ __('Zip Code') }}*</label>
                                        <div class="col-md-6">
                                            <input id="invoivingZipCode" type="text" class="form-control @error('invoivingZipCode') is-invalid @enderror" name="invoivingZipCode" value="{{ old('invoivingZipCode') }}" autofocus required>

                                            @error('invoivingZipCode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="invoicingCity" class="col-md-4 col-form-label text-md-right">{{ __('City') }}*</label>
                                        <div class="col-md-6">
                                            <input id="invoicingCity" type="text" class="form-control @error('invoicingCity') is-invalid @enderror" name="invoicingCity" value="{{ old('invoicingCity') }}" autofocus required>

                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="invoicingPhoneNumber" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}*</label>
                                        <div class="col-md-6">
                                            <input id="invoicingPhoneNumber" type="tel" class="form-control @error('invoicingPhoneNumber') is-invalid @enderror" name="invoicingPhoneNumber" value="{{ old('invoicingPhoneNumber') }}" autofocus required>

                                            @error('invoicingPhoneNumber')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group form-check">
                                        <label class="col-md-6 col-check-label text-md-right" for="sameDeliveryInvoicing">{{ __('using invoicing adress as delivery adress')}} </label>
                                        <input type="checkbox" class="form-check-input col-md-4" id="sameDeliveryInvoicing" name="sameDeliveryInvoicing" value="same" onchange="display()">
                                    </div>

                                </div>

                                <div class="deliveryAdress" id="deliveryAdress">
                                    <div class="form-group row">
                                        <h6 class="col-md-4 col-form-label text-md-right">{{ __('Delivery Adress') }} :</h6>
                                    </div>

                                    <div class="form-group row">
                                        <label for="deliveryAdressInput" class="col-md-4 col-form-label text-md-right">{{ __('Adress') }}*</label>
                                        <div class="col-md-6">
                                            <input id="deliveryAdressInput" type="text" class="form-control @error('deliveryAdressInput') is-invalid @enderror" name="deliveryAdressInput" value="{{ old('deliveryAdressInput') }}" required autofocus>

                                            @error('deliveryAdressInput')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="deliveryAdressNext" class="col-md-4 col-form-label text-md-right">{{ __('Adress Next') }}</label>
                                        <div class="col-md-6">
                                            <input id="deliveryAdressNext" type="text" class="form-control @error('deliveryAdressNext') is-invalid @enderror" name="deliveryAdressNext" value="{{ old('deliveryAdressNext') }}" autofocus>

                                            @error('deliveryAdressNext')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="deliveryZipCode" class="col-md-4 col-form-label text-md-right">{{ __('Zip Code') }}*</label>
                                        <div class="col-md-6">
                                            <input id="deliveryZipCode" type="text" class="form-control @error('deliveryZipCode') is-invalid @enderror" name="deliveryZipCode" value="{{ old('deliveryZipCode') }}" autofocus required>

                                            @error('deliveryZipCode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="deliveryCity" class="col-md-4 col-form-label text-md-right">{{ __('City') }}*</label>
                                        <div class="col-md-6">
                                            <input id="deliveryCity" type="text" class="form-control @error('deliveryCity') is-invalid @enderror" name="deliveryCity" value="{{ old('deliveryCity') }}" autofocus required>

                                            @error('deliveryCity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="card" id="compagny">

                            <div class="card-header">{{ __('Your Compagny') }}</div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="compagnyId" class="col-md-4 col-form-label text-md-right">{{ __('compagnyId') }}*</label>
                                    <div class="col-md-6">
                                        <input id="compagnyId" type="text" class="form-control @error('compagnyId') is-invalid @enderror" name="compagnyId" value="{{ old('compagnyId') }}" required autofocus>

                                        @error('compagnyId')
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
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    display();

    function display() {


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

            // hide compagny card
            $("#compagny").hide();
            $("#compagnyId").attr("required",false);

            if ($("#sameDeliveryInvoicing").is(':checked')) {
                //hide delivery adress input because same delivery and invoicing adress
                $("#deliveryAdress").hide();
                $("#deliveryAdressInput").attr("required",false);
                $("#deliveryZipCode").attr("required",false);
                $("#deliveryCity").attr("required",false);
            }else{
                //show delivery adress input because different delivery and invoicing adress
                $("#deliveryAdress").show();
                $("#deliveryAdressInput").attr("required",true);
                $("#deliveryZipCode").attr("required",true);
                $("#deliveryCity").attr("required",true);
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

            //show compagny card
            $("#compagny").show();
            $("#compagnyId").attr("required",true);
        }
    }
</script>
@endsection
