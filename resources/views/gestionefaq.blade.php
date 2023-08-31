@extends('layouts.struttura')

@section('content')

    <h1 class="titolo_info">GESTIONE F.A.Q.</h1>
    <br>
    <button class="bottone">Aggiungi F.A.Q.</button>
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
            <td><a href="{{ route('modificadatiFaq', ['codice_faq' => $faq['codice_faq']]) }}" class="tabella_link">Modifica</a></td>
            <td><a href="{{ route('eliminaFaq', ['codice_faq' => $faq['codice_faq']]) }}" class="tabella_link" onclick="return confirmDelete()">Elimina</a></td>
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
