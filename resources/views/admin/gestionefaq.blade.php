<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina di gestione delle F.A.Q. -->
@section('content')

    <!-- Definizione titolo di gestione delle F.A.Q. -->
    <h1 class="titolo_info">GESTIONE F.A.Q.</h1>
    <br>

    <!-- Definizione button di aggiunta di una nuova F.A.Q. -->
    <a href="{{ route('aggiuntaFaq') }}" class="bottone">Aggiungi F.A.Q.</a>
    <br><br>

    <!-- Definizione della tabella di gestione delle F.A.Q. -->
    <table class="tabella_noleggi">

        <!-- Definizione dell'intestazione della tabella di gestione delle F.A.Q. -->
        <thead>
            <tr>
                <th>Domanda</th> <!-- Domanda della F.A.Q. -->
                <th>Risposta</th> <!-- Risposta della F.A.Q. -->
                <th>Modifica</th> <!-- Link di modifica della F.A.Q. -->
                <th>Elimina</th> <!-- Link di eliminazione della F.A.Q. -->
            </tr>
        </thead>

        <!-- Definizione del corpo della tabella di gestione delle F.A.Q. contenente tutte le F.A.Q. -->
        <tbody>
        <!-- si scorrono tutte le F.A.Q. estratte e vengono inserite nella tabella -->
        @foreach($cardFaq as $faq)
            <tr>
                <td>{{$faq['domanda']}}</td> <!-- Domanda della F.A.Q. -->
                <td>{{$faq['risposta']}}</td> <!-- Risposta della F.A.Q. -->
                <td><a href="{{ route('modificadatiFaq', ['codice_faq' => $faq['codice_faq']]) }}" class="tabella_link">Modifica</a></td> <!-- Link di modifica della F.A.Q., redirezione alla rotta di modifica -->
                <td><a href="{{ route('eliminaFaq', ['codice_faq' => $faq['codice_faq']]) }}" class="tabella_link" onclick="return myFunction2()">Elimina</a></td> <!-- Link di eliminazione della F.A.Q. -->
            </tr>
        @endforeach
        </tbody>
    </table>
    <br><br>

    <!-- Stampa di eventuali messaggi che vengono ritornati alla vista -->
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection
