
@if(isset($Families))
<div   id="rower" class="row1 align-items-center">
    @foreach ($Families as $key => $Familie)
    <li  id="fff" class="nav-item dropdown" style="list-style-type: none;">
        <a   id="catégorie"class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$key}}</a>
        <div  id="tr" class="dropdown-menu pt-0 " aria-labelledby="navbarDropdown">
            <div  id="frf" >
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
 @if(isset($Families))
<div id="visiblemobile">

<nav role="navigation" style="z-index: 8; margin-bottom: 10%;">
    <div id="menuToggle">

      <input  onclick="$('#loupe').hide();  $('#ite8').hide(); $('#ite9').hide();" disabled="disabled" type="checkbox" id="menumobile" />
        <input disabled="disabled" type="hidden" value="true" id="menujs">

      <span></span>
      <span></span>
      <span></span>


      <ul id="menu" style="background-color: #F1ECDF;" role="button" onclick="$('#loupe').hide();  $('#ite8').hide(); $('#ite9').hide();">
        @foreach ($Families as $key => $Familie)
    <li    class="nav-item dropdown" style="list-style-type: none; font-size: 15px;">
        <a  role="button" onclick="$('#loupe').hide();  $('#ite8').hide(); $('#ite9').hide();" id="catégorie"class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$key}}</a>
        <div  id="tr" style="background-color: #D6D1C1;" class="dropdown-menu pt-0 " aria-expanded="false" aria-labelledby="navbarDropdown">
            <div  id="frf" >
                @foreach ($Familie as $item)
                <div   class="row ">
                    <div id="grid">
                    <div id="mot" style="font-size: 15px; " class="dropdown-header " >
                        <a id="lien" style="text-decoration: none; color:#21201B;" href="{{ route('itembyCaption', $item->Id) }}" >{{$item->Caption}}</a></div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </li>
    @endforeach
      </ul>
    </div>
    @endif
  </nav>

</div>
<script>

if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
                document.getElementById("menujs").value = "true";
                console.info( "This page is reloaded" );
            }
    $(function () {
                 $('#menumobile').click(function () {
                    var one=document.getElementById("menujs").value;
                    console.log(one);
                    if(one=='true'){
                        $('#navpour').hide();
                        $('#loupe').hide();
                        $('#ite9').hide();
                        $('#ite8').hide();
                        $('#mv').hide();
                         $('#ty').hide();
                         $('#ty2').hide();
                         $('#parte').hide();
                         console.log(one+"oneeeeee");
                       document.getElementById("menujs").value = "false"
                    }else{

                        $('#loupe').show();
                        $('#ite9').show();
                         $('#ite8').show();
                        $('#mv').show();
                         $('#ty').show();
                         $('#ty2').show();
                         $('#parte').show();
                         console.log(one+"deux");
                         document.getElementById("menujs").value = "true"
                    }

                });
             });

             window.onload = function() {
    window.setTimeout(setDisabled, 1000);
}
function setDisabled() {
    document.getElementById('menumobile').disabled = false;
}



</script>


