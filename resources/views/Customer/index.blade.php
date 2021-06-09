@extends('layouts.app')

@section('content')
    <div class="row">
      @foreach ( $user as $order)
        
        <div class="col-sm-6">
        <div class="card">
          
            <div class="card-body">
              <div class="d-flex justify-content-between">
              <h6 class="card-text ">{{$order->Id}} </h6>
              <h6 class="card-text ">{{number_format($order->TotalDueAmount,2,'.','')}} €</h6>
            </div>
           <em> <h6 class="card-text ">{{  \Carbon\Carbon::parse($order->sysCreatedDate)->format('d/m/Y')}}</h6></em>
            <a href="{{route('Customer.show',$order->DocumentNumber)}}" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      
        @endforeach
        
        </div>
        <p> {{ $user->links('pagination::bootstrap-4') }}</p>
@endsection