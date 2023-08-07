@extends('layouts.struttura')

@section('content')

    <!-- Sezione dedicata al catalogo delle auto noleggiabili -->
    <div class="rigacatalogo">
        @foreach ($data as $auto)
            <div class="colonnacatalogo">
                <a href="" style="text-decoration: none; color:black">
                    <div class="cardauto">
                        <img class="imgauto_catalogo" src="{{$auto->foto_auto}}" alt="IMMAGINE NON DISPONIBILE AL MOMENTO">
                        <div class="nomeauto">
                            <p style="">{{$auto->targa}}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
