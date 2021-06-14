@if(isset($Families))
<div    class="row1 align-items-center">
    @foreach ($Families as $key => $Familie)
    <li   class="nav-item dropdown" style="list-style-type: none;">
        <a style="font-size: 21px;" id="catégorie"class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$key}}</a>
        <div  id="tr" class="dropdown-menu    pt-0 " aria-labelledby="navbarDropdown">
            <div  id="frf"   >
                @foreach ($Familie as $item)
                <div   class="row ">
                    <div id="grid">
                    <div id="mot" style="font-size: 17px;   " class="dropdown-header " >
                        <a id="lien" style="text-decoration: none;" href="{{ route('itembyCaption', $item->Id) }}" >{{$item->Caption}}</a></div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </li>
    @endforeach
</div>
@endif



