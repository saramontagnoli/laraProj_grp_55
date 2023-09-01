@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina del catalogo generale delle auto -->
@section('content')
    <br><br>

    <br>
    <table class="tabella_noleggi">
        <thead>
        <tr>
            <th>Mese</th>
            <th>Numero auto noleggiate</th>
        </tr>
        </thead>
        <tbody>
        <!-- Righe della tabella -->
        @foreach($listaNoleggi as $noleggio)
            <tr>
                <td>{{$noleggio['targa']}}</td>
                <td>{{$noleggio['nome_marca']}}</td>
            </tr>
        @endforeach
        <!-- Altre righe... -->
        </tbody>
    </table>
    <br><br>

@endsection
