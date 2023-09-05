<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

@section('title', 'Modifica dati di un auto')

<!-- Definizione della sezione del contenuto della pagina di modifica della singola auto -->
@section('content')
    @if(auth()->check() && (Auth::user()->role=='staff' || Auth::user()->role=='admin'))
        <div>
            <div>
                <!-- Titolo dell'auto da modificare specificando marca e modello dell'auto -->
                <h2 class="titolo_info">Modifica dati dell'auto {{$dati['nome_marca']}} - {{$dati['nome_modello']}}</h2>

                <br>

                <div>
                    <!-- Button indietro che permette di tornare alla pagina di gestione delle auto -->
                    <a href="{{ route('gestioneauto') }}" class="bottone">&laquo; INDIETRO </a>
                </div>

                <!-- Apertura della form per la modifica di una auto con redirezione alla rotta di modificadatiauto -->
                {{ Form::open(array('url' => '/modificadatiauto', 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}
                <div class="posizione_cx">
                    <div>

                        <!-- Campo nascosto che specifica il codice dell'auto che è stata selezionata per la modifica -->
                        {{ Form::hidden('codice_auto', $dati['codice_auto'], ['id' => 'codice_auto', 'class' => 'campo_form']) }}
                        <br>

                        <!-- Definizione della label per la modifica della targa -->
                        {{ Form::label('targa', 'Targa') }}

                        <br>

                        <!-- Campo di inserimento della targa, avente come id "targa" -->
                        {{ Form::text('targa', $dati['targa'], ['class' => 'campo_form', 'id' => 'targa', 'required' => 'required']) }}
                        <br>

                        <!-- Se vengono rilevati degli errori allora vengono stampati -->
                        @if ($errors->first('nome'))
                            <ul>
                                @foreach ($errors->get('targa') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <!-- Definizione della label per la visualizzazione del nome della marca -->
                        {{ Form::label('nome_marca', 'Marca') }}
                        <br>

                        <!-- Campo di visualizzazione della amrca, avente come id "nome_marca" -->
                        {{ Form::text('nome_marca', $dati['nome_marca'], ['class' => 'campo_form', 'readonly' => true, 'id' => 'nome_marca', 'required' => 'required']) }}

                        <!-- Se vengono rilevati degli errori allora vengono stampati -->
                        @if ($errors->first('nome_marca'))
                            <ul>
                                @foreach ($errors->get('nome_marca') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <br>

                        <!-- Definizione della label per la visualizzazione del modello dell'auto -->
                        {{ Form::label('nome_modello', 'Modello') }}
                        <br>

                        <!-- Campo di modifica del modello, avente come id "nome_modello" -->
                        {{ Form::text('nome_modello', $dati['nome_modello'], ['class' => 'campo_form', 'readonly' => true, 'id' => 'nome_modello','required' => 'required']) }}

                        <!-- Se vengono rilevati degli errori allora vengono stampati -->
                        @if ($errors->first('nome_modello'))
                            <ul>
                                @foreach ($errors->get('nome_modello') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <br>
                    </div>

                    <div>
                        <!-- Definizione della label per la modifica del numero di posti -->
                        {{ Form::label('num_posti', 'Numero Posti') }}
                        <br>

                        <!-- Campo di inserimento del numero di posti, avente come id "num_posti" -->
                        {{ Form::number('num_posti', $dati['num_posti'], ['class' => 'campo_form', 'id' => 'num_posti', 'rules' => 'num_posti', 'required' => 'required']) }}

                        <!-- Se vengono rilevati degli errori allora vengono stampati -->
                        @if ($errors->first('num_posti'))
                            <ul>
                                @foreach ($errors->get('num_posti') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <br>

                        <!-- Definizione della label per la modifica della descrizione dell'allestimento dell'auto -->
                        {{ Form::label('allestimento', 'Allestimento')}}
                        <br>

                        <!-- Campo di inserimento dell'allestimento, avente come id "allestimento" -->
                        {{ Form::text('allestimento', $dati['allestimento'], ['class' => 'campo_form', 'id' => 'allestimento', 'rules' => 'allestimento', 'required' => 'required']) }}

                        <!-- Se vengono rilevati degli errori allora vengono stampati -->
                        @if ($errors->first('allestimento'))
                            <ul>
                                @foreach ($errors->get('allestimento') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <br>

                        <!-- Definizione della label per la modifica del costo/giorno dell'auto -->
                        {{ Form::label('costo_giorno', 'Costo Giornaliero') }}
                        <br>

                        <!-- Campo di inserimento del costo giornaliero, avente come id "costo_giorno" -->
                        {{ Form::number('costo_giorno', $dati['costo_giorno'], ['class' => 'campo_form', 'id' => 'costo_giorno', 'rules' => 'costo_giorno', 'required' => 'required']) }}

                        <!-- Se vengono rilevati degli errori allora vengono stampati -->
                        @if ($errors->first('costo_giorno'))
                            <ul>
                                @foreach ($errors->get('costo_giorno') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <br>
                    </div>
                </div>
                @csrf
                <div class="posizione_cx">
                    <!-- Definizione della label per l'inserimento della descrizione dell'allestimento dell'auto -->
                    {{ Form::submit('Modifica Auto', ['class' => 'bottone', 'onclick' => 'return confirmModifica()']) }}

                    <!-- Tag di chiusura della Form di aggiunta dell'auto -->
                    {{ Form::close() }}
                </div>
                <br>
            </div>
        </div>
    @endif

    @if(auth()->check() && Auth::user()->role=='user')
        <h1 class="titolo posizione_cx">MANCATA AUTORIZZAZIONE PER NAVIGARE IN QUESTO URL</h1>
    @endif

@endsection
