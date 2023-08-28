@extends('layouts.struttura')
@section('content')
    <h2 style="text-align: center; font-size: x-large">{{ Auth::user()->username }} HAI NOLEGGIATO</h2>

    <div class="posizione_cx">
        @foreach($cardAuto as $data)
            <p>{{$data->auto_ref}}</p>
            <p>{{$data->data_inizio}}</p>
            <p>{{$data->data_fine}}</p>
        @endforeach
    </div>

@endsection
