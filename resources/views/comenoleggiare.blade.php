<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina come noleggiare -->
@section('content')

    <!-- Titolo della pagina COME NOLEGGIARE con icone di profilo -->
    <h2 class="posizione_cx titolo_info"><i class="fa fa-user"></i>&nbsp; IL SITO  &nbsp;<i class="fa fa-user"></i></h2>

    <div class="riga">
        <div class="colonna colonna2">
            <br><br>
            <p>Per poter usufruire del nostro servizio online di noleggio auto è necessario registrarsi alla piattaforma mediante l'apposita form di registrazione.</p>
            <p>Una volta completata la registrazione al sito ed aver effettuato l'accesso alla propria area personale, è possibile noleggiare un'auto specificando il periodo di noleggio.</p>
            <p>Per facilitare la ricerca sono stati predisposti inoltre anche dei filtri di ricerca sia in base al periodo di noleggio, ma anche in base alla fascia di prezzo desiderata, specificando il minimo e il massimo.</p>
            <p>Una volta cliccato il bottone per il noleggio si apre una scheda di avvenuto noleggio che riepiloga tutte le informazioni dell'auto scelta e il periodo in cui si può usufruire del servizio.</p>
            <p>Nella propria area personale (PROFILO) è inoltre possibile modificare tutte le informazioni personali ed aggiornarle in base alle esigenze del cliente stesso.</p>
        </div>

        <div class="colonna colonna1">
            <!-- Immagine di CHI SIAMO -->
            <img src="{{asset("assets/img/ferrari_purosangue.jpg")}}" alt="come noleggiare un'auto" class="immagine_chisiamo">
            <br><br>
        </div>
    </div>

    <!-- A capo per spaziature e formato della pagina -->
    <br>
@endsection

