@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-2">
            <form style="" action="{{ route('filter') }}" method="POST" class="form-inline ml-auto"
                onsubmit="traitForm(a)" id="filter">
                <div class="list-group">
                    @php
                        
                        $re = explode('_', last(request()->segments()));
                        
                    @endphp

                    @if (($re[0] == 'PORT' || $re[0] == 'MON') && !isset($re[1]))
                        <h3>marque</h3>
                        <div class="list-group-item checkbox">
                            <select>
                                <option selected class="" value="_ASUS"></option>
                                @if ($re[0] == 'MON')
                                    <option class="filter_all mrq" value="_LG">LG</option>
                                    <option class="filter_all mrq" value="_AOC">AOC</option>
                                @endif
                                @if ($re[0] == 'PORT')
                                    <option class="filter_all mrq" value="_LENOV">LENOVO</option>
                                @endif
                                <option class="filter_all mrq" value="_ASUS">Asus</option>
                                <option class="filter_all mrq" value="_MSI">Msi</option>
                            </select>
                        </div>
                    @endif


                    @if ($re[0] == 'PORT')
                        <h3>Disque</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                SSD
                                <input type="checkbox" class="filter_all disque" value="SSD">
                            </label>
                        </div>
                        <h3>Processeur</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                I9
                                <input type="checkbox" class="filter_all proc" value="9">
                            </label>
                            <label>
                                I7
                                <input type="checkbox" class="filter_all proc" value="7">
                            </label>
                            <label>
                                i5
                                <input type="checkbox" class="filter_all proc" value="5">
                            </label>
                            <label>
                                i3
                                <input type="checkbox" class="filter_all proc" value="3">
                            </label>
                        </div>
                        <h3>RAM</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                4 Go
                                <input type="checkbox" class="filter_all ram" value="4">
                            </label>
                            <label>
                                8 Go
                                <input type="checkbox" class="filter_all ram" value="8">
                            </label>
                            <label>
                                16 Go
                                <input type="checkbox" class="filter_all ram" value="16">
                            </label>
                        </div>
                        <h3>Stockage</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                256 Go
                                <input type="checkbox" class="filter_all Stockage" value="256">
                            </label>
                            <label>
                                500 Go
                                <input type="checkbox" class="filter_all Stockage" value="500">
                            </label>
                            <label>
                                512 Go
                                <input type="checkbox" class="filter_all Stockage" value="512">
                            </label>
                            <label>
                                1T
                                <input type="checkbox" class="filter_all Stockage" value="1">
                            </label>
                        </div>
                    @endif

                    @if ($re[0] == 'MON')
                        <h3>taille d'écran</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                21"
                                <input type="checkbox" class="filter_all size" value="21">
                            </label>
                            <label>
                                22"
                                <input type="checkbox" class="filter_all size" value="22">
                            </label>
                            <label>
                                23
                                <input type="checkbox" class="filter_all size" value="23">
                            </label>
                            <label>
                                24
                                <input type="checkbox" class="filter_all size" value="24">
                            </label>
                            <label>
                                27
                                <input type="checkbox" class="filter_all size" value="27">
                            </label>
                            <label>
                                32
                                <input type="checkbox" class="filter_all size" value="32">
                            </label>
                        </div>
                    @endif

                    @if ($re[0] == 'CG')
                        <h3>RAM</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                4 Go
                                <input type="checkbox" class="filter_all ram" value="4">
                            </label>
                            <label>
                                8 Go
                                <input type="checkbox" class="filter_all ram" value="8">
                            </label>
                            <label>
                                16 Go
                                <input type="checkbox" class="filter_all ram" value="16">
                            </label>
                        </div>
                        <h3>Type</h3>
                        <div class="list-group-item checkbox">
                            <select>
                                <option selected class="" value="">choose</option>
                                <option class="filter_all CGType" value="GTX">GTX</option>
                                <option class="filter_all CGType" value="GT">GT</option>
                                <option class="filter_all CGType" value="RTX">RTX</option>
                            </select>
                        </div>
                    @endif
                    @if ($re[0] == 'PROC')
                        <h3>Processeur</h3>
                        <div class="list-group-item checkbox">
                            <label>
                                I9
                                <input type="checkbox" class="filter_all proc" value="9">
                            </label>
                            <label>
                                I7
                                <input type="checkbox" class="filter_all proc" value="7">
                            </label>
                            <label>
                                i5
                                <input type="checkbox" class="filter_all proc" value="5">
                            </label>
                            <label>
                                i3
                                <input type="checkbox" class="filter_all proc" value="3">
                            </label>
                        </div>
                    @endif

                    <button class="btn btn-outline-white btn-md my-0 ml-sm-2" style="display: none" onclick='showOld(event)'
                        type="text">Search</button>
            </form>
        </div>
    </div>

    <div class="row mb-2 mt-4">

        <div id="results" style="width: 1147px;">
            @foreach ($items as $item)
                <div class=" p-4 d-flex border rounded overflow-hidden flex-md-row mb-4 shadow-sm  " id="test">
                    <a href="{{ route('product.show', $item->Id) }}"> <strong
                            class="d-inline-block mb-2 text-primary">{{ $item->Caption }}</strong> </a>
                    <h5 style="position: absolute; margin-left:991px" class="mb-0">
                        {{ number_format($item->CostPrice, 2) }}
                        €</h5>
                </div>
            @endforeach
            <p> {{ $items->links('pagination::bootstrap-4') }}</p>
        </div>
        <div id="paginat"></div>

    </div>
    <p id="url" style="display: none"> {{ Request::path() }} </p>


@endsection


@section('sidebar')

    @parent
    <nav id="Nav" class="navbar navbar-expand-lg navbar-dark indigo mb-4">
        <a class="navbar-brand" href="#">Navbar</a>


        <div class="col-4pt-1">
            <a href="{{ route('cart.index') }}"> Panier <span
                    class="badge badge-light badge-pill">{{ Cart::content()->count() }} </span></a>
        </div>
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form action="{{ route('search') }}" method="POST" class="form-inline ml-auto" onsubmit="traitForm(a)"
                id="SearchFrom">
                @csrf
                <div class="md-form my-0">
                    <input class="form-control" type="text" placeholder="Search" id="search" name="q"
                        value="{{ request()->q ?? '' }}">
                </div>
                <button class="btn btn-outline-white btn-md my-0 ml-sm-2" onclick='showOld(event)'
                    type="text">Search</button>
            </form>

        </div>
        <!-- Collapsible content -->

    </nav>
    @include('include.navbar')

@endsection


@section('js')
    <script>
        function showOld(event) {

            event.preventDefault()
        }


        $(document).on('keyup', '#search', function() {
            var $value = $(this).val();
            const url = document.querySelector('#SearchFrom').getAttribute('action');
            var ur = document.querySelector('#url').innerText;
            console.log(url + "sds");
            axios.post(`${url}`, {
                    value: $value,
                    ur: ur,
                    items: []
                })
                .then(function(response) {
                    console.log(response.data.data)
                    const ret = response.data.data
                    let results = document.querySelector('#results')
                    results.innerHTML = ''
                    for (let i = 0; i < ret.length; i++) {
                        let Card = document.createElement('div')
                        Card.classList.add('p-4', 'd-flex', 'border', 'rounded', 'overflow-hidden',
                            'flex-md-row', 'mb-4', 'shadow-sm')
                        let titile = document.createElement('a')
                        titile.innerHTML = ret[i].Caption
                        titile.href = "http://localhost:8000/boutique/" + ret[i].Id
                        let price = document.createElement('h5')
                        price.style.position = 'absolute'
                        price.style.marginLeft = '991px'
                        let n = parseFloat(ret[i].CostPrice)
                        price.innerHTML = n.toFixed(2) + " €"
                        Card.appendChild(titile)
                        Card.appendChild(price)
                        results.appendChild(Card)
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
        });


        $('.filter_all').on('click', function() {
            let ucan = false

            filter_data();

            function filter_data() {
                $('.filter_data');
                var action = 'fetch_data';
                var minimum_price = $('#min_price_hide').val();
                var maximum_price = $('#max_price_hide').val();
                var Stockage = get_filter('Stockage');
                var proc = get_filter('proc');
                var ram = get_filter('ram');
                var disque = get_filter('disque');
                var mrq = get_filter('mrq');
                var CGType = get_filter('CGType');
                var size = get_filter('size');
                const url = document.querySelector('#filter').getAttribute('action');
                var search = document.getElementById("search")
                var ur = document.querySelector('#url').innerText;
                console.log(url);
                axios.post(`${url}`, {
                        action: action,
                        minimum_price: minimum_price,
                        maximum_price: maximum_price,
                        Stockage: Stockage,
                        proc: proc,
                        disque: disque,
                        url: ur,
                        mrq: mrq,
                        search: search,
                        ram: ram,
                        CGType: CGType,
                        size: size,
                    })
                    .then(function(response) {
                        console.log(response.data.data)
                        const ret = response.data.data
                        let results = document.querySelector('#results')
                        console.log(ret)
                        if (ret) {
                            ucan = true
                            results.innerHTML = ''
                            for (let i = 0; i < ret.length; i++) {
                                let Card = document.createElement('div')
                                Card.classList.add('p-4', 'd-flex', 'border', 'rounded', 'overflow-hidden',
                                    'flex-md-row', 'mb-4', 'shadow-sm')
                                let titile = document.createElement('a')
                                titile.innerHTML = ret[i].Caption
                                titile.href = "http://localhost:8000/boutique/" + ret[i].Id
                                let price = document.createElement('h5')
                                price.style.position = 'absolute'
                                price.style.marginLeft = '991px'
                                let n = parseFloat(ret[i].CostPrice)
                                price.innerHTML = n.toFixed(2) + " €"
                                Card.appendChild(titile)
                                Card.appendChild(price)
                                results.appendChild(Card)
                            }

                            if (response.data.total == 0) {
                                let Card = document.createElement('div')
                                Card.classList.add('p-4', 'd-flex', 'border', 'rounded', 'overflow-hidden',
                                    'flex-md-row', 'mb-4', 'shadow-sm', 'bg-danger', 'text-white')
                                let vide = document.createElement('h5')
                                vide.innerHTML = "    Il exite pas dans le Stock  Pour l'instant"
                                Card.appendChild(vide)
                                results.appendChild(Card)
                            }
                        } else {
                            if (ucan) {
                                // location.reload(true)
                            }
                        }

                    })
                    .catch(function(error) {
                        console.log(error.data);
                    });

            };

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.filter_all').click(function() {
                filter_data();
            });

            // $('#price_range').slider({
            //     range: true,
            //     min: 10,
            //     max: 300,
            //     values: [10, 300],
            //     step: 10,
            //     stop: function(event, ui) {
            //         $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            //         $('#min_price_hide').val(ui.values[0]);
            //         $('#max_price_hide').val(ui.values[1]);
            //         filter_data();
            //     }
            // });

        });

    </script>

@stop
