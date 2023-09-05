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
            <strong>Sorry!</strong> No Car Found.
        </div>
    <!-- Se non c'è alcun errore si procede a stampare tutte le informazioni dell'auto -->
    @else
        @foreach($cardAuto as $auto)
            <!-- Definizione della sezione della riga -->
            <div class="riga">

                <!-- Definizione della colonna a sinistra -->
                <div class="colonna colonna1 separatorepiccolo">
                    <!-- Targa dell'auto selezionata -->
                    <h1 class="titolo_info"><b>{{$auto->nome_marca}} {{$auto->nome_modello}}</b></h1>
                    <br>
                    <!-- Immagine dell'auto selezionata -->
                    <img class="immagine_chisiamo" style="padding-left: 70px" src="{{ asset($auto->foto_auto )}}" alt="ImmagineAuto" height="200px">
                    <br><br>

                    <!-- Se l'utente autenticato è uno 'user' allora appare il button e i campi per noleggiare l'auto -->
                    @can('isUser')
                        <h3>Per noleggiare l'auto conferma il periodo</h3>

                        <!-- Definizione di una form per inviare il periodo DA - A per il noleggio -->
                        <form method="POST" action="{{url('/catalogoauto/'.$auto->codice_auto.'/noleggio')}}">
                            @csrf

                            <!-- Campo input type=date per l'inserimento dell'inizio del noleggio -->
                            <label>
                                Da:
                                <input class="campo_form" type="date" name="inizioNoleggio" required>
                            </label>

                            <!-- Campo input type=date per l'inserimento della fine del noleggio -->
                            <label>
                                A:
                                <input class="campo_form" type="date" name="fineNoleggio" required>
                            </label>

                            <!-- Button di submit per l'invio dei dati inseriti all'interno della form -->
                            <button type="submit" class="bottone" name="action" value="submit1">Noleggia</button>
                        </form>
                    @endcan
                </div>

                <!-- Definizione della colonna a destra dell'auto, contenente le informazioni dell'auto -->
                <div class="colonna colonna2">
                    <br><br>
                    <br><br>
                    <br><br>
                    <br><br>

                    <!-- Sezione della scheda tecnica dell'auto -->
                    <div style="font-weight: bolder; font-size: xx-large">SCHEDA AUTO</div>
                    <br><br><br>

                    <!-- Targa dell'auto -->
                    <div class="sfondoauto">
                        <br>
                        <p style="font-weight: bold">Targa Auto:</p>
                        <p style="font-size: 14pt">{{$auto->targa}}</p>
                        <br>
                    </div>
                    <hr>

                    <!-- Allestimento dell'auto -->
                    <div class="sfondoauto">
                        <br>
                        <p style="font-weight: bold">Allestimento Auto:</p>
                        <p style="font-size: 14pt">{{$auto ->allestimento}}</p>
                        <br>
                    </div>
                    <hr>

                    <!-- Costo dell'auto al giorno -->
                    <div class="sfondoauto">
                        <p style="font-weight: bold">Costo/giorno:</p>
                        <p style="font-size: 14pt">{{$auto ->costo_giorno}} €</p>
                    </div>
                    <hr>

                    <!-- Numero di posti dell'auto -->
                    <div class="sfondoauto">
                        <p style="font-weight: bold">Numero di posti:</p>
                        <p style="font-size: 14pt">{{$auto->num_posti}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <br><br><br><br>
@endsection
