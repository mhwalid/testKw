<div id="results" style="width: 1147px; margin-left: 100px;">
    @foreach ($items as $item)

        <div class="border-bottom  overflow-hidden flex-md-row mb-4 @if ($item->RealStock>0) inStock @else noStock @endif " id="test">
            <div>
                <img style="margin-bottom: 8px; width: 80px; height: 60px; "class="img-responsive mr-4"
                src="{{asset('asset/item/images/'.$item->Id.'/Cart1.jpg')}}" alt=" "
                class="bd-placeholder-img"  >
                @if ($item->RealStock>0)
                    <p>En stock <img style=" width: 15px; height: 15px;"   src="{{asset('asset/img/en_stock.svg')}}"></p>
                @else
                    <p>Pas de stock <img style=" width: 15x; height: 15px;"   src="{{asset('asset/img/plus_en_stock.svg')}}"></p>
                @endif

            </div>
            <a id="Catégorie" href="{{ route('product.show', $item->Id) }}"> <strong class="d-inline-block mb-2 text-primary">  {{ $item->Caption }}</strong> </a>
                @auth
                    <h5 style="position: absolute; margin-left:991px" class="mb-0">{{ number_format($item->CostPrice, 2) }}€</h5>
                @endauth
                @if ($item->RealStock>0)
                    <form action="{{ route('cart.store') }}" method="POST" >
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->Id }}">
                        <input type="hidden" name="price" value={{ $item->CostPrice }}>
                        <input type="hidden" name="quantity" value="1">
                        <button style="background-color: #FFD600; border-radius:20px;     padding-right: 0px;   padding-left: 0px;  padding-top: 0px; padding-bottom: 0px; height: 34px; width: 50px; " type="submit" id="panier" class="btn  ">
                            <img style="width: 20px; height:20px; "   class="" src="{{asset('asset/img/Ajouter_au_panier.svg')}}" alt="Certification"></button>
                    </form>
                @else
                @endif


        </div>

    @endforeach
    <p id="pagination" class="rounded-circle">
        @if (isset($_GET["trie"]) && isset($_GET["stock"]))
         {{$items->appends(['stock' => $_GET["stock"]])->appends(['trie' => $_GET["trie"]])->links('pagination::bootstrap-4')}}
        @elseif (isset($_GET["trie"]))
            {{$items->appends(['trie' => $_GET["trie"]])->links('pagination::bootstrap-4')}}
        @elseif (isset($_GET["stock"]))
            {{$items->appends(['stock' => $_GET["stock"]])->links('pagination::bootstrap-4')}}
        @else
            {{$items->links('pagination::bootstrap-4')}}
        @endif
    </p>
</div>
<div class="rounded-circle" id="paginat"></div>
