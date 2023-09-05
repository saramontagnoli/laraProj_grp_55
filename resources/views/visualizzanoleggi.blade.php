<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina di visualizzazione dei noleggi divisi per mese, con scelta del mese -->
@section('content')

    <!-- Definizione del titolo della visualizzazione dei noleggi divisi per mese -->
    <h1 class="titolo_info">VISUALIZZAZIONE NOLEGGI DIVISI PER MESE</h1>
    <br>

    <!-- Stampa dell'anno corrente, ovvero l'anno di riferimento di visualizzazione -->
    <p style="font-size: 14pt; font-weight: bolder;">Anno corrente di riepilogo: {{$annoCorrente}}</p>

    <!-- Definizione della form per la visualizzazione dei noleggi in anno corrente per mese -->
    <form method="POST" action="{{ route('visualizzanoleggi') }}">
        @csrf
        <!-- Input per indicare il mese di cui visualizzare i noleggi -->
        <label>
            Inserisci il mese:

            <!-- Selezione del mese desiderato -->
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

    <!-- Definizione della tabella di visualizzazione  -->
    <table class="tabella_noleggi">

        <!-- Definizione dell'intestazione della tabella dei noleggi effettuati per un mese specifico -->
        <thead>
        <tr>
            <th>Targa Auto</th> <!-- Targa dell'auto -->
            <th>Marca Auto</th> <!-- Marca dell'auto -->
            <th>Modello Auto</th> <!-- Modello dell'auto -->
            <th>Data inizio noleggio</th> <!-- Data di inizio noleggio -->
            <th>Data fine noleggio</th> <!-- Data di fine noleggio -->
            <th>Utente</th> <!-- Utente che ha noleggiato l'auto -->
        </tr>
        </thead>
        <tbody>
        <!-- Righe della tabella -->
        @foreach($listaNoleggi as $noleggio)
            <tr>
                <td>{{$noleggio['targa']}}</td> <!-- Targa dell'auto -->
                <td>{{$noleggio['nome_marca']}}</td> <!-- Marca dell'auto -->
                <td>{{$noleggio['nome_modello']}}</td> <!-- Modello dell'auto -->
                <td>{{$noleggio['data_inizio']}}</td> <!-- Data di inizio noleggio -->
                <td>{{$noleggio['data_fine']}}</td> <!-- Data di fine noleggio -->
                <td>{{$noleggio['username']}}</td> <!-- Utente che ha noleggiato l'auto -->
            </tr>
        @endforeach
        <!-- Altre righe... -->
        </tbody>
    </table>
    <br><br>

@endsection
