@extends('layouts.app')


@section('content')

    <div class="container pt-4 pb-4 mt-4 mb-4">
        <div class="col-md-12">
            <a href="{{ route('cart.index') }}" class="btn btn-sm btn-secondary mt-3">Revenir au panier</a>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <h4 class="text-center pt-5">Procéder au paiement</h4>
                    <form action="{{ route('checkout.store') }}" method="POST" class="my-4" id="payment-form">
                        @csrf
                        <div id="card-element">
                            <!-- Elements will create input elements here -->
                        </div>

                        <!-- We'll put the error messages in this element -->
                        <div id="card-errors" role="alert"></div>

                        <button class="btn btn-success btn-block mt-3" id="submit">
                            <i class="fa fa-credit-card" aria-hidden="true"></i> Payer maintenant ({{ $total }}) $
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
