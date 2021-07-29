@extends('layouts.app')

@section('content')

<div id="allignlogin">
    <div id="imgordi" style="width: 40%; height: 40%;">
    <img style=" width: 100%; height: 100%; margin-top: 7%;"   src="{{asset('asset/img/connectez-vous2.png')}}" alt="Connect">
    </div>

    <div id=log>
    <p class="news1">Connectez-vous</p>



    <div class="login-dark" style="height: 695px;">
        @if ($errors->any())
                <div class="alert alert-danger">
                   <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <i class="icon ion-ios-locked-outline"></i>
            </div>
            <p class="loge">E-mail :</p>
            <div  class="form-group">
                    <input id="log1" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <p class="loge">Mot de passe :</p>
            <div   class="form-group"><input id="log1" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div style="display:flex; justify-content:center;">
            <div class="form-group col-12" style="display: flex; flex-direction: column; align-items: center;">
                <button class="btn boutton w-75 mb-2">Se connecter</button>
                <a  href="{{ route('register') }}" class="btn boutton w-75 mb-2">Créer un compte</a>
                <div>
                    <a style="color: #FFD600;" href="#"><p class="loge">mot de passe oublié?</p></a>
                </div>
            </div>
            </div>
            {{-- <div id="imgordi2" style="width: 40%; height: 40%;">
                <img style=" width: 100%; height: 100%; "   src="{{asset('asset/img/connectez-vous2.png')}}" alt="Connect">
                </div> --}}
            </form>

    </div>



    </div>

</div>




@endsection
