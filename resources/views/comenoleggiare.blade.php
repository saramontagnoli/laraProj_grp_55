<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina come noleggiare -->
@section('content')

    <!-- Titolo della pagina COME NOLEGGIARE con icone di profilo -->
    <h2 class="posizione_cx titolo_info"><i class="fa fa-user"></i>&nbsp; IL SITO  &nbsp;<i class="fa fa-user"></i></h2>

    <div class="riga">
        <div class="colonna colonna2">
            <br><br>
            <p>Per garantire un servizio efficiente e sicuro, è indispensabile registrarsi come cliente presso la nostra azienda. La registrazione è un processo semplice e veloce, che vi consentirà di accedere al nostro completo catalogo auto, con tariffe competitive e senza sorprese. </p>


            <p>Una volta eseguito il login, avrete l'opportunità di filtrare il nostro catalogo auto in base al periodo di noleggio desiderato e alla fascia di prezzo prescelta.
                Potrete scegliere tra un assortimento di veicoli di diverse categorie, dai piccoli city car alle spaziose auto familiari, dai veicoli green a quelli più sportivi. </p>

            <p>Siamo consapevoli che ognuno ha esigenze diverse, per questo ci impegniamo a fornire un catalogo personalizzato, filtrabile sia per periodo di noleggio, sia per fascia di prezzo (min-max).</p>
            <p>Per completare il noleggio desiderato è necessario reinserire le date di interesse per verificare la disponibilità effettiva dell'auto. Si verrà poi rindirizzati ad una pagina di avvenuto noleggio se c'è disponibilità nelle date specificate.</p>
            <p>Una volta completato il noleggio dell'auto si aprirà una scheda di ariepilogo che indica tutte le informazioni dell'auto scelta e il periodo in cui si può usufruire del servizio.</p>
            <p>Nella propria area personale (PROFILO) è inoltre possibile modificare tutte le informazioni personali ed aggiornarle in base alle esigenze del cliente stesso.</p>
        </div>

        <div class="colonna colonna1">
            <!-- Immagine di CHI SIAMO -->
            <img src="{{asset("assets/img/ferrari_purosangue.jpg")}}" alt="come noleggiare un'auto" class="immagine_chisiamo">
            <br><br>
        </div>
    </div>

    <br>
@endsection

