@extends('layouts.app')

@section('content')
<div class="container">

    <div class="titre">
        <h1 class="titrePrinc row justify-content-center">{{__('Créez votre compte Kw-distribution')}} </h1>
        <p class="row justify-content-center fw-light">{{__('Ce site est exclusivement réservé aux professionnels')}}.</p>
    </div>

    <div class="nationalityChoice">
        <p class="row justify-content-center fw-light">{{__('Entreprise')}} :</p>
        <fieldset class="row justify-content-center">
            <div class="">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="french_compagny" id="french_yes" value="yes" checked="checked" onchange="display()">
                    <label class="form-check-label" for="french_yes">{{ __('Française')}} </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="french_compagny" id="french_no" value="no" onchange="display()">
                    <label class="form-check-label" for="french_no">{{ __('Etrangère')}} </label>
                </div>
            </div>
        </fieldset>
    </div>

    <div id="contact_form">
        <form action="{{ route('register.foreign')}} "  method="POST">
            @csrf

            <div class="row justify-content-center mt-5">

                <div class="col-6" id="registerRequestCard">
                    <div class="formTitle position-relative">
                        <h2 class="textTitle"><span class="titleNumber position-absolute top-100 left-100">1</span>{{__('Contact') }} </h2>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 ">
                            <label for="contact_civility" class="text-md-right">{{ __('Civilité') }} :</label>
                            <select id="contact_civility" name="contact_civility" class="dropdownSelect form-control form-select custom-select" aria-label="Default select example">
                                <option selected value="Monsieur">M.</option>
                                <option value="Madame">Mme.</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="contact_name" class="text-md-right">{{ __('Name') }} :</label>
                            <input id="contact_name" type="text" class="form-control @error('contact_name') is-invalid @enderror" name="contact_name" value="{{ old('contact_name') }}" required autocomplete="name" autofocus>

                            @error('contact_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="contact_firstName" class="text-md-right">{{ __('First Name') }} :</label>
                            <input id="contact_firstName" type="text" class="form-control @error('contact_firstName') is-invalid @enderror" name="contact_firstName" value="{{ old('contact_firstName') }}" required autocomplete="name" autofocus>

                            @error('contact_firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="contact_email" class="text-md-right">{{ __('Email Address') }} :</label>
                            <input id="contact_email" type="email" class="form-control @error('contact_email') is-invalid @enderror" name="contact_email" value="{{ old('contact_email') }}" required autocomplete="email">

                            @error('contact_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="contact_phoneNumber" class="text-md-right">{{ __('Phone Number') }} :</label>
                            <input id="contact_phoneNumber" type="tel" class="form-control @error('phoneNcontact_phoneNumberumber') is-invalid @enderror" name="contact_phoneNumber" required>

                            @error('contact_phoneNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="contact_compagny_name" class="text-md-right">{{ __('Compagny Name') }} :</label>
                            <input id="contact_compagny_name" type="text" class="form-control @error('contact_compagny_name') is-invalid @enderror" name="contact_compagny_name"  value="{{ old('contact_compagny_name') }}" required>

                            @error('contact_compagny_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="contact_country" class="text-md-left">{{ __('Country') }} :</label>
                            <input id="contact_country" type="text" class="form-control @error('contact_country') is-invalid @enderror" value="{{ old('contact_country') }}" name="contact_country" required>

                            @error('contact_country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="contact_message" class="text-md-right">{{ __('Message') }} :</label>
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

            <div class="row justify-content-center">
                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" onclick="display()" class="btn boutton">
                            {{ __('Envoyer') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="register_form">
        <form method="POST"  enctype="multipart/form-data" action="{{ route('register') }}">
            @csrf

            <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-6" id="personalData">
                    <div class="formTitle position-relative">
                        <h2 class="textTitle"><span class="titleNumber position-absolute top-100 left-100">1</span>{{__('Information Personnelles') }} </h2>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="civility" class="text-md-right">{{ __('Civilité') }} :</label>
                            <select id="civility" name="civility" class="dropdownSelect form-control form-select custom-select" aria-label="Default select example">
                                <option selected value="Monsieur">M.</option>
                                <option value="Madame">Mme.</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="name" class="text-md-right">{{ __('Nom') }} :</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="firstName" class="text-md-right">{{ __('Prénom') }} :</label>
                            <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="name" autofocus>

                            @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                    <div class="col-md-12">
                            <label for="email" class="text-md-right">{{ __('Adresse mail') }} :</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Votre e-mail" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="password" class="text-md-right">{{ __('Mot de passe') }} :</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Choississez votre mot de passe" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="password-confirm" class="text-md-right">{{ __('Confirmé mot de passe') }} :</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmez votre mot de passe" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="birthDate" class="text-md-right">{{ __('Date de naissance') }} *:</label>
                            <span style="color: #D6D1C1; font-family: 'Roboto',sans-serif;" class="optionel text-md-left">{{ __('Optionnel') }}</span>
                            <input id="birthDate" type="date" class="form-control @error('birthDate') is-invalid @enderror" name="birthDate" value="{{ old('birthDate') }}">
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="phoneNumber" class="text-md-right">{{ __('Numéro de téléphone') }} :</label>
                            <input id="phoneNumber" type="tel" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" placeholder="ex : 0389121212" required>

                            @error('phoneNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="cellPhoneNumber" class="text-md-right">{{ __('Numéro de portable') }} :</label>
                            <input id="cellPhoneNumber" type="tel" class="form-control @error('cellPhoneNumber') is-invalid @enderror" name="cellPhoneNumber" placeholder="ex : 0689121212" required>

                            @error('cellPhoneNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group form-check">
                        <input type="hidden" name="newsletter" value="0">
                        <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter" value="1" onchange="display()">
                        <label class="col-md-12 col-check-label text-md-left" for="newsletter">{{ __('newsletter')}} </label>
                    </div>

                    <div class="form-group form-check">
                        <input type="hidden" name="haveCustomer" value="0">
                        <input type="checkbox" class="form-check-input" id="haveCustomer" name="haveCustomer" value="1" onchange="display()">
                        <label class="col-md-12 col-check-label text-md-left" for="haveCustomer">{{ __('Est ce que votre entreprise est déja cliente ?')}} </label>
                    </div>
                </div>

                <div class="col-12 col-md-6" id="compagnyDataCard">
                    <div class="formTitle position-relative">
                        <h2 class="textTitle"><span class="titleNumber position-absolute top-100 left-100">2</span>{{__('Information entreprise') }} </h2>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="siret" class="text-md-right">{{ __('Numéro de Siret') }} :</label>
                            <input id="siret" type="text" class="form-control @error('siret') is-invalid @enderror" name="siret" value="{{ old('siret') }}" placeholder="ex : 36252187900034" required autocomplete="" autofocus>

                            @error('siret')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="name" class="text-md-right">{{ __('Forme Juridique') }} :</label>
                            <select id="formeJuridique" name="formeJuridique" class="dropdownSelect form-control form-select custom-select" aria-label="Default select example">
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

                        <div class="col-md-12">
                            <label for="socialReason" class="text-md-right">{{ __('Raison sociale') }} :</label>
                            <input id="socialReason" type="text" class="form-control @error('socialReason') is-invalid @enderror" name="socialReason" value="{{ old('socialReason') }}" placeholder="Nom de votre société" required autofocus>

                            @error('socialReason')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="ape" class="text-md-right">{{ __('APE') }} :</label>
                            <input id="ape" type="text" class="form-control @error('ape') is-invalid @enderror" name="ape" value="{{ old('ape') }}" placeholder="ex : 1234Z" required autofocus>

                            @error('ape')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="mailCompta" class="text-md-right">{{ __('Adresse mail comptabilité') }} :</label>
                            <input id="mailCompta" type="email" class="form-control @error('mailCompta') is-invalid @enderror" name="mailCompta" value="{{ old('mailCompta') }}" placeholder="L'adresse mail de votre service comptabilité" autofocus>

                            @error('mailCompta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="webSite" class="text-md-right">{{ __('Site web') }} *:</label>
                            <span style="color: #D6D1C1; font-family: 'Roboto',sans-serif;" class="optionel text-md-left">{{ __('Optionnel') }}</span>
                            <input id="webSite" type="url" class="form-control @error('webSite') is-invalid @enderror" name="webSite" value="{{ old('webSite') }}" placeholder="https://exemple.com" pattern="https://.*" autofocus>

                            @error('webSite')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <h3 class="col-md-12 text-md-left">{{ __('Coordonnées bancaires') }} :</h3>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="domiciliation" class="text-md-right">{{ __('Domiciliation') }} :</label>
                            <input id="domiciliation" type="text" class="form-control @error('domiciliation') is-invalid @enderror" name="domiciliation" value="{{ old('domiciliation') }}" required autofocus>

                            @error('domiciliation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="iban" class="text-md-right">{{ __('IBAN') }} :</label>
                            <input id="iban" type="text" class="form-control @error('iban') is-invalid @enderror" name="iban" value="{{ old('iban') }}" placeholder="ex : FR1420041010050500013M02606" required autofocus>

                            @error('iban')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="bic" class="text-md-right">{{ __('BIC') }} :</label>
                            <input id="bic" type="text" class="form-control @error('bic') is-invalid @enderror" name="bic" value="{{ old('bic') }}" placeholder="ex : ABNAFRPP" required autofocus>

                            @error('bic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6" id="compagny">

                    <div class="formTitle position-relative">
                        <h2 class="textTitle"><span class="titleNumber position-absolute top-100 left-100">2</span>{{__('Votre entreprise') }} </h2>
                    </div>

                    <div class="form-group row">
                        <p class="italic">
                            L'Id de votre entreprise lui a été fourni lors de son inscription. Si elle ne le possède plus merci de nous contacter.
                        </p>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <label for="compagnyId" class="text-md-right">{{ __('Id de votre entreprise') }} :</label>
                            <input id="compagnyId" type="text" class="form-control @error('compagnyId') is-invalid @enderror" name="compagnyId" value="{{ old('compagnyId') }}" placeholder="ex : 2f776d04-c9f9-11eb-b8bc-0242ac130003" required autofocus>

                            @error('compagnyId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" onclick="display()" class="btn boutton">
                                    {{ __('Envoyer') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-md-6" id="adress">

                    <div class="formTitle position-relative">
                        <h2 class="textTitle"><span class="titleNumber position-absolute top-100 left-100">3</span>{{__('Adresse de facturation') }} </h2>
                    </div>

                    <div class="invoicingAdress">

                        <div class="form-group row">

                            <div class="col-md-12">
                                <label for="invoicingAdress" class="text-md-right">{{ __('Adresse') }} :</label>
                                <input id="invoicingAdress" type="text" class="form-control @error('invoicingAdress') is-invalid @enderror" name="invoicingAdress" value="{{ old('invoicingAdress') }}" placeholder="Votre adresse de facturation" required autofocus>

                                @error('invoicingAdress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <label for="invoicingAdressNext" class="text-md-right">{{ __('Adresse (suite)') }} :</label>
                                <input id="invoicingAdressNext" type="text" class="form-control @error('invoicingAdressNext') is-invalid @enderror" name="invoicingAdressNext" value="{{ old('invoicingAdressNext') }}" autofocus>

                                @error('invoicingAdressNext')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <label for="invoivingZipCode" class="text-md-right">{{ __('Code Postale') }} :</label>
                                <input id="invoivingZipCode" type="text" class="form-control @error('invoivingZipCode') is-invalid @enderror" name="invoivingZipCode" placeholder="ex : 69000" value="{{ old('invoivingZipCode') }}" autofocus required>

                                @error('invoivingZipCode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <label for="invoicingCity" class="text-md-right">{{ __('Ville') }} :</label>
                                <input id="invoicingCity" type="text" class="form-control @error('invoicingCity') is-invalid @enderror" name="invoicingCity" value="{{ old('invoicingCity') }}" autofocus required>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <label for="invoicingPhoneNumber" class="text-md-right">{{ __('Numéro de téléphone') }} :</label>
                                <input id="invoicingPhoneNumber" type="tel" class="form-control @error('invoicingPhoneNumber') is-invalid @enderror" name="invoicingPhoneNumber" placeholder="ex : 0389121212" value="{{ old('invoicingPhoneNumber') }}" autofocus required>

                                @error('invoicingPhoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="delivery">
                        <div class="deliveryTitle">
                            <div class="formTitle position-relative">
                                <h2 class="textTitle">{{__('Adresse de livraison') }} </h2>
                            </div>
                            <div class="form-group form-check">
                                <input type="hidden" name="sameDeliveryInvoicing" value="0">
                                <input type="checkbox" class="form-check-input" id="sameDeliveryInvoicing" name="sameDeliveryInvoicing" value="1" onchange="display()">
                                <label class="col-md-12 col-check-label text-md-left" for="sameDeliveryInvoicing">{{ __('Identique à celle de facturation')}} </label>
                            </div>
                        </div>

                        <div class="deliveryAdress" id="deliveryAdress">

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="deliveryAdressInput" class="text-md-right">{{ __('Adresse') }} :</label>
                                    <input id="deliveryAdressInput" type="text" class="form-control @error('deliveryAdressInput') is-invalid @enderror" name="deliveryAdressInput" placeholder="Adresse de livraison" value="{{ old('deliveryAdressInput') }}" required autofocus>

                                    @error('deliveryAdressInput')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="deliveryAdressNext" class="text-md-right">{{ __('Adresse (Suite)') }} :</label>
                                    <input id="deliveryAdressNext" type="text" class="form-control @error('deliveryAdressNext') is-invalid @enderror" name="deliveryAdressNext" value="{{ old('deliveryAdressNext') }}" autofocus>

                                    @error('deliveryAdressNext')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="deliveryZipCode" class="text-md-right">{{ __('Code Postale') }} :</label>
                                    <input id="deliveryZipCode" type="text" class="form-control @error('deliveryZipCode') is-invalid @enderror" name="deliveryZipCode" value="{{ old('deliveryZipCode') }}" placeholder="ex : 69000" autofocus required>

                                    @error('deliveryZipCode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="deliveryCity" class="text-md-right">{{ __('Ville') }} :</label>
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

                <div class="col-md-6" id="document">

                    <div class="formTitle position-relative">
                        <h2 class="textTitle"><span class="titleNumber position-absolute top-100 left-100">4</span>{{__('Documents') }} </h2>
                    </div>

                    <div class="">
                        <div class="row mb-4">
                            <i>Veuillez télécharger les CGV et nous les transmettre signées via le formulaire ci-dessous</i>
                        </div>

                        <div class="form-group row">
                            <label for="cgv" class="col-md-5 col-form-label text-md-left">{{ __('Condition général de vente') }}</label>
                            <a id="cgv" class="col-md-5 col-form-label text-md-right" href="{{asset('asset/document/kw/Conditions_Generales.pdf')}} " target="_blank">{{ __('Download')}} </a>
                        </div>

                        <div class="form-group row">
                            <label for="cgv_signed" class="col-md-5 col-form-label text-md-left">{{ __('CGV Signed') }} :</label>

                            <label class="buttonFile position-relative">
                                <span class="falseLabel">{{__('Parcourir')}}</span>
                                <input id="cgv_signed" type="file" class="form-control-file @error('cgv_signed') is-invalid @enderror" name="cgv_signed" accept=".pdf" onchange="changeFile(1)" required >
                            </label>
                            <span class="selectFile" id="cgv_doc">{{__('Aucun fichier sélectionné')}}</span>

                            @error('cgv_signed')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="rib" class="col-md-5 col-form-label text-md-left">{{ __('RIB') }} :</label>

                            <label class="buttonFile position-relative">
                                <span class="falseLabel">{{__('Parcourir')}}</span>
                                <input id="rib" type="file" class="form-control-file @error('rib') is-invalid @enderror" name="rib" accept=".pdf" onchange="changeFile(2)" required >
                            </label>
                            <span class="selectFile" id="rib_doc">{{__('Aucun fichier sélectionné')}} </span>

                            @error('rib')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">

                            <label for="kbis" class="col-md-5 col-form-label text-md-left">{{ __('Extrait KBIS / Registre INSEE') }} :</label>

                            <label class="buttonFile position-relative">
                                <span class="falseLabel">{{__('Parcourir')}}</span>
                                <input id="kbis" type="file" class="form-control-file @error('kbis') is-invalid @enderror" name="kbis" accept=".pdf" onchange="changeFile(3)" required />
                            </label>
                            <span class="selectFile" id="kbis_doc">{{__('Aucun fichier sélectionné')}}</span>

                            @error('kbis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" onclick="display()" class="btn boutton">
                                        {{ __('Envoyer') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    display();

    function changeFile(param) {

        if (param == 1) {
            $new_file = $("#cgv_signed").val().replace(/C:\\fakepath\\/i, '');
            $("#cgv_doc").text($new_file)
        }else if (param == 2) {
            $new_file = $("#rib").val().replace(/C:\\fakepath\\/i, '');
            $("#rib_doc").text($new_file)
        }else if (param == 3) {
            $new_file = $("#kbis").val().replace(/C:\\fakepath\\/i, '');
            $("#kbis_doc").text($new_file)
        }


    }

    function display() {

        if ($("#french_yes").is(':checked')) {

            $("#register_form").show();
            $("#contact_form").hide();

            if (!$("#haveCustomer").is(':checked')) {
                // show compagnyDataCard
                $("#compagnyDataCard").show();
                $("#siret").attr("required",true);
                $("#socialReason").attr("required",true);
                $("#ape").attr("required",true);
                $("#domiciliation").attr("required",true);
                $("#iban").attr("required",true);
                $("#bic").attr("required",true);

                // show adress card
                $("#adress").show();
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

            } else if ($("#haveCustomer").is(':checked')) {
                //hide compagny data card
                $("#compagnyDataCard").hide();
                $("#siret").attr("required",false);
                $("#socialReason").attr("required",false);
                $("#ape").attr("required",false);
                $("#domiciliation").attr("required",false);
                $("#iban").attr("required",false);
                $("#bic").attr("required",false);
                $("#mailCompta").attr("required",false);

                //hide adress card
                $("#adress").hide();
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
@endsection
