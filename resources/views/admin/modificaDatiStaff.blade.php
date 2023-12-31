<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

@section('title', 'Modifica dati di un auto')
<!-- Definizione della sezione del contenuto della pagina di modifica dello staff -->
@section('content')
    <div>
        <div>
            <h2 class="titolo_info">Modifica dati staff {{$dati['username']}}</h2>

            <br>

            <!-- Apertura del tag FORM per la modifica dei dati dell'utente, metodo PUT per inserimento dati -->
            {{ Form::open(array('url' => '/modificadatistaff', 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}
            <div>
                <div class="posizione_cx">
                    {{ Form::hidden('id', $dati['id'], ['id' => 'id', 'class' => 'campo_form']) }}
                    {{ Form::hidden('username', $dati['username'], ['id' => 'username', 'class' => 'campo_form']) }}
                    <!-- Definizione della label per la modifica del nome dell'utente -->
                    {{ Form::label('nome', 'Nome') }}
                    <br>
                    <!-- Campo di inserimento del nome dell'utente, avente come id "nome" -->
                    {{ Form::text('nome', $dati['nome'], ['id' => 'nome', 'required' => 'required', 'class' => 'campo_form']) }}

                    <!-- Se vengono rilevati degli errori, vengono stampati sotto al campo relativo -->
                    @if ($errors->first('nome'))
                        <ul>
                            @foreach ($errors->get('nome') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br>

                    <!-- Definizione della label per la modifica del cognome dell'utente -->
                    {{ Form::label('cognome', 'Cognome') }}
                    <br>

                    <!-- Campo di inserimento del cognome dell'utente, avente come id "cognome" -->
                    {{ Form::text('cognome', $dati['cognome'], ['class' => 'campo_form', 'id' => 'cognome', 'required' => 'required']) }}

                    <!-- Se vengono rilevati degli errori, vengono stampati sotto al campo relativo -->
                    @if ($errors->first('cognome'))
                        <ul>
                            @foreach ($errors->get('cognome') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <br>

                    <!-- Definizione della label per la modifica della password dell'utente -->
                    {{ Form::label('password', 'Password') }}

                    <br>

                    <!-- Campo di inserimento della password dell'utente, avente come id "password" -->
                    {{ Form::password('password', ['class' => 'campo_form'] )}}

                    <!-- Se vengono rilevati degli errori, vengono stampati sotto al campo relativo -->
                    @if ($errors->first('password'))
                        <ul class="errors">
                            @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                @csrf
                <br>

                <div class="posizione_cx">
                    <!-- Bottone di submit per l'invio dei dati inseriti nella form e conseguente modifica -->
                    {{ Form::submit('Modifica dati', ['class' => 'bottone', 'onclick' => 'return modificaStaff()']) }}
                </div>

                <br>

                <!-- Chiusura della form -->
                {{ Form::close() }}
            <br>
        </div>

@endsection
