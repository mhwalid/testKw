@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($Custmers as $custmer)
        
        <div class="col-sm-6">
        <div class="card">
          
            <div class="card-body">
              <h5 class="card-title">{{$custmer->Id}}</h5>
              <h5 class="card-title">{{$custmer->UniqueId}}</h5>
              <p class="card-text">{{$custmer->MainDeliveryContact_Email}}</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      
        @endforeach
        </div>
@endsection