@extends('layouts.struttura')
@section('content')
    <h2 class="titolo_info">{{ Auth::user()->username }} HAI NOLEGGIATO CORRETTAMENTE!</h2>

    <div class="posizione_cx">
        <p class="titolo_info">Riepilogo auto noleggiata: </p>
        @foreach($cardAuto as $data)
            <div>
                <p><b>Marca auto:</b>{{$data->nome_marca}}</p>
                <p><b>Modello auto:</b> {{$data->nome_modello}}</p>
                <p><b>Targa auto:</b> {{$data->targa}}</p>
                <p><b>Periodo di noleggio: DA</b> {{$data->data_inizio}} <b>A</b> {{$data->data_fine}}</p>
                <p></p>
            </div>

        @endforeach
    </div>

    <br><br>

@endsection
