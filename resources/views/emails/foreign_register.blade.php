<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demande client entreprise étrangère</title>
</head>
<body>
    <h1>{{__('Demande nouveau client')}}</h1>
    <p>
        {{ $civiliter }} {{ $nom }} {{ $firstName }} de l'entreprise {{ $compagnyName }} basée en {{ $country }} voudrait devenir un client
    </p>
    @if ($messages != "")
        <p>
            la demande est accompagnée d'un message: <br>
                {{$messages}}
        </p>
    @endif
    <p>
        Vous pouvez @if($civiliter == "Monsieur") le @else la @endif contacter au numéro <a href="tel:{{ $phoneNumber }}">{{ $phoneNumber }}</a> ou à l'adresse mail <a href="mailto:{{ $mail }}">{{ $mail }}</a>
    </p>
</body>
</html>
