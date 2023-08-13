<!-- Barra di navigazione del sito fissata in alto -->
<nav class="navbar">
    <!-- Sezione del sito contenente nome del sito, funge da home button -->
    <div class="posizione_sx">
        <!-- Link cliccabile per la home denominato con il nome del sito -->
        <a href="{{ url('/') }}" class="element_navbar">Formula Rent &nbsp; <i class="fa fa-car"></i></a>
    </div>

    <!-- Opzioni di navigazione del sito sempre disponibili nella barra di navigazione in alto -->
    <div class="posizione_dx">
        <a href="{{ url('/catalogoauto') }}" class="element_navbar ">Auto</a>
        <a href="{{ url('/comenoleggiare') }}" class="element_navbar ">Come noleggiare</a>
        <a href="{{ url('/chisiamo') }}" class="element_navbar ">Chi siamo</a>
        <a href="{{ url('/faq') }}" class="element_navbar ">F.A.Q.</a>
        <a href="" class="element_navbar ">Registrazione</a>
        <a href="{{ url('/login') }}" class="element_navbar ">Login</a>
    </div>
</nav>
