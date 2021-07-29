<div   id="filter" style="z-index: 2" >

    <div  id="longfilter" >
        {{-- <form style="" action="{{ route('filter') }}" method="POST" class="form-inline ml-auto"
            onsubmit="traitForm(a)" id="filter"> --}}
            <div style=" background-color: #D6D1C1; border-radius: 20px; " class="list-group"   >
                @php
                    $re = explode('_', last(request()->segments()));
                @endphp

                    <div  id="accordionOne" style="  display:flex; flex-direction:column;"  >
                        <ul  style="background-color: #D6D1C1;  border-radius: 20px;     list-style-type: none;"  id="datalist">
                        {{-- Titre --}}

                        <li>
                            <div id="rond" style=" border-radius: 200px; right:19%;"   class="card my-0">
                             <div class="card-header" id="heading">
                              <h4 style="font-family: poppins;" class="mb-0">

                                   <strong> Filtres</strong>

                              </h4>
                            </div>
                          </div>
                        </li>

                    @if(count($marques)>1)
                       <li >
                            <div id="rond"   class="card my-0" >

                             <div  class="card-header"  id="heading">
                              <h5  class="mb-0">
                                <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                                  Marque <i class="fas fa-sort-down ml-2"></i>
                                </button>
                              </h5>
                            </div>

                            <div id="collapse" class="collapse " aria-labelledby="heading" data-parent="#accordionOne">
                              <div class="card-body d-flex flex-column col-12 " >
                                @foreach ($marques as $marque)
                                @if($marque->marque!="")
                                  <label>
                                    <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
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
                        <li >  <div id="rond"   class="card my-0" >
                             <div  class="card-header"  id="headingOne">
                               <h5  class="mb-0">
                                 <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                   Mémoire <i class="fas fa-sort-down ml-2"></i>
                                 </button>
                               </h5>
                             </div>
                             <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionOne">
                               <div class="card-body d-flex flex-column  col-12 " >
                                 @foreach ($memoire as $mem)
                                 @if($mem->memoire!="")
                                   <label>
                                     <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
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
                        <li >  <div id="rond"   class="card my-0" >
                             <div  class="card-header"  id="headingTwo">
                               <h5  class="mb-0">
                                 <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                   Taille écran <i class="fas fa-sort-down ml-2"></i>
                                 </button>
                               </h5>
                             </div>
                             <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionOne">
                               <div class="card-body d-flex flex-column  col-12" >
                                @foreach ($taille_ecran as $ecran)
                                @if($ecran->taille_ecran!="")
                                   <label>
                                     <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                     {{$ecran->taille_ecran}}
                                 </label>
                                 @endif
                                 @endforeach
                               </div>
                             </div>
                           </div></li>
                           @endif
                        {{-- 3 --}}
                        @if(count($ssd)>1)
                        <li >  <div id="rond"   class="card my-0" >
                             <div  class="card-header"  id="headingThree">
                               <h5  class="mb-0">
                                 <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                   SSD <i class="fas fa-sort-down ml-2"></i>
                                 </button>
                               </h5>
                             </div>
                             <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionOne">
                               <div class="  d-flex flex-column col-12 " >
                                @foreach ($ssd as $ss)
                                @if($ss->ssd!="")
                                   <label>
                                     <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
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
                        <li >  <div id="rond"   class="card my-0" >
                             <div  class="card-header" style="background-color: transparent; "  id="headingFour">
                               <h5  class="mb-0">
                                 <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                   OS <i class="fas fa-sort-down ml-2"></i>
                                 </button>
                               </h5>
                             </div>
                             <div id="collapseFour" class="collapse " aria-labelledby="headingFour" data-parent="#accordionOne">
                               <div class="card-body d-flex flex-column  col-12 " >
                                @foreach ($os as $syst)
                                @if($syst->os!="")
                                   <label>
                                     <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
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
                     <li >  <div id="rond"   class="card my-0" >
                          <div  class="card-header"  id="headingFive">
                            <h5  class="mb-0">
                              <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                SSD <i class="fas fa-sort-down ml-2"></i>
                              </button>
                            </h5>
                          </div>
                          <div id="collapseFive" class="collapse " aria-labelledby="headingFive" data-parent="#accordionOne">
                            <div class="card-body d-flex flex-column  col-12 " >
                                @foreach ($chipset as $chip)
                                @if($chip->chipset!="")
                                <label>
                                  <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
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
                      <li >  <div id="rond"   class="card my-0" >
                           <div  class="card-header"  id="headingSix">
                             <h5  class="mb-0">
                               <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                 Famille Processeur <i class="fas fa-sort-down ml-2"></i>
                               </button>
                             </h5>
                           </div>
                           <div id="collapseSix" class="collapse " aria-labelledby="headingSix" data-parent="#accordionOne">
                             <div class="card-body d-flex flex-column  col-12 " >
                                @foreach ($fam_proc as $fam)
                                @if($fam->fam_proc!="")
                                 <label>
                                   <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
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
                      <li >  <div id="rond"   class="card my-0" >
                           <div  class="card-header"  id="headingSeven">
                             <h5  class="mb-0">
                               <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                 Socket processeur <i class="fas fa-sort-down ml-2"></i>
                               </button>
                             </h5>
                           </div>
                           <div id="collapseSeven" class="collapse " aria-labelledby="headingSeven" data-parent="#accordionOne">
                             <div class="card-body d-flex flex-column  col-12 " >
                                @foreach ($sock_proc as $sock)
                                @if($sock->sock_proc!="")
                                 <label>
                                   <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                   {{$sock->sock_proc}}
                               </label>
                               @endif
                               @endforeach
                             </div>
                           </div>
                         </div></li>
                         @endif
                         {{-- 8 --}}
                         @if(count($gpu)>1)
                         <li >  <div id="rond"   class="card my-0" >
                              <div  class="card-header"  id="headingEight">
                                <h5  class="mb-0">
                                  <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    GPU <i class="fas fa-sort-down ml-2"></i>
                                  </button>
                                </h5>
                              </div>
                              <div id="collapseEight" class="collapse " aria-labelledby="headingEight" data-parent="#accordionOne">
                                <div class="card-body d-flex flex-column  col-12" >
                                    @foreach ($gpu as $gp)
                                    @if($gp->gpu!="")
                                    <label>
                                      <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                      {{$gp->gpu}}
                                  </label>
                                  @endif
                                  @endforeach
                                </div>
                              </div>
                            </div></li>
                            @endif
                            {{-- 9 --}}
                            @if(count($puissance)>1)
                            <li >  <div id="rond"   class="card my-0" >
                                 <div  class="card-header"  id="headingNine">
                                   <h5  class="mb-0">
                                     <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                       Puissance <i class="fas fa-sort-down ml-2"></i>
                                     </button>
                                   </h5>
                                 </div>
                                 <div id="collapseNine" class="collapse " aria-labelledby="headingNine" data-parent="#accordionOne">
                                   <div class="card-body d-flex flex-column  col-12 " >
                                    @foreach ($puissance as $pow)
                                    @if($pow->puissance!="")
                                       <label>
                                         <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
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
                               <li >  <div id="rond"   class="card my-0" >
                                    <div  class="card-header"  id="headingTen">
                                      <h5  class="mb-0">
                                        <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                            Fréquence mémoire <i class="fas fa-sort-down ml-2"></i>
                                        </button>
                                      </h5>
                                    </div>
                                    <div id="collapseTen" class="collapse " aria-labelledby="headingTen" data-parent="#accordionOne">
                                      <div class="card-body d-flex flex-column  col-12 " >
                                        @foreach ($frequ_mem as $freq)
                                        @if($freq->frequ_memoire!="")
                                          <label>
                                            <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
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
                                  <li >  <div id="rond"   class="card my-0" >
                                       <div  class="card-header"  id="headingEleven">
                                         <h5  class="mb-0">
                                           <button id="FilterBoutton"  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                               Nombre de barrette <i class="fas fa-sort-down ml-2"></i>
                                           </button>
                                         </h5>
                                       </div>
                                       <div id="collapseEleven" class="collapse " aria-labelledby="headingEleven" data-parent="#accordionOne">
                                         <div class="card-body d-flex flex-column  col-12 " >
                                            @foreach ($nb_barrette as $barrette)
                                            @if($barrette->nb_barrette!="")
                                             <label>
                                               <input  id="checkbox" type="checkbox" class="filter_all disque" value="SSD">
                                               {{$barrette->nb_barrette}}
                                           </label>
                                           @endif
                                           @endforeach
                                         </div>
                                       </div>
                                     </div></li>
                                     @endif
                                     {{-- 12 --}}

                    </ul>
                    <div class="Box">
                    <button style="margin-bottom: 5px;"  id="appliquer" class=" btn  boutton">Appliquer</button>

                    <button id="reinitialiser" onclick='window.location.reload(false)'  class=" btn mb-2 BouttonReinitialiser">Réinitialiser</button>
                        <div class="selected">
                        <button   id="plusinfo" class=" btn  "><i class="fas fa-plus"></i></button>
                        <button  id="moinsinfo"  class=" btn "><img src="{{asset('asset/img/moins.png')}}" alt="rocket_contact"/></button>
                        </div>


                </div>
        {{-- Prix en barre js --}}


<script>
    $('#moinsinfo').hide();
    if (0 == $('#datalist li:hidden').length) {
                $('#plusinfo').hide();
                $('#moinsinfo').hide();
            }





                    $(function () {
                       $('#plusinfo').click(function () {
                           $('#datalist li:hidden').slice(0, 9).show();
                           if ($('#datalist li').length == $('#datalist li:visible').length) {
                               $('#plusinfo').hide();
                               $('#moinsinfo').show();
                           }
                       });
                   });
                   $(function () {
                       $('#moinsinfo').click(function () {
                           $('#datalist li:visible ').slice(3, 11).hide();
                           if ($('#datalist li').length !== $('#datalist li:visible').length) {
                               $('#plusinfo').show();
                              $('#moinsinfo').hide();
                           }
                      });
                   });





  </script>
    </div>
</div>

</div>
</div>
