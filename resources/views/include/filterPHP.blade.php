<div class="d-flex ml-4">
    <div class="">
        <form  action="{{ route('filter') }}" method="post" class="form-inline ml-auto"  id="filter">
            {{ csrf_field() }}
            <div class="list-group">
                @php
                    
                    $re = explode('_', last(request()->segments()));
                    
                @endphp
               
               
                    <h3>Marque</h3>
                    <div class="list-group-item checkbox">
                        <select name="marque_id" >
                            <option  class=""></option>
                            <option class="filter_all mrq" value="_LG">LG</option>
                            <option class="filter_all mrq" value="_AOC">AOC</option>
                            <option class="filter_all mrq" value="_LENOV">LENOVO</option>
                            <option class="filter_all mrq" value="_ASUS">Asus</option>
                            <option class="filter_all mrq" value="_MSI">Msi</option>
                        </select>
                    </div>
              
                    <h3>Disque</h3>
                    <div class="list-group-item checkbox">
                        <label>
                            
                            <input name="SSD" type="checkbox" class="filter_all disque" value="SSD">
                            SSD
                        </label>
                    </div>
                    <h3>Processeur</h3>
                  
                    <div  class="list-group-item checkbox">
                        <label>
                            <input name="proc[]"  type="checkbox"  value="Pentium">Pentium
                        </label>
                        <label>
                            <input name="proc[]"  type="checkbox"  value="i9"> AMD
                        </label>
                        <label>
                            <input name="proc[]"  type="checkbox"  value="i9"> I9
                        </label>
                        <label>
                            <input name="proc[]"  type="checkbox"  value="i7">  I7
                        </label>
                        <label>
                            <input name="proc[]"  type="checkbox"  value="i5">i5
                        </label>
                        <label>
                            <input name="proc[]"  type="checkbox"  value="i3">i3
                        </label>
                    </div>
                    {{-- <h3>RAM</h3>
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
                    </div> --}}
                    {{-- <h3>Stockage</h3>
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
                    </div> --}}
        

                    {{-- <h3>taille d'écran</h3>
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
                    </div> --}}
                
                    {{-- <h3>RAM</h3>
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
                    </div> --}}
                    {{-- <h3>Type</h3>
                    <div class="list-group-item checkbox">
                        <select>
                            <option selected class="" value="">choose</option>
                            <option class="filter_all CGType" value="GTX">GTX</option>
                            <option class="filter_all CGType" value="GT">GT</option>
                            <option class="filter_all CGType" value="RTX">RTX</option>
                        </select>
                    </div> --}}
             
                    {{-- <h3>Processeur</h3>
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
                    </div> --}}
            <button class="btn btn-success btn-md my-0 ml-sm-2" type="submit">Search</button>
        </form>
    </div>
</div>