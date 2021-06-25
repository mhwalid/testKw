@extends('layouts.app')

@section('content')
    <h1>{{$orders->Id}}</h1>
<ul class="list-group">
    @foreach ($orders->oderLine as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center">
         {{$item->DescriptionClear}}
          <span class="badge badge-primary badge-pill">{{number_format($item->PurchasePrice,2,'.','')}}</span>
        </li>
    @endforeach
 </ul>
@endsection