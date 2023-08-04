@extends('layouts.struttura')

@section('content')
    <div class="static">
        <p>Nome {{ Auth::user()->nome }}</p>
        <p>Cognome {{ Auth::user()->cognome }}</p>
        <p>Seleziona la funzione da attivare</p>
    </div>
@endsection
