@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina della gestione dei clienti -->
@section('content')

    <!-- Titolo della pagina dedicata alla gestione dei clienti da parte dell'admin -->
    <h1 class="titolo_info">GESTIONE CLIENTI SITO</h1>

    <!-- Definizione della tabella contenente tutti i clienti registrati al sito -->
    <table class="tabella_noleggi">

        <!-- Definizione dell'intestazione della tabella con le informazioni dell'utente -->
        <thead>
            <tr>
                <th>Username</th> <!-- Username -->
                <th>Nome</th> <!-- Nome -->
                <th>Cognome</th> <!-- Cognome -->
                <th>Data_nascita</th> <!-- Data di nascita -->
                <th>Elimina</th> <!-- Link di eliminazione dell'utente -->
            </tr>
        </thead>

        <!-- Definizione del contenuto della tabella, righe contenenti tutti i clienti del sito -->
        <tbody>
        <!-- Scorrimento dell'array contenente tutti i cienti estratti -->
        @foreach($clienti as $clie)
            <tr>
                <td>{{$clie['username']}}</td>
                <td>{{$clie['nome']}}</td>
                <td>{{$clie['cognome']}}</td>
                <td>{{$clie['data_nascita']}}</td>
                <td><a href="{{ route('eliminaCliente', ['id' => $clie['id']]) }}" onclick="return deleteCliente()" class="tabella_link">Elimina</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br><br>

    <!-- Messaggio di errore -->
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection
