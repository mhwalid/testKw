@extends('layouts.app')

  @section('content')

    <div class="row mb-2 mt-4">
      <div id="results"  style="width: 1147px;">
        @foreach ($items as $item)
            <div class=" p-4 d-flex border rounded overflow-hidden flex-md-row mb-4 shadow-sm  " id="test">
              <a href="{{ route('product.show',$item->Id)}}"> <strong class="d-inline-block mb-2 text-primary">{{$item->Caption}}</strong> </a>
              <h5  style="position: absolute; margin-left:991px" class="mb-0"> {{ number_format($item->CostPrice,2)}} €</h5>
            </div>
        @endforeach
        {{ $items->links( "pagination::bootstrap-4") }}
      </div>
      </div>
      <p id="url" style="display: none">  {{ Request::path() }} </p>
      

      @endsection
     

      @section('sidebar')

    @parent
    <nav id="Nav" class="navbar navbar-expand-lg navbar-dark indigo mb-4">
      <a class="navbar-brand" href="#">Navbar</a>
    
      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
      <form  action="{{ route('search')}}" method="POST"  class="form-inline ml-auto" onsubmit="traitForm(a)" id="SearchFrom">
        @csrf
          <div class="md-form my-0">
          <input class="form-control" type="text" placeholder="Search" id="search" name="q"  value="{{ request()->q ?? '' }}">
          </div>
          <button  class="btn btn-outline-white btn-md my-0 ml-sm-2" onclick='showOld(event)'type="text">Search</button>
        </form>
    
      </div>
      <!-- Collapsible content -->
    
    </nav>

       
  @include('include.navbar')


    @endsection

    
    @section('extrajs')
  <script>
    
    function showOld(event)
  {
  
      event.preventDefault()
  }
      

      $(document).on('keyup','#search', function(){
      var  $value = $(this).val();
        
        const url = document.querySelector('#SearchFrom').getAttribute('action');
        var ur = document.querySelector('#url').innerText;
        document.getElementById("SearchFrom").disabled = false;
        
          console.log(ur);
      
        axios.post(`${url}`, {
        value: $value,
        ur: ur,
        items:[]
      })
      .then(function (response) {
        console.log(response.data.data)
         const ret = response.data.data
        let results = document.querySelector('#results')
        results.innerHTML=''
      
        for(let i= 0; i<ret.length; i++){
          let Card= document.createElement('div')
          Card.classList.add('p-4', 'd-flex','border', 'rounded', 'overflow-hidden', 'flex-md-row','mb-4','shadow-sm')
          let titile= document.createElement('a')
          titile.innerHTML = ret[i].Caption
          titile.href = "http://localhost:8000/boutique/"+ret[i].Id
          let  price = document.createElement('h5')
          price.style.position = 'absolute'
          price.style.marginLeft = '991px'
          let n=parseFloat(ret[i].CostPrice)
          price.innerHTML= n.toFixed(2) +" €"
          Card.appendChild(titile)
          Card.appendChild(price)
          results.appendChild(Card)

        }
      })
      .catch(function (error) {
        console.log(error);
      });
    });
      
  </script>
      
  @endsection

     
     
     
      {{-- @push('scripts')

      <script>
        $(document).ready(function() {
            
            $('#search').on('keyup', function() {
              $value = $(this).val();
              getMoreItems(1);
            });
           
        });

        function getMoreItems(page) {
      var search = $('#search').val();
     
      $.ajax({
        type: "GET",
        data: {
          'search_query':search,
         
        },
       // url: "{{ route('product.home') }}" + "?page=" + page,
        success:function(data) {
          console.log(data);
          $('#item_data').html(data);
        }
      });
    }
  </script>

  @endpush --}}