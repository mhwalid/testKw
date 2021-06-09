@extends('layouts.app')
@section('content')

<div class="container contact-form">
    <div class="contact-image">
        <img src="{{asset('asset/img/kw.png')}}" alt="rocket_contact"/>
    </div>
    <form method="post">
        <h3>Laissez-nous un message</h3>
       <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="txtName" class="form-control" placeholder="Votre Nom *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="txtEmail" class="form-control" placeholder="Votre Email *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="Telephone" class="form-control" placeholder="Votre Numero De Telephone *" value="" />
                </div>
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btnContact" value="Envoyez Message" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea name="txtMsg" class="form-control" placeholder="Votre Message *" style="width: 100%; height: 150px;"></textarea>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection


