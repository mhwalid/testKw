@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('admin.direction.devalidation.facture') }} " method="POST">
                @csrf
                <label for="search">{{ __('Numéro de facture :') }} </label>
                <input type="text" class="@error('search') is-invalid @enderror" name="search" id="search" placeholder="entrer le numéro de la facture">
                @error('search')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input class="btn btn-danger" type="submit" value="devalider">
            </form>
        </div>
    </div>

@endsection
