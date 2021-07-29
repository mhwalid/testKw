@extends('layouts.app')
@section('content')

<div class="container-fluid">

    <p class="news">Certification</p>

    <div class="tit" id="divpartenaire" style="display:flex; justify-content: center; align-items: center; ">
        <img id="imgpar"  class="" src="{{asset('asset/img/Certification.svg')}}"
        alt="Certification">
        <h1 class="col-md-5 col-lg-3 col-sm-6 "  id="ecritpar">En plus de certains partenariats, nous sommes<strong> distributeur officiel.</strong>
        Cette preuve de <strong>qualité</strong> est pour nous primordiale, pour répondre au mieux à <strong>vos besoins.</strong></h1>
        <img id="imgpar2"  class="" src="{{asset('asset/img/Certification.svg')}}"
        alt="Certification">
    </div>
<div class="mt-5" style="display: flex; flex-direction: column; align-content: flex-start; justify-content: center; align-items: center;">
<ul style="padding: 0px;">
    <li style="list-style-type: none;"><p>sssss</p>
    </li>
    <li style="list-style-type: none;"><p>sssss</p>
    </li>
    <li style="list-style-type: none;"><p>sssss</p>
    </li>
    <li style="list-style-type: none;"><p>sssss</p>
    </li>
    <li style="list-style-type: none;"><p>sssss</p>
    </li>
</ul>
</div>





</div>



</body>
</html>

@endsection

<style>
    @media screen and (min-width:768px) and (max-width:2600px) {

        #imgpar{
        width: 150px;
         height: 250px;

    }
    #imgpar2{
    display: none;
    }
    #ecritpar{

    width: 600px;
    font-family: 'Roboto', sans-serif;
    font-size: 160%;
}

    }




    @media screen and (min-width: 482px) and (max-width: 768px) {
        #imgpar{
        width: 125px;
         height: 225px;

    }
    #ecritpar{
        font-size: 20px;
    }

    #imgpar2{
    display: none;
    }

    }

    @media screen and (min-width: 0px) and (max-width: 480px) {

        #imgpar2{
    width: 40%;
    margin-bottom: 10%;
    margin-top: 10%;
    }


   #imgpar{
    display: none;
    }

    .tit{
        margin-top: 20%;
    }
    #ecritpar{

        font-size: 15px;

    }

    }


</style>

