<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina chi siamo -->
@section('content')

    <!-- Titolo della pagina CHI SIAMO con icone di profilo -->
    <h2 class="posizione_cx titolo_info"><i class="fa fa-user"></i>&nbsp; CHI SIAMO?  &nbsp;<i class="fa fa-user"></i></h2>

    <!-- Sezione contenente le due colonne della pagina CHI SIAMO -->
    <div class="riga">

        <!-- Sezione definita per la colonna di sinistra contenente l'immagine di CHI SIAMO -->
        <div class="colonna colonna1">
            <!-- Immagine di CHI SIAMO -->
            <img src="{{asset("assets/img/ferrari_portofino.webp")}}" alt="come noleggiare un'auto" class="immagine_chisiamo">
        </div>
        <!-- Sezione definita per la colonna di destra contenente la descrizione di CHI SIAMO -->
        <div class="colonna colonna2">

            <!-- A capo di spaziatura per l'allineamento del testo -->
            <br><br>
            <!-- Paragrafi descrittivi di CHI SIAMO -->
            <p>Formula Rent s.p.a. nasce nel 1995 per offrire ai clienti il servizio migliore di noleggio auto.</p>
            <p>L'azienda offre tutti i range di prezzo e di auto presenti sul mercato.</p>
            <p>Le proposte spaziano dalle comuni auto fino alle auto sportive.</p>
            <p>Formula Rent ha come priorità il cliente e un servizio di qualità.</p>
            <p>La nostra consolidata esperienza di 28 anni si distingue dalle altre compagnie di noleggio.</p>
            <p>A vostra disposizione è presente un team di specialisti del noleggio, per offrire la miglior assistenza possibile prima, durante e dopo la prenotazione. </p>
        </div>
    </div>

    <!-- A capo per spaziature e formato della pagina -->
    <br>
@endsection
