@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <p class="news" id="quihaut">Qui sommes-nous?</p>
<div class="d-flex justify-content-center" >

    <p  id="textequi" class="col-3">
    ???????????????????????
    ???????????????????????
    ???????????????????????????????
    ???????????????????????????
    ???????????????????????????
    ????????????????????????
    </p>


<img style="width: 20%; height: 20%;  border-radius: 10%;  "   src="{{asset('asset/img/qui-sommes-nous.png')}}" alt="Connect">
</div>


<div class="d-flex justify-content-center mt-5 mb-5">
    <img  id="quimargin"   src="{{asset('asset/img/date-de-création.png')}}" alt="Connect">
    <img id="quimargin2"   src="{{asset('asset/img/salarié.png')}}" alt="Connect">
</div>
<div class="container-fluid" style="display: flex;
justify-content: center;">
<div id="qui">

<h3 id="tailletextequi">Besoin d'aide</h3>
<h3 id="tailletextequi2"  >Nos équipes répondent à vos questions!</h3>

<button style="margin-top: 8px;" type="submit" class="btn boutton mb-4">Contactez-nous</button>
</div>
</div>




</div>



</body>
</html>

@endsection


