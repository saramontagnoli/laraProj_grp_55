@extends('layouts.struttura')

@section('content')

    <h1 class="titolo_info">GESTIONE F.A.Q.</h1>
    <br>
    <button>Aggiungi F.A.Q.</button>
    <br><br>
    <table class="tabella_noleggi">
    <thead>
    <tr>
        <th>Domanda</th>
        <th>Risposta</th>
        <th>Modifica</th>
        <th>Elimina</th>
    </tr>
    </thead>
    <tbody>
    <!-- Auto presenti nella tabella autoS -->
    @foreach($cardFaq as $faq)
        <tr>
            <td>{{$faq['domanda']}}</td>
            <td>{{$faq['risposta']}}</td>
            <td><a href="">Modifica</a></td>
            <td><a href="" onclick="return confirmDelete()">Elimina</a></td>
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
