@extends('layouts.struttura')

@section('title', 'Modifica dati personali del cliente')

@section('content')
    <div>
        <div>
            @foreach($data as $dati)
                <!-- Intestazione della pagina di modifica dell'utente, specificando lo username -->
                <h2 class="titolo_info">Modifica dati personali di: {{$dati['username']}}</h2>

                <div>
                    <!-- Button indietro che permette di tornare al profilo dell'utente -->
                    <a href="{{ route('user/profilo') }}" class="bottone">&laquo; INDIETRO </a>
                </div>

                <br>
                @csrf
                <!-- Apertura del tag FORM per la modifica dei dati dell'utente, metodo PUT per inserimento dati -->
                {{ Form::open(array('url' => '/modificaDatiUtente', 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}
                <div>
                    <div class="posizione_cx">
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

                        <!-- Definizione della label per la modifica della data di nascita dell'utente -->
                        {{ Form::label('data_nascita', 'Data di nascita') }}

                        <br>

                        <!-- Campo di inserimento della data di nascita dell'utente, avente come id "data_nascita" -->
                        {{ Form::date('data_nascita', '', ['class' => 'campo_form', 'id' => 'data_nascita', 'rules' => 'date_format:d-m-Y', 'required' => 'required', 'max' => now()->format('Y-m-d') ,'min' => now()->subYears(100)->format('Y-m-d')]) }}

                        <!-- Se vengono rilevati degli errori, vengono stampati sotto al campo relativo -->
                        @if ($errors->first('data_nascita'))
                            <ul>
                                @foreach ($errors->get('data_nascita') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <br>

                        <!-- Definizione della label per la modifica dell'email dell'utente -->
                        {{ Form::label('email', 'Email') }}

                        <br>

                        <!-- Campo di inserimento dell'email dell'utente, avente come id "email" -->
                        {{ Form::text('email', $dati['email'], ['class' => 'campo_form', 'id' => 'email', 'rules' => 'email', 'required' => 'required']) }}

                        <!-- Se vengono rilevati degli errori, vengono stampati sotto al campo relativo -->
                        @if ($errors->first('email'))
                            <ul class="errors">
                                @foreach ($errors->get('email') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <br>
                        <!-- Definizione della label per la modifica dell'indirizzo dell'utente -->
                        {{ Form::label('indirizzo', 'Indirizzo') }}
                        <br>

                        <!-- Campo di inserimento del cognome dell'utente, avente come id "cognome" -->
                        {{ Form::text('indirizzo', $dati['indirizzo'], ['class' => 'campo_form', 'id' => 'indirizzo', 'required' => 'required']) }}

                        <!-- Se vengono rilevati degli errori, vengono stampati sotto al campo relativo -->
                        @if ($errors->first('indirizzo'))
                            <ul>
                                @foreach ($errors->get('indirizzo') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div>
                            <!-- Definizione della label per l'inserimento dell'occupazione dell'utente -->
                            {{ Form::label('occupazione_ref', 'Occupazione') }}
                            <br>

                            <!-- Campo di inserimento dell'occupazione, avente come id "occupazione" -->
                            @if ($data->isNotEmpty())
                                @php $firstUser = $data->first(); @endphp
                                <select name="occupazione_ref" id="occupazione_ref" class="campo_form">
                                    <option value="{{ $firstUser['occupazione_ref'] }}">{{ $firstUser['nome_occupazione'] }}</option>
                                    @foreach ($occupazioni as $occupazione)
                                        <option value="{{ $occupazione['codice_occupazione'] }}" @if($firstUser['occupazione_ref'] == $occupazione['codice_occupazione']) selected @endif>{{ $occupazione['nome_occupazione'] }}</option>
                                    @endforeach
                                </select>

                                <!-- Se vengono rilevati degli errori allora vengono stampati -->
                                @if ($errors->first('occupazione_ref'))
                                    <ul>
                                        @foreach ($errors->get('occupazione_ref') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <div>
                                <!-- Definizione della label per l'inserimento del comune di residenza dell'utente -->
                                {{ Form::label('comune_ref', 'Comune') }}
                                <br>

                                <!-- Campo di inserimento del comune di residenza, avente come id "comune" -->
                                <select name="comune_ref" id="comune_ref" class="campo_form">
                                    <option value="{{ $firstUser['comune_ref']  }}">{{$firstUser['nome_comune']  }}</option>
                                    @foreach ($comuni as $comune)
                                        <option value="{{ $comune['id'] }}">{{ $comune['nome'] }}</option>
                                    @endforeach
                                </select>

                                <!-- Se vengono rilevati degli errori allora vengono stampati -->
                                @if ($errors->first('comune_ref'))
                                    <ul>
                                        @foreach ($errors->get('comune_ref') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endif
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

                    <br>

                    <div class="posizione_cx">
                        <!-- Bottone di submit per l'invio dei dati inseriti nella form e conseguente modifica -->
                        {{ Form::submit('Modifica dati', ['class' => 'bottone', 'onclick' => 'return myFunction()']) }}
                    </div>

                    <!-- Inclusione dello script per la conferma di modifica -->
                    <script src="{{ asset('assets/js/app.js') }}"></script>

                    <br>

                    <!-- Chiusura della form -->
                    {{ Form::close() }}
                </div>
            <br>
        @endforeach
    </div>
@endsection
