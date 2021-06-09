@if(isset($Families))
<div  class="row1 align-items-center">
    @foreach ($Families as $key => $Familie)
    <li class="nav-item dropdown" style="list-style-type: none;">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$key}}</a>
        <div class="dropdown-menu pt-0" aria-labelledby="navbarDropdown">
            <div class="d-flex  flex-column  flex-sm-row p-3">
                @foreach ($Familie as $item) 
                <div class="row">
                    <div class="dropdown-header" > <a
                        href="{{ route('itembyCaption', $item->Id) }}" >{{$item->Caption}} </a></div>
                    @foreach ($item->subFamily as $items) 
                    <a class="dropdown-item" href="{{ route('itembysubFamily', $items->Id) }}" >{{$items->Caption}}</a>
                     @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </li>
    @endforeach
</div>
@endif
