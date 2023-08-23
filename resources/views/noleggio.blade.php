@extends('layouts.struttura')
@section('content')
    <h2 style="text-align: center; font-size: x-large">{{ Auth::user()->username }} HAI NOLEGGIATO</h2>
    @foreach($auto as $data)
        <p> {{$data['codice_auto']}} </p>
        <p> {{$data['nome_marca']}} </p>
        <p> {{$data['nome_modello']}} </p>
    @endforeach
@endsection
