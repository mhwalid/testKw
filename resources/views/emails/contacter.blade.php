<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>prise de contact</title>
</head>
<body>
    <h1>{{$reason}}</h1>
    <p>
        {{ $lname }} {{ $fname }} de la société {{ $compagny }} à envoyer un message : <br>
        {{ $msg }}<br>
        Ses coordonner sont : <br>
        téléphone : <a href="tel:{{ $phone }}">{{ $phone }}</a> <br>
        email : <a href="mailto:{{ $email }}">{{ $email }}</a>
    </p>
</body>
</html>
