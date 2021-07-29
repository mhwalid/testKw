<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <p style="font-family: Roboto">
        Bonjour {{ $name }},<br/>
        <br/>
        Vous venez de créer un compte sur KW-DISTRIBUTION. Avant de pouvoir utiliser votre compte, vous devez vérifier que cette adresse e-mail est bien la vôtre en cliquant ici : <a href={{ $url }} >Vérification</a><br/>
        <br/>
        Merci !<br/>
        <br/>
        Cordialement,<br/>
        L’équipe KW-DISTRIBUTION<br/>
        <br/>
        <img src="{{asset('asset/img/kw.jpg')}}" alt="logo kw" style="width: 165px; height: auto;"><br/>
        <a style="padding-left: 14px" href="tel:0486800800" id="footerjaune">04 86 80 08 00</a><br/>
        <span style="padding-left: 14px">12T Avenue Eugène Hénaff,</span> <br/>
        <span style="padding-left: 14px">69120 Vaulx-en-Velin</span> <br/>
    </p>
</body>
</html>
