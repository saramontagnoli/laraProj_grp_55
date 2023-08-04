@extends('layouts.struttura')

@section('content')

    <!-- Slideshow automatico di immagini ogni 4 secondi -->
    <div class="slideshow-container">

        <!-- Sezione della prima immagine dello slideshow -->
        <div class="mySlides fade">
            <!-- Prima immagine slideshow -->
            <img src="{{ asset('assets/img/audi_r8.jpg') }}" alt="immagine prima auto" style="width:100%; height: 600px">
        </div>

        <!-- Sezione della seconda immagine dello slideshow -->
        <div class="mySlides fade">
            <!-- Seconda immagine slideshow -->
            <img src="{{ asset('assets/img/lancia_ypsilon.png') }}" alt="immagine seconda auto" style="width:100%; height: 600px">
        </div>

        <!-- Sezione della terza immagine dello slideshow -->
        <div class="mySlides fade">
            <!-- Terza immagine slideshow -->
            <img src="{{ asset('assets/img/bmw_m4.jpg') }}" alt="immagine terza auto" style="width:100%; height: 600px">
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
        <a href="">
            <div class="colonna_click separatore" style="background-color: transparent">
                <!-- Immagine e titolo di COME NOLEGGIARE -->
                <img src="{{asset('assets/img/icona_contatti.jpeg')}}" alt="come noleggiare un'auto" class="imm">
                <h3 class="titolo">COME NOLEGGIARE</h3>
            </div>
        </a>

        <!-- Seconda sezione cliccabile contenente immagine e titolo della colonna -->
        <a href="">
            <div class="colonna_click separatore" style="background-color: transparent">
                <!-- Immagine e titolo di CHI SIAMO -->
                <img src="{{asset('assets/img/icona_chisiamo.png')}}" alt="informazioni sull'azienda" class="imm">
                <h3 class="titolo">CHI SIAMO</h3>
            </div>
        </a>

        <!-- Terza sezione cliccabile contenente immagine e titolo della colonna -->
        <a href="">
            <div class="colonna_click" style="background-color: transparent">
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
