<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

@section('content')

    <!-- Slideshow automatico di immagini ogni 4 secondi -->
    <div class="slideshow-container">

        <!-- Sezione della prima immagine dello slideshow -->
        <div class="mySlides fade">
            <!-- Prima immagine slideshow -->
            <img src="{{ asset('assets/img/ferrari_portofino.webp') }}" alt="immagine prima auto" class="immaginecarosello">
        </div>

        <!-- Sezione della seconda immagine dello slideshow -->
        <div class="mySlides fade">
            <!-- Seconda immagine slideshow -->
            <img src="{{ asset('assets/img/lancia_ypsilon.png') }}" alt="immagine seconda auto" class="immaginecarosello">
        </div>

        <!-- Sezione della terza immagine dello slideshow -->
        <div class="mySlides fade">
            <!-- Terza immagine slideshow -->
            <img src="{{ asset('assets/img/bmw_m4.jpg') }}" alt="immagine terza auto" class="immaginecarosello">
        </div>

        <!-- Titolo centrato nel carosello con sfondo scuro opaco -->
        <div class="titolo_centrato">
            <h1 class="nomeazienda"><span class="formato_azienda"><b>FR</b></span> <span class="formato_azienda">Formula Rent</span></h1>
        </div>

    </div>
    <br>

    <!-- Puntini di scorrimento delle immagini -->
    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <br> <br>
    <hr>
    <br> <br>

    <!-- Sezione che identifica la riga per le colonne COME NOLEGGIARE, CHI SIAMO e FAQ -->
    <div class="riga">
        <!-- Prima sezione cliccabile contenente immagine e titolo della colonna -->
        <a href="{{ url('/comenoleggiare') }}">
            <div class="colonna colonna_click separatore">
                <!-- Immagine e titolo di COME NOLEGGIARE -->
                <img src="{{asset('assets/img/icona_noleggio.png')}}" alt="come noleggiare un'auto" class="imm">
                <h3 class="titolo">COME NOLEGGIARE</h3>
            </div>
        </a>

        <!-- Seconda sezione cliccabile contenente immagine e titolo della colonna -->
        <a href="{{ url('/chisiamo') }}">
            <div class="colonna colonna_click separatore">
                <!-- Immagine e titolo di CHI SIAMO -->
                <img src="{{asset('assets/img/icona_chisiamo.png')}}" alt="informazioni sull'azienda" class="imm">
                <h3 class="titolo">CHI SIAMO</h3>
            </div>
        </a>

        <!-- Terza sezione cliccabile contenente immagine e titolo della colonna -->
        <a href="{{ url('/faq') }}">
            <div class="colonna colonna_click">
                <!-- Immagine e titolo di FAQ -->
                <img src="{{asset('assets/img/icona_faq.jpg')}}" alt="domande più frequenti" class="imm">
                <h3 class="titolo">F.A.Q.</h3>
            </div>
        </a>
    </div>

    <br> <br>

    <!-- Inclusione dello script JS che permette di far scorrere in automatico le immagini-->
    <script src="{{ asset('assets/js/carosello.js') }}"></script>

@endsection
