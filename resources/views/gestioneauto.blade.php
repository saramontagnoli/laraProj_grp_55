<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina di gestione delle auto -->
@section('content')
    <br>
    <!-- Button per l'aggiunta di una nuova auto, redirezione alla rotta definita -->
    <a href="{{ route('aggiuntaAuto') }}">Aggiungi Auto</a>

    <br>

    <!-- Definizione della tabella di gestione delle auto -->
    <table class="tabella_noleggi">

        <!-- Definizione dell'intestazione della tabella -->
        <thead>
            <tr>
                <th>Targa</th>
                <th>Marca</th>
                <th>Modello</th>
                <th>Numero Posti</th>
                <th>Allestimento</th>
                <th>Costo Giornaliero</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
        </thead>

        <!-- Definizione del corpo della tabella contenente tutte le auto del catalogo -->
        <tbody>
        <!-- Auto presenti nella tabella autoS -->
        @foreach($listaAuto as $auto)
            <tr>
                <td>{{$auto['targa']}}</td> <!-- Targa dell'auto -->
                <td>{{$auto['nome_marca']}}</td> <!-- Nome della marca dell'auto -->
                <td>{{$auto['nome_modello']}}</td> <!-- Nome del modello dell'auto -->
                <td>{{$auto['num_posti']}}</td> <!-- Numero posti dell'auto -->
                <td>{{$auto['allestimento']}}</td> <!-- Descrizione dell'allestimento dell'auto -->
                <td>{{$auto['costo_giorno']}}€</td> <!-- Costo al giorno dell'auto -->
                <td><a href="{{ route('getdatiauto', ['codice_auto' => $auto['codice_auto']]) }}">Modifica</a></td> <!-- Link di redirezione alla rotta di modifica dell'auto selezionata -->
                <td><a href="{{ route('eliminaauto', ['codice_auto' => $auto['codice_auto']]) }}" onclick="return confirmDelete()">Elimina</a></td> <!-- Link di eliminazione dell'auto selezionata -->
            </tr>
        @endforeach
        </tbody>
    </table>
    <br><br>

    <!-- Stampa di eventuali messaggi che vengono ritornati a questa vista -->
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection
