<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="referrer" content="strict-origin" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
  
        @section('sidebar')
        
        @show
    <div>
        
        <div class="container">    
        <main class="py-4">
           
            @yield('content')
          
            {{-- <div class=" @if($items->total()==0) ? alert-danger   @endif }}alert ">
                        @if (request()->input('q'))
                            <h6>{{ $items->total()}} Résultat(s) pour le recherche : {{ request()->q}}</h6>
                        @endif
                </div> --}}
        </main>
    </div>
       
    </div>
    </div>

    @yield('extrajs')
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @stack('scripts')
    
</body>


</html>



{{-- <li><a href="{{route('itembysubFamily',$subcategory->Caption)}}">{{$subcategory->Caption  ?? "ds"}}</a> <a href="{{route('itembyCaption',$Familie->Caption)}} --}}