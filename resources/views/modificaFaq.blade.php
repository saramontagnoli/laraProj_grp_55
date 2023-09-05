<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

@section('title', 'Modifica dati personali del cliente')

<!-- Definizione della sezione del contenuto della pagina della modifica delle F.A.Q. -->
@section('content')
    <div>
        <div>
            <!-- Titolo della pagina di modifica dei dati delle F.A.Q. -->
            <h2 class="titolo_info">Modifica dati F.A.Q.</h2>

            <div>
                <!-- Button indietro che permette di tornare alla pagina di gestione delle F.A.Q. -->
                <a href="{{ route('gestioneFaq') }}" class="bottone">&laquo; INDIETRO </a>
            </div>

            <br>

            <!-- Apertura del tag FORM per la modifica dei dati delle F.A.Q., metodo PUT per inserimento dati modificati -->
            {{ Form::open(array('url' => 'modificadatiFaq', 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}
            <div>
                <!-- Sezione della pagina con i campi riempiti dai vecchi dati, pronti per la modifica -->
                <div class="posizione_cx">
                    <br>
                    <!-- Campo nascosto che contiene il codice della F.A.Q. -->
                    {{ Form::hidden('codice_faq', $faq['codice_faq'], ['id' => 'codice_faq', 'class' => 'campo_form']) }}

                    <br>

                    <!-- Definizione della label per la modifica della domanda della F.A.Q. -->
                    {{ Form::label('domanda', 'Domanda') }}
                    <br>
                    <!-- Campo di inserimento della domanda della F.A.Q., avente come id "domanda" -->
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

                    <!-- Definizione della label per la modifica della risposta della F.A.Q. -->
                    {{ Form::label('risposta', 'Risposta') }}
                    <br>

                    <!-- Campo di inserimento della risposta della F.A.Q., avente come id "risposta" -->
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

                @csrf
                <br>

                <div class="posizione_cx">
                    <!-- Bottone di submit per l'invio dei dati inseriti nella form e conseguente modifica della F.A.Q. -->
                    <!-- Definizione dell'onclick per il popup di conferma di modifica delle informaizoni della F.A.Q. -->
                    {{ Form::submit('Modifica F.A.Q.', ['class' => 'bottone', 'onclick' => 'return myFunction2()']) }}
                </div>
                <br>
                <!-- Chiusura della form -->
                {{ Form::close() }}
            </div>
        <br>
    </div>
@endsection
