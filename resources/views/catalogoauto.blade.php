@extends('layouts.struttura')

@section('content')

    <!-- offerte -->
    <div class="row3">
        <div class="column3">
            <a href="" style="text-decoration: none; color:black">
                <div class="card3">
                    <img class="img-offerte" src="{{asset('assets/img/ferrari_purosangue.jpg')}}" alt="IMMAGINE NON DISPONIBILE AL MOMENTO">
                    <div class="container3">
                        <p style="">Auto 1</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="column3">
            <a href="" style="text-decoration: none; color:black">
                <div class="card3">
                    <img class="img-offerte" src="{{asset('assets/img/fiat_punto.jpeg')}}" alt="IMMAGINE NON DISPONIBILE AL MOMENTO">
                    <div class="container3">
                        <p style="">Auto 2</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="column3">
            <a href="" style="text-decoration: none; color:black">
                <div class="card3">
                    <img class="img-offerte" src="{{asset('assets/img/ferrari_portofino.webp')}}" alt="IMMAGINE NON DISPONIBILE AL MOMENTO">
                    <div class="container3">
                        <p style="">Auto 3</p>
                    </div>
                </div>
            </a>
        </div>

    </div>

@endsection
