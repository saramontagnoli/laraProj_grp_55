@extends('layouts.struttura')

@section('content')

    <!-- Titolo pagina F.A.Q. -->
    <h2 class="posizione_cx titolo_info"><i class="fa fa-question-circle"></i>&nbsp; PAGINA F.A.Q. &nbsp;<i class="fa fa-question-circle"></i></h2>

    <!-- Sezione della pagina della F.A.Q. destinata alla spiegazione di cosa sono le F.A.Q. e quali argomenti riguardano -->
    <div class="posizione_cx margini_testo">
        In questa sezione gli amministratori del sisto cercano di rispondere a tutte le domande più frequenti da parte degli utenti.
        Le domande sono inerenti la modalità di noleggio dei clienti, il noleggio stesso, informazioni sull'azienda e sul team.
    </div>

    <br><br>

    <!-- Varie domande e risposte F.A.Q. -->


    @foreach($data as $faq)
        <!-- Button di apertura della risposta alla domanda 1 -->
        <button class="domanda">{{$faq->domanda}}</button>
        <div class="risposta">
            <p>{{$faq->risposta}}</p>
        </div>

        <br>
    @endforeach

    <script>
        var acc = document.getElementsByClassName("domanda");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>

    <br> <br> <br>

@endsection
