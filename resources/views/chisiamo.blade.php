@extends('layouts.struttura')

@section('content')

    <h2 class="posizione_cx titolo_info"><i class="fa fa-user"></i>&nbsp; CHI SIAMO?  &nbsp;<i class="fa fa-user"></i></h2>

    <div class="riga">
        <div class="colonna1_chisiamo">
            <!-- Immagine e titolo di COME NOLEGGIARE -->
            <img src="{{asset("assets/img/ferrari_portofino.webp")}}" alt="come noleggiare un'auto" class="immagine_chisiamo">
        </div>

        <div class="colonna2_chisiamo">
            <!-- Immagine e titolo di CHI SIAMO -->
            <p>Formula Rent s.p.a. nasce nel 1995 per offrire ai clienti il servizio migliore di noleggio auto.</p>
            <p>L'azienda offre tutti i range di prezzo e di auto presenti sul mercato.</p>
            <p>Le proposte spaziano dalle comuni auto fino alle auto sportive.</p>
        </div>
    </div>

@endsection
