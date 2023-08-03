<!DOCTYPE html>
<html>
<head>
    <title>Formula Rent</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/home_prova.css')}}">

</head>

<!-- Body della pagina -->
<body>

<!-- Inclusione della navbar del sito dalla vista definita nella cartella layouts -->
@include('layouts/navbar')

<!-- Definizione della sezione riguardante il contenuto della pagina -->
@yield('content')

<!-- Inclusione del footer del sito dalla vista definita nella cartella layouts -->
@include('layouts/footer')

</body>
</html>
