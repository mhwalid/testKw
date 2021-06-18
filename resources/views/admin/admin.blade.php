@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">
            <a href="{{ route('admin.user') }} ">nouveaux client/contact <span class="badge badge-light">{{$new_user}}</span> </a>
        </div>
        <div class="row ">
            <a href="{{ route('admin.banner') }} ">gestion des bannière <img class="col s12" src="{{asset('asset/banner/Visuel_maquette.jpg')}}" alt=""></a>
        </div>
    </div>

@endsection
