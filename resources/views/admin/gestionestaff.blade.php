<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina della gestione dei clienti -->
@section('content')

    <!-- Titolo dell pagina dedicata alla gestione dello staff -->
    <h1 class="titolo_info"> GESTIONE STAFF SITO </h1>
    <br>

    <!-- Button di aggiunta di un nuovo membro dello staff, porta alla rotta definita per l'aggiunta -->
    <a href="{{route('aggiuntaStaff')}}" class="bottone">Aggiungi Membro Staff</a>
    <br><br>

    <!-- Definizione della tabella contenente tutti i membri dello staff estratti dal db -->
    <table class="tabella_noleggi">

        <!-- Definizione intestazione della tabella dei membri dello staff -->
        <thead>
            <tr>
                <th>Username</th> <!-- Username -->
                <th>Nome</th> <!-- Nome -->
                <th>Cognome</th> <!-- Cognome -->
                <th>Modifica</th> <!-- Link di modifica dello staff -->
                <th>Elimina</th> <!-- Link di eliminazione dello staff -->
            </tr>
        </thead>

        <!-- Definizione sezione del contenuto della tabella, la tabella conterrà come righe l'insieme dei membri dello staff del sito -->
        <tbody>
            <!-- Vengono scorse stampate tutte le informazioni di ciascun membro dello staff -->
            @foreach($staff as $st)

                <!-- Informazioni dei membri dello staff -->
                <tr>
                    <td>{{$st['username']}}</td> <!-- Username -->
                    <td>{{$st['nome']}}</td> <!-- Nome -->
                    <td>{{$st['cognome']}}</td> <!-- Cognome -->
                    <td><a href="{{ route('getdatistaff', ['id' => $st['id']]) }}" class="tabella_link">Modifica</a></td> <!-- Link di modifica dello staff -->
                    <td><a href="{{ route('eliminaStaff', ['id' => $st['id']]) }}" onclick="return deleteStaff()" class="tabella_link">Elimina</a></td> <!-- Link di eliminazione dello staff con redirezione -->
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>

    <!-- Stampa di eventuali messaggi che vengono rimandati alla vista -->
    @if(session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif
@endsection
