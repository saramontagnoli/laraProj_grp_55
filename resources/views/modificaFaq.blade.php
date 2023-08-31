@extends('layouts.struttura')

@section('title', 'Modifica dati personali del cliente')

@section('content')
    <div>
        <div>
            <!-- Intestazione della pagina di modifica dell'utente, specificando lo username -->
            <h2 class="titolo_info">Modifica dati F.A.Q.</h2>

            <div>
                <!-- Button indietro che permette di tornare al profilo dell'utente -->
                <a href="{{ route('/gestioneFaq') }}" class="bottone">&laquo; INDIETRO </a>
            </div>

            <br>
            @csrf
            <!-- Apertura del tag FORM per la modifica dei dati dell'utente, metodo PUT per inserimento dati -->
            {{ Form::open(array('url' => 'modificadatiFaq', 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}
            <div>
                <div class="posizione_cx">
                    <br>
                    <!-- Campo di inserimento del nome dell'utente, avente come id "nome" -->
                    {{ Form::hidden('codice_faq', $faq['codice_faq'], ['id' => 'codice_faq', 'class' => 'campo_form']) }}

                    <br>

                    <!-- Definizione della label per la modifica del nome dell'utente -->
                    {{ Form::label('domanda', 'Domanda') }}
                    <br>
                    <!-- Campo di inserimento del nome dell'utente, avente come id "nome" -->
                    {{ Form::text('domanda', $faq['domanda'], ['id' => 'domanda', 'required' => 'required', 'class' => 'campo_form']) }}

                    <!-- Se vengono rilevati degli errori, vengono stampati sotto al campo relativo -->
                    @if ($errors->first('domanda'))
                        <ul>
                            @foreach ($errors->get('domanda') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br>

                    <!-- Definizione della label per la modifica del cognome dell'utente -->
                    {{ Form::label('risposta', 'Risposta') }}
                    <br>

                    <!-- Campo di inserimento del cognome dell'utente, avente come id "cognome" -->
                    {{ Form::text('risposta', $faq['risposta'], ['class' => 'campo_form', 'id' => 'risposta', 'required' => 'required']) }}

                    <!-- Se vengono rilevati degli errori, vengono stampati sotto al campo relativo -->
                    @if ($errors->first('risposta'))
                        <ul>
                            @foreach ($errors->get('risposta') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <br>
                </div>

                <br>

                <div class="posizione_cx">
                    <!-- Bottone di submit per l'invio dei dati inseriti nella form e conseguente modifica -->
                    {{ Form::submit('Modifica F.A.Q.', ['class' => 'bottone', 'onclick' => 'return myFunction2()']) }}
                </div>

                <!-- Inclusione dello script per la conferma di modifica -->
                <script src="{{ asset('assets/js/app.js') }}"></script>

                <br>

                <!-- Chiusura della form -->
                {{ Form::close() }}
            </div>
        <br>
    </div>
@endsection
