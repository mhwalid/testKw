@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Accès rapide
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($families as $family)
                    <a class="dropdown-item" href="#{{ $family->Id}}">{{ $family->Caption}}</a>
                @endforeach
            </div>
          </div>

        <div>
            <form action="{{ route('admin.banner.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="positionBanner" value="acceuil">
                <div class="form-group">
                    <label for="banner">Bannière Accueil</label>
                    <input id="banner" type="file" class="form-control-file" name="banner" accept="image/jpeg" required >
                </div>
                <div class="form-group">
                    <input type="submit" value="update">
                </div>
            </form>
            <img class="col s12" src="{{asset('asset/banner/acceuil.jpg')}}" alt="">
        </div>

        <div>
            <form action="{{ route('admin.banner.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="positionBanner" value="boutique">
                <div class="form-group">
                    <label for="banner">Bannière boutique</label>
                    <input id="banner" type="file" class="form-control-file" name="banner" accept="image/jpeg" required >
                </div>
                <div class="form-group">
                    <input type="submit" value="update">
                </div>
            </form>
            <img class="col s12" src="{{asset('asset/banner/allItem.jpg')}}" alt="">
        </div>

        @foreach ($families as $family)
        <div id="{{ $family->Id}}">
            <form action="{{ route('admin.banner.update.family', $family->Id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="banner">Bannière {{ $family->Caption }}</label>
                    <input id="banner" type="file" class="form-control-file" name="banner" accept="image/jpeg" required >
                </div>
                <div class="form-group">
                    <input type="submit" value="update">
                </div>
            </form>
            <img class="col s12" src="{{asset('asset/banner/'.$family->Id.'.jpg')}}" alt="">
        </div>
        @endforeach

    </div>


@endsection
