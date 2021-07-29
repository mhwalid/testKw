@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('contact.update') }}" method="POST">
        @csrf
        <div class="col-12 col-md-6" id="personalData">
            <input type="hidden" name="id" value="{{ $contact->Id }} ">
            <input type="hidden" name="status" value="{{ $contact->IsWebContact }} ">
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="name" class="text-md-right">{{ __('Nom') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" @if (old('name') != "")  value="{{ old('name') }}" @else value="{{ $contact->ContactFields_Name }}" @endif required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="firstName" class="text-md-right">{{ __('Prénom') }}</label>
                    <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" @if (old('firstName') != "")  value="{{ old('firstName') }}" @else value="{{ $contact->ContactFields_FirstName }}" @endif required autofocus>

                    @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="phoneNumber" class="text-md-right">{{ __('Téléphone') }}</label>
                    <input id="phoneNumber" type="tel" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" @if (old('phoneNumber') != "")  value="{{ old('phoneNumber') }}" @else value="{{ $contact->ContactFields_Phone }}" @endif   required autofocus>

                    @error('phoneNumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="cellPhoneNumber" class="text-md-right">{{ __('Téléphone Portable') }}</label>
                    <input id="cellPhoneNumber" type="tel" class="form-control @error('cellPhoneNumber') is-invalid @enderror" name="cellPhoneNumber" @if (old('cellPhoneNumber') != "")  value="{{ old('cellPhoneNumber') }}" @else value="{{ $contact->ContactFields_CellPhone }}" @endif placeholder="ex : 0620202020" autofocus>

                    @error('cellPhoneNumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="password" class="text-md-right">{{ __('Nouveau mot de passe') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Choississez votre mot de passe">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="password-confirm" class="text-md-right">{{ __('Confirmé nouveau mot de passe') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmez votre mot de passe">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn boutton">
                            {{ __('Changer') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
