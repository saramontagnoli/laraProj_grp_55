<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina delle F.A.Q. -->
@section('content')

    <!-- Titolo pagina F.A.Q. -->
    <h2 class="posizione_cx titolo_info"><i class="fa fa-question-circle"></i>&nbsp; PAGINA F.A.Q. &nbsp;<i class="fa fa-question-circle"></i></h2>

    <!-- Sezione della pagina della F.A.Q. destinata alla spiegazione di cosa sono le F.A.Q. e quali argomenti riguardano -->
    <div class="posizione_cx margini_testo">
        In questa sezione gli amministratori del sisto cercano di rispondere a tutte le domande più frequenti da parte degli utenti.
        Le domande sono inerenti la modalità di noleggio dei clienti, il noleggio stesso, informazioni sull'azienda e sul team.
    </div>

    <br><br>

    <!-- Sezione delle varie domande e risposte F.A.Q. -->

    <!-- Per ogni elemento estratto dal database stampo lo slot per la domanda e lo slot nascosto per la risposta -->
    @foreach($data as $faq)
        <!-- Button di apertura della risposta alla domanda -->
        <button class="domanda">{{$faq->domanda}}</button>
        <!-- Sezione nascosta della risposta, verrà visualizzata dopo il click sulla domanda -->
        <div class="risposta">
            <p>{{$faq->risposta}}</p>
        </div>
        <!-- A capo di spaziatura per la formattazione della pagina delle F.A.Q. -->
        <br>
    @endforeach

    <!-- Inclusione dello script JS che permette di cliccare sulla domande e far apparire la risposta -->
    <script src="{{ asset('assets/js/faq.js') }}"></script>


    <br> <br> <br>

@endsection
