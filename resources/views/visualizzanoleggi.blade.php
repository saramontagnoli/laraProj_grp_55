@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina del catalogo generale delle auto -->
@section('content')
    <br><br>
    <form method="POST" action="{{ route('visualizzanoleggi') }}">
        @csrf
        <!-- Input per indicare il mese di cui visualizzare i noleggi -->
        <label>
            Inserisci il mese:
            <select name="mese">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
        </label>
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
        <tr>
            <td>Dati...</td>
            <td>Dati...</td>
            <td>Dati...</td>
            <td>Dati...</td>
            <td>Dati...</td>
            <td>Dati...</td>
        </tr>
        <!-- Altre righe... -->
        </tbody>
    </table>
    <br><br>

@endsection
