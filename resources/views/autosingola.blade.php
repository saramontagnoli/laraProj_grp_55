<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina della singola auto -->
@section('content')
    <!-- Formattazione dello spazio verticale -->
    <br>

    <!-- Button indietro che permette di tornare al catalogo generale delle auto -->
    <a href="{{ route('catalogoauto') }}" class="bottone">&laquo; INDIETRO </a>

    <!-- Se non sono stati trovati i dati dell'auto -->
    @if(count($cardAuto) < 1)
        <!-- Viene stampato un messaggio di errore -->
        <div>
            <strong>Sorry!</strong> No Product Found.
        </div>

    <!-- Se non c'è alcun errore si procede a stampare tutte le informazioni dell'auto -->
    @else
        @foreach($cardAuto as $auto)
            <!-- Definizione della sezione della riga -->
            <div class="riga">

                <!-- Definizione della colonna a sinistra -->
                <div class="colonna colonna1 separatorepiccolo">
                    <!-- Targa dell'auto selezionata -->
                    <h1 class="titolo_info"><b>{{$auto['nome_marca']}} {{$auto['nome_modello']}}</b></h1>
                    <br>
                    <!-- Immagine dell'auto selezionata -->
                    <img class="immagine_chisiamo" style="padding-left: 70px" src="{{ asset($auto['foto_auto']) }}" alt="ImmagineAuto" height="200px">
                    <br><br>
                    <a href="{{ url('/catalogoauto/'.$auto['codice_auto'].'/noleggio') }}" class="bottone">Noleggia </a>
                </div>

                <!-- Definizione della colonna a destra -->
                <div class="colonna colonna2">
                    <br><br>
                    <br><br>
                    <br><br>
                    <br><br>

                    <!-- Sezione della scheda tecnica dell'auto -->
                    <div style="font-weight: bolder; font-size: xx-large">SCHEDA AUTO</div>
                    <br><br><br>

                    <!-- Descrizione della targa dell'auto -->
                    <div class="sfondoauto">
                        <br>
                        <p style="font-weight: bold">Targa Auto:</p>
                        <p style="font-size: 14pt">{{$auto['targa']}}</p>
                        <br>
                    </div>
                    <hr>

                    <!-- Descrizione dell'allestimento dell'auto -->
                    <div class="sfondoauto">
                        <br>
                        <p style="font-weight: bold">Allestimento Auto:</p>
                        <p style="font-size: 14pt">{{$auto['allestimento']}}</p>
                        <br>
                    </div>
                    <hr>

                    <!-- Costo dell'auto al giorno -->
                    <div class="sfondoauto">
                        <p style="font-weight: bold">Costo/giorno:</p>
                        <p style="font-size: 14pt">{{$auto['costo_giorno']}} €</p>
                    </div>
                    <hr>

                    <!-- Numero di posti dell'auto -->
                    <div class="sfondoauto">
                        <p style="font-weight: bold">Numero di posti:</p>
                        <p style="font-size: 14pt">{{$auto['num_posti']}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <br><br><br><br>
@endsection
