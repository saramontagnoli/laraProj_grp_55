@extends('layouts.struttura')
@section('content')
    <h1 class="titolo_info">GESTIONE CLIENTI SITO</h1>
    <table class="tabella_noleggi">
    <thead>
    <tr>
        <th>Username</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Data_nascita</th>
        <th>Elimina</th>
    </tr>
    </thead>
    <tbody>
    <!-- Auto presenti nella tabella autoS -->
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
    <!-- è da sistemare questo messaggio d errore -->
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection
