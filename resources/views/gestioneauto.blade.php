@extends('layouts.struttura')
@section('content')
    <br>
    <a href="{{ route('aggiuntaAuto') }}">Aggiungi Auto</a>

    <br>
    <table class="tabella_noleggi">
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
    <tbody>
    <!-- Auto presenti nella tabella autoS -->
    @foreach($listaAuto as $auto)
        <tr>
            <td>{{$auto['targa']}}</td>
            <td>{{$auto['nome_marca']}}</td>
            <td>{{$auto['nome_modello']}}</td>
            <td>{{$auto['num_posti']}}</td>
            <td>{{$auto['allestimento']}}</td>
            <td>{{$auto['costo_giorno']}}€</td>
            <td><a href="{{ route('getdatiauto', ['codice_auto' => $auto['codice_auto']]) }}">Modifica</a></td>
            <td><a href="{{ route('eliminaauto', ['codice_auto' => $auto['codice_auto']]) }}" onclick="return confirmDelete()">Elimina</a></td>
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
