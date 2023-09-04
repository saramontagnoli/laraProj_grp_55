@extends('layouts.struttura')

@section('content')

    <h1 class="titolo_info">AGGIUNTA F.A.Q.</h1>

    <br>

    <p class="posizione_cx">Utilizza questa form per aggiungere una nuova F.A.Q. al sito:</p>
    <br>

    <div class="posizione_cx">
        {{ Form::open(array('url' => '/aggiuntaFaq', 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}

        <div>
            <!-- Definizione della label per l'inserimento dello username -->
            {{ Form::label('domanda', 'Domanda') }}
            <br>
            <!-- Campo di inserimento dello username, avente come id "username" -->
            {{ Form::text('domanda', '', ['id' => 'domanda', 'required' => 'required', 'class' => 'campo_form']) }}

            <!-- Se vengono rilevati degli errori allora vengono stampati -->
            @if ($errors->first('domanda'))
                <ul>
                    @foreach ($errors->get('domanda') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <br>

        <div>
            <!-- Definizione della label per l'inserimento dello username -->
            {{ Form::label('risposta', 'Risposta') }}
            <br>
            <!-- Campo di inserimento dello username, avente come id "username" -->
            {{ Form::text('risposta', '', ['id' => 'risposta', 'required' => 'required', 'class' => 'campo_form']) }}

            <!-- Se vengono rilevati degli errori allora vengono stampati -->
            @if ($errors->first('risposta'))
                <ul>
                    @foreach ($errors->get('risposta') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <br>

        <div>
            <!-- Bottone di submit per l'invio dei dati inseriti nella form -->
            {{ Form::submit('Aggiungi F.A.Q.', ['class' => 'bottone']) }}
        </div>

        <br><br>

        <!-- Tag di chiusura della Form di aggiunta della F.A.Q. -->
        {{ Form::close() }}

    </div>

@endsection
