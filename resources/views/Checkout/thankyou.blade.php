@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="jumbotron text-center">
                <h1 class="display-3">Merci!</h1>
                <p class="lead"><strong>Votre commande a été traitée avec succès</strong></p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                                <h6 class="mb-0">
                                    Pour télécharger votre facture
                                    <a href="{{ url('generate-invoice') }}" class="btn btn-primary float-right"> Cliquez ici</a>
                                </h6>
                    </div>
                    </div>
                </div>
                <hr>
                <p>
                    Vous rencontrez un problème ? <a href="#">Nous contacter</a>
                </p>
                <p class="lead">
                    <a class="btn btn-primary btn-sm" href="{{ route('product.index') }}" role="button">Continuer vers la
                        boutique</a>
                </p>
            </div>
        </div>
    </div>
@endsection
