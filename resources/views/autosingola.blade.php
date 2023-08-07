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
            <!-- Definizione della sezione della riga -->
            <div class="riga">

                <!-- Definizione della colonna a sinistra -->
                <div class="colonna colonna1 separatorepiccolo">
                    <!-- Targa dell'auto selezionata -->
                    <h1 style="text-align: center" class="titolo_info"><b>{{$auto->targa}}</b></h1>
                    <br>
                    <!-- Immagine dell'auto selezionata -->
                    <img class="immagine_chisiamo" style="padding-left: 70px" src="{{ asset($auto->foto_auto) }}" alt="ImmagineAuto" height="200px">
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

                    <!-- Descrizione dell'allestimento dell'auto -->
                    <div style="background-color:#EFEFEF">
                        <br>
                        <p style="font-weight: bold">Allestimento Auto:</p>
                        <p style="font-size: 14pt">{{$auto->allestimento}}</p>
                        <br>
                    </div>
                    <hr>

                    <!-- Costo dell'auto al giorno -->
                    <div style="background-color:#EFEFEF">
                        <p style="font-weight: bold">Costo/giorno:</p>
                        <p style="font-size: 14pt">{{$auto->costo_giorno}}</p>
                    </div>
                    <hr>

                    <!-- Numero di posti dell'auto -->
                    <div style="background-color:#EFEFEF">
                        <p style="font-weight: bold">Numero di posti:</p>
                        <p style="font-size: 14pt">{{$auto->num_posti}}</p>
                    </div>
                </div>

            </div>
        @endforeach
    @endif
    <br><br><br><br>
@endsection
