<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina del profilo dell'utente -->
@section('content')

    <!-- Riepilogo del profilo dell'utente loggato -->
    <div class="posizione_cx">
        <img alt="immagine" src="{{asset('assets/img/icona_chisiamo.png')}}"> <!-- Icona del profilo -->
        <h2 style="text-align: center; font-size: x-large">E-mail: {{ Auth::user()->username }}</h2> <!-- Username dell'utente -->
        <h2 style="text-align: center; font-size: x-large">Nome: {{ Auth::user()->nome }}</h2> <!-- Nome dell'utente -->
        <h2 style="text-align: center; font-size: x-large">Cognome: {{ Auth::user()->cognome }}</h2> <!-- Cognome dell'utente -->
        <h2 style="text-align: center; font-size: x-large">Data nascita: {{ Auth::user()->data_nascita }}</h2> <!-- Data nascita dell'utente -->
        <h2 style="text-align: center; font-size: x-large">E-mail: {{ Auth::user()->email }}</h2> <!-- Email dell'utente -->
        <h2 style="text-align: center; font-size: x-large">E-mail: {{ Auth::user()->indirizzo }}</h2> <!-- Indirizzo dell'utente -->


        <div class="posizione_cx">
            <!-- Button di modifica dei dati personali dell'utente autenticato -->
            <a href="{{ route('modificaDatiL1') }}" class="bottone">Modifica dati personali</a>
        </div>

        <br><br>
        <br><br>
    </div>
@endsection
