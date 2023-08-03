@extends('layouts.struttura')

@section('content')

    <!-- Slideshow automatico di immagini ogni 4 secondi -->
    <div class="slideshow-container">

        <!-- Prima immagine dello slideshow -->
        <div class="mySlides fade">
            <img src="{{ asset('assets/img/audi_r8.jpg') }}" style="width:100%; height: 600px">
        </div>

        <!-- Seconda immagine dello slideshow -->
        <div class="mySlides fade">
            <img src="{{ asset('assets/img/lancia_ypsilon.png') }}" style="width:100%; height: 600px">
        </div>

        <!-- Terza immagine dello slideshow -->
        <div class="mySlides fade">
            <img src="{{ asset('assets/img/bmw_m4.jpg') }}" style="width:100%; height: 600px">
        </div>

    </div>
    <br>

    <!-- Puntini di scorrimento delle immagini -->
    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <!-- Inclusione dello script JS che permette di far scorrere in automatico le immagini-->
    <script src="{{ asset('assets/js/carosello.js') }}"></script>
@endsection
