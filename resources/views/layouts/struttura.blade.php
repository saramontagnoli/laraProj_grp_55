<!DOCTYPE html>
<html lang="it">
<!-- Definizione della struttura della pagina del sito -->

<!-- Definizione della sezione head, contenente il titolo, le inclusioni di fogli di stile e codice javascript -->
<head>
    <title>Formula Rent</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Inclusione di tutti i file CSS esterni -->
    <link rel="stylesheet" href="{{asset('assets/css/style_home.css')}}"> <!-- CSS per lo style della home -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> <!-- CSS per lo style generico del sito -->
    <link rel="stylesheet" href="{{asset('assets/css/catalogo.css')}}"> <!-- CSS per lo style del catalogo -->
    <link rel="stylesheet" href="{{asset('assets/css/style_login.css')}}"> <!-- CSS per lo style del login -->

    <!-- Utilizzo di una libreria esterna per icone inserite nel sito web -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Inclusione di tutti i file JS esterni -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</head>

<!-- Definizione della sezione body del sito -->
<body>

<!-- Inclusione della navbar del sito dalla vista definita nella cartella layouts -->
@include('layouts/navbar')

<!-- Definizione della sezione riguardante il contenuto della pagina -->
@yield('content')

<!-- Inclusione del footer del sito dalla vista definita nella cartella layouts -->
@include('layouts/footer')

</body>
</html>
