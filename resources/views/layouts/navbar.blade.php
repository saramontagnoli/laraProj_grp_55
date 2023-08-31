<!-- Barra di navigazione del sito fissata in alto -->
<nav class="navbar">
    <!-- Sezione del sito contenente nome del sito, funge da home button -->
    <div class="posizione_sx">
        <!-- Link cliccabile per la home denominato con il nome del sito -->
        <a href="{{ url('/') }}" class="element_navbar">Formula Rent &nbsp; <i class="fa fa-car"></i></a>
    </div>

    <!-- Opzioni di navigazione del sito sempre disponibili nella barra di navigazione in alto -->
    <div class="posizione_dx">
        <a href="{{ url('/catalogoauto') }}" class="element_navbar ">Auto</a> <!-- Visualizzazione catalogo completo -->
        <a href="{{ url('/comenoleggiare') }}" class="element_navbar ">Come noleggiare</a>  <!-- Visualizzazione metodo di noleggio del sito -->
        <a href="{{ url('/chisiamo') }}" class="element_navbar ">Chi siamo</a> <!-- Visualizzazione informazioni azienda -->
        <a href="{{ url('/faq') }}" class="element_navbar ">F.A.Q.</a> <!-- Visualizzazione di tutte le F.A.Q. -->

        <!-- Se non c'è nessun utente autenticato allora si stampato i due bottoni di login e registrazione -->
        @if (! auth()->check())
            <a href="" class="element_navbar ">Registrazione</a> <!-- Visualizzazione pagina registrazione -->
            <a href="{{url('/login')}}" class="element_navbar">Login</a> <!-- Visualizzazione pagina login -->
        @endif

        <!-- Se l'utente autenticato è uno 'user' allora si stampa un bottone per visualizzare il profilo -->
        @can('isUser')
            <a href="{{url('/home/profilo')}}" class="element_navbar">Profilo</a> <!-- Visualizzazione profilo utente -->
        @endcan

        <!-- Se l'utente autenticato è uno 'staff' allora si stampano i bottoni per la gestione e visualizzazione di auto e noleggi -->
        @can('isStaff')
            <a href="{{url('/home/gestioneauto')}}" class="element_navbar">Gestione auto</a> <!-- Visualizzazione pagina di inserimento, modifica ed eliminazione delle auto -->
            <a href="{{url('/home/visualizzanoleggi')}}" class="element_navbar">Visualizza noleggi</a> <!-- Visualizzazione noleggi per mese dell'anno corrente -->
        @endcan

        @can('isAdmin')
            <a href="{{url('')}}" class="element_navbar">Gestione clienti</a> <!-- Visualizzazione clienti ed eventuale eliminazione -->
            <a href="{{url('')}}" class="element_navbar">Gestione staff</a> <!-- Visualizzazione pagina di inserimento, modifica ed eliminazione dello staff -->
            <a href="{{url('')}}" class="element_navbar">Riepilogo annuo</a> <!-- Visualizzazione totale noleggi per ogni mese dell'anno corrente -->
            <a href="{{url('/homeadmin/gestioneFaq')}}" class="element_navbar">Gestione F.A.Q.</a> <!-- Visualizzazione pagina inserimento, modifica ed elimianzione delle F.A.Q. -->
        @endcan

        <!-- Se una delle tre tipologie di utenti è autenticata si mostra il button per il logout che riporta alla rotta di logout -->
        @auth
            <a href="" class="element_navbar" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endauth
    </div>

</nav>
