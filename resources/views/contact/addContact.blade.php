@extends('layouts.app')

@section('content')
<div class="container">

    <div class="titre">
        <h1 class="titrePrinc row justify-content-center">{{__('Créez un nouveau contact pour votre entreprise')}} </h1>
    </div>

    <div id="register_form">
        <form method="POST" action="{{ route('contact.compagny.add.contact') }}">
            @csrf
            <input type="hidden" name="customerId" value="{{ Auth::user()->customer->Id}} ">
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-6" id="personalData">
                    <div class="formTitle position-relative">
                        <h2 class="textTitle">{{__('Information Personnelles') }} </h2>
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
                        <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter" value="1" >
                        <label class="col-md-12 col-check-label text-md-left" for="newsletter">{{ __('newsletter')}} </label>
                    </div>

                    <div class="row justify-content-center">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn boutton">
                                    {{ __('Envoyer') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
