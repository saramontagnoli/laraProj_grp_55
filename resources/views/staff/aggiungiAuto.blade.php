<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

@section('title', 'Login')

<!-- Definizione della sezione del contenuto della pagina di aggiunta auto -->
@section('content')

    @if(auth()->check() && (Auth::user()->role=='staff' || Auth::user()->role=='admin'))
        <div style="text-align: center">
            <!-- Titolo per l'aggiunta di una nuova auto -->
            <h1 class="titolo_info">AGGIUNTA NUOVA AUTO</h1>

            <!-- Definizione della sezione di aggiunta di una nuova auto -->
            <p>Utilizza questa form per aggiungere un'auto:</p>
            <br>

            <div style="text-align: left">
                <!-- Button indietro che permette di tornare alla pagina di gestione delle auto -->
                <a href="{{ route('gestioneauto') }}" class="bottone">&laquo; INDIETRO </a>
            </div>

            <!-- Sezione dedicata alla form di aggiuta di una nuova auto -->
            <div>
                <div>
                    <!-- Apertura della form per l'aggiunta di una nuova auto con redirezione alla rotta di aggiuntaAuto -->
                    {{ Form::open(array('url' => '/aggiuntaAuto', 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}
                    <div>
                        <!-- Definizione della label per l'inserimento della targa -->
                        {{ Form::label('targa', 'Targa') }}
                        <br>
                        <!-- Campo di inserimento della targa, avente come id "targa" -->
                        {{ Form::text('targa', '', ['id' => 'targa', 'class' => 'campo_form']) }}

                        <!-- Se vengono rilevati degli errori allora vengono stampati -->
                        @if ($errors->first('targa'))
                            <ul>
                                @foreach ($errors->get('targa') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <br>

                    <div>
                        <!-- Definizione della label per la scelta del modello dell'auto -->
                        {{ Form::label('modello_ref', 'Modello') }}
                        <br>
                        <!-- Campo di selezione del modello, avente come id "modello_ref" -->
                        <select name="modello_ref" id="modello_ref" class="campo_form">
                            <option value="">Seleziona un modello</option> <!-- Opzione predefinita -->
                            @foreach ($modelli as $modello)
                                <option value="{{ $modello->codice_modello }}">{{ $modello->nome_modello }}</option>
                            @endforeach
                        </select>

                        <!-- Se vengono rilevati degli errori, vengono stampati -->
                        @if ($errors->first('modello_ref'))
                            <ul>
                                @foreach ($errors->get('modello_ref') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <br>

                    <div>
                        <!-- Definizione della label per l'inserimento del numero di posti -->
                        {{ Form::label('num_posti', 'Numero di Posti') }}
                        <br>
                        <!-- Campo di inserimento del numero di posti, avente come id "num_posti" -->
                        {{ Form::number('num_posti', '',['id' => 'num_posti' , 'class' => 'campo_form']) }}

                        <!-- Se vengono rilevati degli errori allora vengono stampati -->
                        @if ($errors->first('num_posti'))
                            <ul>
                                @foreach ($errors->get('num_posti') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <br>

                    <div>
                        <!-- Definizione della label per l'inserimento del costo/giorno dell'auto -->
                        {{ Form::label('costo_giorno', 'Costo Giornaliero') }}
                        <br>
                        <!-- Campo di inserimento del costo giornaliero, avente come id "costo_giorno" -->
                        {{ Form::number('costo_giorno','', ['id' => 'costo_giorno' , 'class' => 'campo_form']) }}

                        <!-- Se vengono rilevati degli errori allora vengono stampati -->
                        @if ($errors->first('costo_giorno'))
                            <ul>
                                @foreach ($errors->get('costo_giorno') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <br>

                    <div>
                        <!-- Definizione della label per l'inserimento della descrizione dell'allestimento dell'auto -->
                        {{ Form::label('allestimento', 'Allestimento') }}
                        <br>
                        <!-- Campo di inserimento dell'allestimento, avente come id "allestimento" -->
                        {{ Form::text('allestimento','', ['id' => 'allestimento' , 'class' => 'campo_form']) }}

                        <!-- Se vengono rilevati degli errori allora vengono stampati -->
                        @if ($errors->first('allestimento'))
                            <ul>
                                @foreach ($errors->get('allestimento') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <br>

                    <div>
                        <!-- Definizione della label per l'inserimento dell'immagine dell'auto -->
                        {{ Form::label('foto_auto','Immagine auto', ['class' => 'label-input']) }}

                        <!-- Campo di inserimento dell'immagine dell'auto, avente come id "foto_auto" -->
                        {{ Form::file('foto_auto', array('required' => 'required')) }}

                        <!-- Se vengono rilevati degli errori allora vengono stampati -->
                        @if ($errors->first('foto_auto'))
                            <ul>
                                @foreach ($errors->get('foto_auto') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <br>

                    <div>
                        <!-- Bottone di submit per l'invio dei dati inseriti nella form di aggiunta -->
                        {{ Form::submit('Aggiungi Auto', ['class' => 'bottone']) }}
                    </div>

                    <!-- Tag di chiusura della Form di aggiunta dell'auto -->
                    {{ Form::close() }}
                </div>
            </div>
        </div>

        <br><br>
    @endif

    @if(auth()->check() && Auth::user()->role=='user')
        <h1 class="titolo posizione_cx">MANCATA AUTORIZZAZIONE PER NAVIGARE IN QUESTO URL</h1>
    @endif
@endsection
