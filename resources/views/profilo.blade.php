@extends('layouts.struttura')

@section('content')
    <div class="static posizione_cx">
        <img src="{{asset('assets/img/icona_chisiamo.png')}}">
        <h2 style="text-align: center; font-size: x-large">Nome: {{ Auth::user()->nome }}</h2>
        <h2 style="text-align: center; font-size: x-large">Cognome: {{ Auth::user()->cognome }}</h2>
        <h2 style="text-align: center; font-size: x-large">Data nascita: {{ Auth::user()->data_nascita }}</h2>
        <h2 style="text-align: center; font-size: x-large">E-mail: {{ Auth::user()->email }}</h2>
       @can('isUser')
            <button type="submit" >Modifica Profilo</button>
        @endcan

    </div>
@endsection
