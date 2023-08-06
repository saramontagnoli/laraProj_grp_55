<!DOCTYPE html>
<html lang="it">
<head>
    <title>Formula Rent</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/css/style_home.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/catalogo.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
