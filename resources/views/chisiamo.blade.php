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
            <br><br>
            <p>Recapito telefonico: +39 340 9381154</p>
            <br><br>
            <p>Dove trovarci: Via Brecce Bianche, 12, 60131 Ancona AN </p> <a class="bottone" href="https://www.google.com/maps/place/Universit%C3%A0+Politecnica+delle+Marche+-+Facolt%C3%A0+di+Ingegneria/@43.6032916,13.4943825,14z/data=!4m10!1m2!2m1!1suniversit%C3%A0+politecnica+delle+marche!3m6!1s0x132d80233dd931ef:0x161719e4f3f5daaf!8m2!3d43.586779!4d13.516595!15sCiR1bml2ZXJzaXTDoCBwb2xpdGVjbmljYSBkZWxsZSBtYXJjaGUiA4gBAZIBCnVuaXZlcnNpdHngAQA!16s%2Fg%2F11gz9y_j2?entry=ttu"> Clicca qui per visionare Google Maps</a>

        </div>
        <!-- Sezione definita per la colonna di destra contenente la descrizione di CHI SIAMO -->
        <div class="colonna colonna2">

            <!-- A capo di spaziatura per l'allineamento del testo -->
            <br><br>
            <!-- Paragrafi descrittivi di CHI SIAMO -->
            <p>Formula Rent s.p.a. nasce nel 1995 per offrire ai clienti il servizio migliore di noleggio auto. L'azienda offre tutti i range di prezzo e di auto presenti sul mercato.</p>
            <p>Le proposte spaziano dalle comuni auto fino alle auto sportive, infatti Formula Rent ha come priorità assoluta il cliente e la qualità del servizio offerto.</p>
            <p>La nostra consolidata esperienza di 28 anni si distingue dalle altre compagnie di noleggio.</p>
            <p>La missione della nostra azienda è quella di fornire un servizio di noleggio veicoli di alta qualità, conveniente ed efficiente.
                Siamo impegnati a soddisfare le esigenze dei nostri clienti offrendo una vasta selezione di auto moderne e ben mantenute, adatte a tutti i tipi di viaggi e preferenze.</p>
            <p>Vogliamo eliminare lo stress e le complicazioni legate alla ricerca del mezzo di trasporto adatto, fornendo un'esperienza di noleggio semplice, trasparente e affidabile.
                Siamo determinati a superare le aspettative dei nostri clienti, offrendo un servizio clienti competente, cordiale e professionale, in modo da garantire un'esperienza di noleggio auto senza problemi e piacevole.</p>
            <p>La nostra missione è anche quella di contribuire alla sostenibilità ambientale fornendo veicoli a bassa emissione inquinante e incoraggiando le pratiche di guida responsabile tra i nostri clienti.
                Con una gestione efficiente e una flotta di veicoli di qualità, vogliamo diventare il partner di fiducia per tutte le esigenze di noleggio auto dei nostri clienti.</p>
            <p>A vostra disposizione è presente un team di specialisti del noleggio, per offrire la miglior assistenza possibile prima, durante e dopo la prenotazione. </p>
            <br><br>

        </div>
    </div>

    <!-- A capo per spaziature e formato della pagina -->
    <br>
@endsection
