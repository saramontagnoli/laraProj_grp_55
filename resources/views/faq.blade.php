@extends('layouts.struttura')

@section('content')

    <h2>PAGINA F.A.Q.</h2>
    <p>In questa sezione gli amministratori del sisto cercano di rispondere a tutte le domande più frequenti da parte degli utenti.</p>
    <button class="accordion">Domanda 1</button>
    <div class="panel">
        <p>Risposta 1</p>
    </div>

    <br>

    <button class="accordion">Domanda 2</button>
    <div class="panel">
        <p>Risposta 2</p>
    </div>

    <br>

    <button class="accordion">Domanda 3</button>
    <div class="panel">
        <p>Risposta 3</p>
    </div>

    <br>

    <script>
        var acc = document.getElementsByClassName("accordion");
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
