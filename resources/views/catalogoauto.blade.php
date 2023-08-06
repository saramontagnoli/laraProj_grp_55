@extends('layouts.struttura')

@section('content')

    <!-- Sezione dedicata al catalogo delle auto noleggiabili -->
    <div class="rigacatalogo">
        <div class="colonnacatalogo">
            <a href="" style="text-decoration: none; color:black">
                <div class="cardauto">
                    <img class="imgauto_catalogo" src="{{asset('assets/img/ferrari_purosangue.jpg')}}" alt="IMMAGINE NON DISPONIBILE AL MOMENTO">
                    <div class="nomeauto">
                        <p style="">Auto 1</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="colonnacatalogo">
            <a href="" style="text-decoration: none; color:black">
                <div class="cardauto">
                    <img class="imgauto_catalogo" src="{{asset('assets/img/fiat_punto.jpeg')}}" alt="IMMAGINE NON DISPONIBILE AL MOMENTO">
                    <div class="nomeauto">
                        <p style="">Auto 2</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="colonnacatalogo">
            <a href="" style="text-decoration: none; color:black">
                <div class="cardauto">
                    <img class="imgauto_catalogo" src="{{asset('assets/img/ferrari_portofino.webp')}}" alt="IMMAGINE NON DISPONIBILE AL MOMENTO">
                    <div class="nomeauto">
                        <p style="">Auto 3</p>
                    </div>
                </div>
            </a>
        </div>

    </div>

@endsection
