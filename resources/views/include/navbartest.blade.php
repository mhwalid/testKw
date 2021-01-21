
 
  <div class="nav">
  
      <div class="body">
        <ul>
          @foreach($Families as $Familie)
          
          <li><i class="fas fa-home icon"></i> <a href="{{route('itembyCaption',$Familie->Id)}}">{{count($Familie->subFamily)}}</a> </li>
         
              @if(count($Familie->subFamily))
              <li> 
          <ul>
              @foreach($Familie->subFamily as $subcategory)
              <li><a href="{{route('itembysubFamily',$subcategory->Id )}}">{{$subcategory->Caption  ?? "ds"}}</a>
              </li>
              @endforeach
             </ul>
            </li>
              @endif
            
            @endforeach
        </ul>
        
      </div>
    </div>
  </div>

  