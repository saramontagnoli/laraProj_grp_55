<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

@section('title', 'Login')

<!-- Definizione della sezione del contenuto della pagina del login -->
@section('content')
    <div style="text-align: center">
        <!-- Intestazione della form di login -->
        <h1 class="titolo_info">Login</h1>
        <p>Utilizza questa form per aggiungere un'auto:</p>
        <br>

        <div>
            <div>
                <!-- Apertura della form per il login con redirezione alla rotta di login -->
                {{ Form::open(array('url' => '/aggiuntaAuto', 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}
                <div>
                    <!-- Definizione della label per l'inserimento dello username -->
                    {{ Form::label('targa', 'Targa') }}
                    <br>
                    <!-- Campo di inserimento dello username, avente come id "username" -->
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
                    <!-- Definizione della label per la scelta del modello -->
                    {{ Form::label('modello_ref', 'Modello') }}
                    <br>
                    <!-- Campo di selezione del modello, avente come id "modello_ref" -->
                    <select name="modello_ref" id="modello_ref" class="campo_form">
                        <option value="">Seleziona un modello</option> <!-- Opzione predefinita -->
                        @foreach ($modelli as $modello)
                            <option value="{{ $modello->id }}">{{ $modello->nome }}</option>
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
                    <!-- Definizione della label per l'inserimento della password -->
                    {{ Form::label('num_posti', 'Numero di Posti') }}
                    <br>
                    <!-- Campo di inserimento della password, avente come id "password" -->
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
                    <!-- Definizione della label per l'inserimento della password -->
                    {{ Form::label('costo_giorno', 'Costo Giornaliero') }}
                    <br>
                    <!-- Campo di inserimento della password, avente come id "password" -->
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
                    <!-- Definizione della label per l'inserimento della password -->
                    {{ Form::label('allestimento', 'Allestimento') }}
                    <br>
                    <!-- Campo di inserimento della password, avente come id "password" -->
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
                    <!-- Definizione della label per l'inserimento della password -->
                    {{ Form::label('foto_auto','Immagine auto', ['class' => 'label-input']) }}
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
                    <!-- Bottone di submit per l'invio dei dati inseriti nella form -->
                    {{ Form::submit('Aggiungi Auto', ['class' => 'bottone']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <br><br>
@endsection
