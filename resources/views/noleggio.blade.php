@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina della conferma di avvenuto noleggio -->
@section('content')

    <!-- Stampa dello username dell'utente loggato per conferma di avvenuto noleggio -->
    <h2 class="titolo_info">{{ Auth::user()->username }} HAI NOLEGGIATO CORRETTAMENTE!</h2>

    <!-- Sezione della pagina che riepiloga i dettagli del noleggio -->
    <div class="posizione_cx">

        <!-- Titolo di riepilogo delle info del noleggio -->
        <p class="titolo_info">Riepilogo auto noleggiata: </p>

        <!-- Stampa delle informazioni del noleggio avvenuto -->
        @foreach($cardAuto as $data)
            <div>
                <p><b>Marca auto:</b>{{$data->nome_marca}}</p> <!--Nome della marca dell'auto noleggiata -->
                <p><b>Modello auto:</b> {{$data->nome_modello}}</p> <!-- Nome del modello dell'auto noleggiata -->
                <p><b>Targa auto:</b> {{$data->targa}}</p> <!-- Targa dell'auto noleggiata -->
                <p><b>Periodo di noleggio: da</b> {{$data->data_inizio}} <b>a</b> {{$data->data_fine}}</p> <!-- Durata del noleggio dell'auto -->
                <p></p>
            </div>
        @endforeach
    </div>
    <br><br>
@endsection
