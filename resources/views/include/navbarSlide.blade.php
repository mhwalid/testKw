
@if(isset($Families))
<div    class="row1 align-items-center">
    @foreach ($Families as $key => $Familie)
    <li   class="nav-item dropdown" style="list-style-type: none;">
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
<!--    Made by Erik Terwan    -->
<!--   24th of November 2015   -->
<!--        MIT License        -->
<nav role="navigation" style="z-index: 8; margin-bottom: 10%;">
    <div id="menuToggle">
      <!--
      A fake / hidden checkbox is used as click reciever,
      so you can use the :checked selector on it.
      -->
      <input  onclick="$('#loupe').hide();  $('#ite8').hide(); $('#ite9').hide();" disabled="disabled" type="checkbox" id="menumobile" />
        <input disabled="disabled" type="hidden" value="true" id="menujs">
      <!--
      Some spans to act as a hamburger.

      They are acting like a real hamburger,
      not that McDonalds stuff.
      -->
      <span></span>
      <span></span>
      <span></span>

      <!--
      Too bad the menu has to be inside of the button
      but hey, it's pure CSS magic.
      -->

      <ul id="menu" onclick="$('#loupe').hide();  $('#ite8').hide(); $('#ite9').hide();">
        @foreach ($Families as $key => $Familie)
    <li   class="nav-item dropdown" style="list-style-type: none;">
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


