<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Diagui Shop | Ste maintenance</title>
        <meta name="author" content="@yield('Diagui TOUNKARA')">
        <meta charset="utf-8">
        <link href="{{asset('assets/css/errors.css')}}" rel="stylesheet" />

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{asset('admin/images/logogolden.png')}}" >

    </head>
    <body class="body">
        <img src="{{asset('assets/images/maintenance.png')}}" alt="Diagui Shop" title="Diagui Shop" class="imgcenter" />
        <p class="txtblue">
            Bonjour à tous, nous sommes actuellement en train de faire des mises à jour
            et des améliorations pour rendre votre expérience d'achat encore meilleure.
            <a class="txtyellow">
                Pendant cette période de maintenance, notre application ecommerce est temporairement indisponible.
                 Nous nous excusons pour tout inconvénient que cela pourrait causer, et nous vous invitons à revenir
                 bientôt pour découvrir les nouvelles fonctionnalités et améliorations que nous avons apportées.
            </a>
            Nous sommes impatients de vous servir à nouveau très bientôt.
            <strong class="txtwhite">Diagui Shop</strong>.
        </p>
        <p class="txtwhite"><strong>Merci !</strong> Pour votre visite.</p>
    </body>
</html>
