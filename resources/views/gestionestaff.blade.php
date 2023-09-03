@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina della gestione dei clienti -->
@section('content')

    <br>
    <button>Aggiungi Membro Staff</button>
    <br>
    <table class="tabella_noleggi">
        <thead>
        <tr>
            <th>Username</th> <!-- Username -->
            <th>Nome</th> <!-- Nome -->
            <th>Cognome</th> <!-- Cognome -->
            <th>Data_nascita</th> <!-- Data di nascita -->
            <th>Modifica</th> <!-- Data di nascita -->
            <th>Elimina</th> <!-- Link di eliminazione dell'utente -->
        </tr>
        </thead>
        <tbody>
        <!-- Auto presenti nella tabella autoS -->
        @foreach($staff as $st)
            <tr>
                <td>{{$st['username']}}</td>
                <td>{{$st['nome']}}</td>
                <td>{{$st['cognome']}}</td>
                <td>{{$st['data_nascita']}}</td>
                <td><a href="{{ route('getdatistaff', ['id' => $st['id']]) }}" class="tabella_link">Modifica</a></td>
                <td><a href="{{ route('eliminaStaff', ['id' => $st['id']]) }}" onclick="return deleteStaff()" class="tabella_link">Elimina</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br><br>
    <!-- è da sistemare questo messaggio d errore -->
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection
