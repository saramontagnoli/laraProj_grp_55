@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina del catalogo generale delle auto -->
@section('content')
    <br><br>

    <!-- Definizione della form per la visualizzazione dei noleggi in anno corrente per mese -->
    <form method="POST" action="{{ route('visualizzanoleggi') }}">
        @csrf
        <!-- Input per indicare il mese di cui visualizzare i noleggi -->
        <label>
            Inserisci il mese:
            <select name="mese">
                <option value="0"></option>
                <option value="1">Gennaio</option>
                <option value="2">Febbraio</option>
                <option value="3">Marzo</option>
                <option value="4">Aprile</option>
                <option value="5">Maggio</option>
                <option value="6">Giugno</option>
                <option value="7">Luglio</option>
                <option value="8">Agosto</option>
                <option value="9">Settembre</option>
                <option value="10">Ottobre</option>
                <option value="11">Novembre</option>
                <option value="12">Dicembre</option>
            </select>
        </label>
        <!-- Button di submit per estrazione dei dati dei noleggi del mese indicato e anno corrente -->
        <button type="submit" name="action" value="submit">Cerca</button>
    </form>
    <br>
    <table class="tabella_noleggi">
        <thead>
        <tr>
            <th>Targa Auto</th>
            <th>Marca Auto</th>
            <th>Modello Auto</th>
            <th>Data inizio noleggio</th>
            <th>Data fine noleggio</th>
            <th>Utente</th>
        </tr>
        </thead>
        <tbody>
        <!-- Righe della tabella -->
        @foreach($listaNoleggi as $noleggio)
            <tr>
                <td>{{$noleggio['targa']}}</td>
                <td>{{$noleggio['nome_marca']}}</td>
                <td>{{$noleggio['nome_modello']}}</td>
                <td>{{$noleggio['data_inizio']}}</td>
                <td>{{$noleggio['data_fine']}}</td>
                <td>{{$noleggio['username']}}</td>
            </tr>
        @endforeach
        <!-- Altre righe... -->
        </tbody>
    </table>
    <br><br>

@endsection
