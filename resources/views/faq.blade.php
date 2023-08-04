@extends('layouts.struttura')

@section('content')

    <!-- Titolo pagina F.A.Q. -->
    <h2 class="posizione_cx"><i><i class="fa fa-question-circle"></i>&nbsp; PAGINA F.A.Q. &nbsp;</i><i class="fa fa-question-circle"></i></h2>

    <div class="posizione_cx margini_testo">
        In questa sezione gli amministratori del sisto cercano di rispondere a tutte le domande più frequenti da parte degli utenti.
        Le domande sono inerenti la modalità di noleggio dei clienti, il noleggio stesso, informazioni sull'azienda e sul team.
    </div>

    <br><br>

    <button class="domanda">Domanda 1</button>
    <div class="risposta">
        <p>Risposta 1</p>
    </div>

    <br>

    <button class="domanda">Domanda 2</button>
    <div class="risposta">
        <p>Risposta 2</p>
    </div>

    <br>

    <button class="domanda">Domanda 3</button>
    <div class="risposta">
        <p>Risposta 3</p>
    </div>

    <br>

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
    <br> <br> <br>
    <br> <br> <br>

@endsection
