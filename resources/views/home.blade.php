@extends('layouts.struttura')

@section('content')

<div class="slideshow-container">

    <div class="mySlides fade">
        <img src="{{ asset('assets/img/audi_r8.jpg') }}" style="width:100%; height: 600px">
    </div>

    <div class="mySlides fade">
        <img src="{{ asset('assets/img/lancia_ypsilon.png') }}" style="width:100%; height: 600px">
    </div>

    <div class="mySlides fade">
        <img src="{{ asset('assets/img/bmw_m4.jpg') }}" style="width:100%; height: 600px">
    </div>

</div>
<br>

<div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>

<script src="{{ asset('assets/js/carosello.js') }}"></script>
@endsection
