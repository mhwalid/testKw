@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row ">
            <a href="{{ route('admin.user') }} ">nouveaux client/contact <span class="badge badge-light">{{$new_user}}</span> </a>
        </div>
        <div class="row ">
            <a href="{{ route('admin.banner') }} ">gestion des bannière <img class="col s12" src="{{asset('asset/banner/acceuil.jpg')}}" alt=""></a>
        </div>

        <div class="row ">
            <form {{--action="{{ route('admin.product') }}" method="POST"--}}>
                @csrf
                <label for="search-ean">Recherchez un produit:</label>
                <input   required pattern = "[0-9]{13}" maxlength = '13' type="search" id="search-ean" name="search-ean" value="<?php if(isset($_POST['search-ean'])){
                echo $_POST['search-ean'];}?>">
                <input type="submit" value="Rechercher">
            </form>
        </div>

        <div class="row ">
            <form action="{{ route('admin.allContact') }} " method="GET">
                <label for="search">{{ __('chercher un contact client :') }} </label>
                <input class="search" type="search" name="search" id="search-contact" placeholder="mettre le nom ou le prenom du contact ou le nom de l'entreprise">
                <select name="actif" id="actif">
                    <option value="tout">tout</option>
                    <option value="actif">activer</option>
                    <option value="notActif">désactiver</option>
                </select>
                <input type="submit" value="search">
            </form>
        </div>

        <div class="row ">
            <form action="{{ route('admin.allCustomer') }} " method="GET">
                <label for="search">{{ __('chercher une entreprise :') }} </label>
                <input type="search" name="search" class="search" id="search-customer" placeholder="mettre le nom ou l'Id de l'entreprise">
                <select name="actif" id="actif">
                    <option value="tout">tout</option>
                    <option value="actif">activer</option>
                    <option value="sommeil">en sommeil</option>
                    <option value="pbloque">partiellement bloqué</option>
                    <option value="bloque">bloqué</option>
                    <option value="paiment">default de paiment</option>
                </select>
                <input type="submit" value="search">
            </form>
        </div>

    </div>

@endsection
