<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina della singola auto -->
@section('content')
    <!-- Formattazione dello spazio verticale -->
    <br>

    <!-- Button indietro che permette di tornare al catalogo generale delle auto -->
    <a href="{{url('/catalogoauto')}}" class="buttonindietro">&laquo; INDIETRO </a>

    <!-- Se non sono stati trovati i dati dell'auto -->
    @if(count($data) < 1)
        <!-- Viene stampato un messaggio di errore -->
        <div>
            <strong>Sorry!</strong> No Product Found.
        </div>

    <!-- Se non c'è alcun errore si procede a stampare tutte le informazioni dell'auto -->
    @else
        @foreach($data as $auto)
            <p> Targa: {{$auto->targa}} </p>

            <p> Allestimento: {{$auto->allestimento}} </p>
        @endforeach
    @endif
    <br><br><br><br>
@endsection
