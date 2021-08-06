

<div style=" background-color: #D6D1C1; border-radius: 20px;" class="list-group"   >
<input type="hidden" id="FamilyId" name="FamilyId" value="{{$res[0]}}">
<div   style="  display:flex; flex-direction:column;"  >
    <ul  style="background-color: #D6D1C1;  border-radius: 20px;     list-style-type: none;"  class="datalist">
    {{-- Titre --}}
      <li  > 
        <div id="rond" style=" border-radius: 200px; "   class="card my-0">
          <div class="card-header" id="heading1">
            <h4 lass="mb-0">
                <strong> Filtres</strong>
            </h5>
          </div>
        </div>
      </li>
        <input type="hidden" name="url" value="{{URL::current()}}">
    @if(count($marques)>1)
        <li >  <div id="rond" style="border-radius: 200px;  "  class="card my-0" >
            <div  class="card-header"  id="heading">
              <h5  class="mb-0">
                <button id="FilterBoutton"  class="btn btn-link collapsed"  type="button" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapse">
                  Marque <i class="fas fa-sort-down ml-2"></i>
                </button>
              </h5>
            </div>
            <div id="collapse" class="collapse " aria-labelledby="heading" data-parent="#accordion">
              <div class="card-body d-flex flex-column col-12 " >
                @foreach ($marques as $marque)
                @if($marque->marque!="")
                  <label>
                    <input      type="checkbox"  @if (old('checkbox')) checked="checked" @endif class="filter_all " name="marque[]" value="{{$marque->marque}}">
                    {{$marque->marque}}
                </label>
                @endif
                @endforeach
              </div>
            </div>
          </div>
        </li>
    @endif
      {{-- 1 --}}
    @if(count($memoire)>1)
      <li >  <div id="rond" style="border-radius: 200px;  "  class="card my-0" >
          <div  class="card-header"  id="headingOne">
            <h5  class="mb-0">
              <button id="FilterBoutton"  class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Mémoire <i class="fas fa-sort-down ml-2"></i>
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body d-flex flex-column  col-12 " >
              @foreach ($memoire as $mem)
              @if($mem->memoire!="")
                <label>
                  <input  id="check" type="checkbox"  @if (old('checkbox')) checked="checked" @endif class="filter_all " name="memoire[]" value="{{$mem->memoire}}">
                  {{$mem->memoire}}
              </label>
              @endif
              @endforeach
            </div>
          </div>
        </div></li>
    @endif
      {{-- 2 --}}

    @if(count($taille_ecran)>1)
      <li >  <div id="rond" style="border-radius: 200px;  "  class="card my-0" >
          <div  class="card-header"  id="headingTwo">
            <h5  class="mb-0">
              <button id="FilterBoutton"  class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Taille écran <i class="fas fa-sort-down ml-2"></i>
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body d-flex flex-column  col-12" >
              @foreach ($taille_ecran as $ecran)
              @if($ecran->taille_ecran!="")
                <label>
                  <input   type="checkbox"  @if (old('checkbox')) checked="checked" @endif class="filter_all " name="taille_ecran[]" value="{{$ecran->taille_ecran}}">
                  {{$ecran->taille_ecran}}"
              </label>
              @endif
              @endforeach
            </div>
          </div>
        </div></li>
    @endif
      {{-- 3 --}}
    @if(count($ssd)>1)
      <li >  <div id="rond" style="border-radius: 200px;  "  class="card my-0" >
          <div  class="card-header"  id="headingThree">
            <h5  class="mb-0">
              <button id="FilterBoutton"  class="btn btn-link collapsed"  type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                SSD <i class="fas fa-sort-down ml-2"></i>
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordion">
            <div class="  d-flex flex-column col-12 " >
              @foreach ($ssd as $ss)
              @if($ss->ssd!="")
                <label>
                  <input   type="checkbox"  @if (old('checkbox')) checked="checked" @endif class="filter_all" name="ssd[]" value="{{$ss->ssd}}">
                  {{$ss->ssd}}
              </label>
              @endif
              @endforeach
            </div>
          </div>
        </div></li>
    @endif
    {{-- 4 --}}
    @if(count($os)>1)
      <li >  <div id="rond" style="border-radius: 200px;  "  class="card my-0" >
          <div  class="card-header" style="background-color: transparent;" id="headingFour">
            <h5  class="mb-0">
              <button id="FilterBoutton"  class="btn btn-link collapsed"  type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFive">
                OS <i class="fas fa-sort-down ml-2"></i>
              </button>
            </h5>
          </div>
          <div id="collapseFour" class="collapse " aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body d-flex flex-column  col-12 " >
              @foreach ($os as $syst)
              @if($syst->os!="")
                <label>
                  <input   type="checkbox"  @if (old('checkbox')) checked="checked" @endif class="filter_all " name="os[]" value="{{$syst->os}}">
                  {{$syst->os}}
              </label>
              @endif
              @endforeach
            </div>
          </div>
        </div></li>
    @endif
  {{-- 5 --}}
    @if(count($chipset)>1)
    <li >  <div id="rond" style="border-radius: 200px;  "  class="card my-0" >
        <div  class="card-header"  id="headingFive">
          <h5  class="mb-0">
            <button id="FilterBoutton"  class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              Chipset <i class="fas fa-sort-down ml-2"></i>
            </button>
          </h5>
        </div>
        <div id="collapseFive" class="collapse " aria-labelledby="headingFive" data-parent="#accordion">
          <div class="card-body d-flex flex-column  col-12 " >
              @foreach ($chipset as $chip)
              @if($chip->chipset!="")
              <label>
                <input   type="checkbox"  @if (old('checkbox')) checked="checked" @endif class="filter_all " name="chipset[]" value="{{$chip->chipset}}">
                {{$chip->chipset}}
            </label>
            @endif
            @endforeach
          </div>
        </div>
      </div></li>
    @endif
    {{-- 6 --}}
    @if(count($fam_proc)>1)
    <li >  <div id="rond" style="border-radius: 200px;  "  class="card my-0" >
        <div  class="card-header"  id="headingSix">
          <h5  class="mb-0">
            <button id="FilterBoutton"  class="btn btn-link collapsed"type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Processeur <i class="fas fa-sort-down ml-2"></i>
            </button>
          </h5>
        </div>
        <div id="collapseSix" class="collapse " aria-labelledby="headingSix" data-parent="#accordion">
          <div class="card-body d-flex flex-column  col-12 " >
              @foreach ($fam_proc as $fam)
              @if($fam->fam_proc!="")
              <label>
                <input   type="checkbox"  @if (old('checkbox')) checked="checked" @endif class="filter_all" name="fam_proc[]" value="{{$fam->fam_proc}}">
                {{$fam->fam_proc}}
            </label>
            @endif
            @endforeach
          </div>
        </div>
      </div></li>
      @endif
    {{-- 7 --}}
    @if(count($sock_proc)>1)
      <li >  <div id="rond" style="border-radius: 200px;  "  class="card my-0" >
        <div  class="card-header"  id="headingSeven">
          <h5  class="mb-0">
            <button id="FilterBoutton"  class="btn btn-link collapsed"  type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">Socket processeur <i class="fas fa-sort-down ml-2"></i>
            </button>
          </h5>
        </div>
        <div id="collapseSeven" class="collapse " aria-labelledby="headingSeven" data-parent="#accordion">
          <div class="card-body d-flex flex-column  col-12 " >
              @foreach ($sock_proc as $sock)
              @if($sock->sock_proc!="")
              <label>
                <input   type="checkbox"  @if (old('checkbox')) checked="checked" @endif class="filter_all" name="sock_proc[]" value="{{$sock->sock_proc}}">
                {{$sock->sock_proc}}
            </label>
            @endif

            @endforeach
          </div>
        </div>
        </div>
      </li>
    @endif
      {{-- 8 --}}
    @if(count($gpu)>1)
      <li >  <div id="rond" style="border-radius: 200px;  "  class="card my-0" >
            <div  class="card-header"  id="headingEight">
              <h5  class="mb-0">
                <button id="FilterBoutton"  class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                  GPU <i class="fas fa-sort-down ml-2"></i>
                </button>
              </h5>
            </div>
            <div id="collapseEight" class="collapse " aria-labelledby="headingEight" data-parent="#accordion">
              <div class="card-body d-flex flex-column  col-12" >
                  @foreach ($gpu as $gp)
                  @if($gp->gpu!="")
                  <label>
                    <input   type="checkbox"  @if (old('checkbox')) checked="checked" @endif class="filter_all " name="gpu" value="{{$gp->gpu}}">
                    {{$gp->gpu}}
                </label>
                @endif
                @endforeach
              </div>
            </div>
          </div>
          </li>
    @endif
          {{-- 9 --}}
    @if(count($puissance)>1)
          <li >  <div id="rond" style="border-radius: 200px;  "  class="card my-0" >
              <div  class="card-header"  id="headingNine">
                <h5  class="mb-0">
                  <button id="FilterBoutton"  class="btn btn-link collapsed"  type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                    Puissance <i class="fas fa-sort-down ml-2"></i>
                  </button>
                </h5>
              </div>
              <div id="collapseNine" class="collapse " aria-labelledby="headingNine" data-parent="#accordion">
                <div class="card-body d-flex flex-column  col-12 " >
                  @foreach ($puissance as $pow)
                  @if($pow->puissance!="")
                    <label>
                      <input   type="checkbox"  @if (old('checkbox')) checked="checked" @endif class="filter_all" name="puissance[]" value="{{$pow->puissance}}">
                      {{$pow->puissance}}
                  </label>
                  @endif
                  @endforeach
                </div>
              </div>
            </div></li>
    @endif
            {{-- 10 --}}
    @if(count($frequ_mem)>1)
            <li >  <div id="rond" style="border-radius: 200px;  "  class="card my-0" >
                  <div  class="card-header"  id="headingTen">
                    <h5  class="mb-0">
                      <button id="FilterBoutton"  class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                          Fréquence mémoire <i class="fas fa-sort-down ml-2"></i>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTen" class="collapse " aria-labelledby="headingTen" data-parent="#accordion">
                    <div class="card-body d-flex flex-column  col-12 " >
                      @foreach ($frequ_mem as $freq)
                      @if($freq->frequ_memoire!="")
                        <label>
                          <input   type="checkbox"  @if (old('frequ_mem')) checked="checked" @endif class="filter_all" name="frequ_mem[]" value="{{$freq->frequ_memoire}}">
                          {{$freq->frequ_memoire}}
                      </label>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div></li>
    @endif
                {{-- 11 --}}
    @if(count($nb_barrette)>1)
                  <li >  <div id="rond" style="border-radius: 200px;  "  class="card my-0" >
                    <div  class="card-header"  id="headingEleven">
                      <h5  class="mb-0">
                        <button id="FilterBoutton"  class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                            Nombre de barrette <i class="fas fa-sort-down ml-2"></i>
                        </button>
                      </h5>
                    </div>
                    <div id="collapseEleven" class="collapse " aria-labelledby="headingEleven" data-parent="#accordion">
                      <div class="card-body d-flex flex-column  col-12 " >
                          @foreach ($nb_barrette as $barrette)
                          @if($barrette->nb_barrette!="")
                          <label>
                            <input   type="checkbox"  @if (old('checkbox')) checked="checked" @endif class="filter_all" name="nb_barrette[]" value="{{$barrette->nb_barrette}}">
                            {{$barrette->nb_barrette}}
                        </label>
                        @endif
                        @endforeach
                      </div>
                    </div>
                  </div>
                  </li>
    @endif
</ul>

  <div class="Box">


    <button style="margin-bottom: 5px;"  type="submit" id="reponse" class=" btn   Boutton">Appliquer</button>
    <a href="{{route('itembyCaption' ,$res[0])}}" class="btn mb-2 BouttonReinitialiser">Réinitialiser</a>
        
  </div>
</div>
</div>




