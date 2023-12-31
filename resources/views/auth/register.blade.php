<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

@section('title', 'Registrazione')

<!-- Definizione della sezione del contenuto della pagina del login -->
@section('content')

    <!-- Script JavaScript per impedire l'input manuale e abilitare il calendario -->

    <!-- Definizione della sezione della form di registrazione dell'utente -->
    <div style="text-align: center">

        <!-- Titolo form di registrazione -->
        <h2>Registrazione</h2>

        <!-- Apertura tag della form, rotta di registrazione -->
        {{ Form::open(array('url' => '/register', 'enctype' => 'multipart/form-data', 'class' => 'contact-form')) }}
        <div>
            <div>
                <!-- Definizione della label per l'inserimento del nome dell'utente -->
                {{ Form::label('nome', 'Nome') }}
                <br>
                <!-- Campo di inserimento del nome, avente come id "nome" -->
                {{ Form::text('nome', '', ['class' => 'campo_form', 'id' => 'nome', 'required' => 'campo_form']) }}

                <!-- Se vengono rilevati degli errori allora vengono stampati -->
                @if ($errors->first('nome'))
                    <ul>
                        @foreach ($errors->get('nome') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div>
                <!-- Definizione della label per l'inserimento del cognome dell'utente -->
                {{ Form::label('cognome', 'Cognome') }}
                <br>
                <!-- Campo di inserimento del cognome, avente come id "cognome" -->
                {{ Form::text('cognome', '', ['class' => 'campo_form', 'id' => 'cognome', 'required' => 'required']) }}

                <!-- Se vengono rilevati degli errori allora vengono stampati -->
                @if ($errors->first('cognome'))
                    <ul>
                        @foreach ($errors->get('cognome') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div>
                <!-- Definizione della label per l'inserimento dello username dell'utente -->
                {{ Form::label('username', 'Username') }}
                <br>

                <!-- Campo di inserimento dello username, avente come id "username" -->
                {{ Form::text('username', '', ['class' => 'campo_form', 'id' => 'username', 'required' => 'required']) }}

                <!-- Se vengono rilevati degli errori allora vengono stampati -->
                @if ($errors->first('username'))
                    <ul>
                        @foreach ($errors->get('username') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div>
                <!-- Definizione della label per l'inserimento dell'e-mail dell'utente -->
                {{ Form::label('email', 'Email') }}
                <br>
                <!-- Campo di inserimento dell'e-mail, avente come id "email" -->
                {{ Form::email('email', '', ['class' => 'campo_form', 'id' => 'email', 'required' => 'required']) }}

                <!-- Se vengono rilevati degli errori allora vengono stampati -->
                @if ($errors->first('email'))
                    <ul>
                        @foreach ($errors->get('email') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div>
                <!-- Definizione della label per l'inserimento della data di nascita dell'utente -->
                {{ Form::label('data_nascita', 'Data di nascita') }}
                <br>
                <!-- Campo di inserimento della data di nascita, avente come id "data_nascita" -->
                {{ Form::date('data_nascita', '', ['class' => 'campo_form', 'id' => 'data_nascita', 'rules' => 'date_format:d-m-Y', 'required' => 'required', 'max' => now()->format('Y-m-d') ,'min' => now()->subYears(100)->format('Y-m-d')]) }}

                <!-- Se vengono rilevati degli errori allora vengono stampati -->
                @if ($errors->first('data_nascita'))
                    <ul>
                        @foreach ($errors->get('data_nascita') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div>
                <!-- Definizione della label per l'inserimento dell'occupazione dell'utente -->
                {{ Form::label('occupazione', 'Occupazione') }}
                <br>

                <!-- Campo di inserimento dell'occupazione, avente come id "occupazione" -->
                <select name="occupazione" id="occupazione" class="campo_form">
                    <option value="">Seleziona la tua occupazione</option>
                    @foreach ($occupazioni as $occupazione)
                        <option value="{{ $occupazione['codice_occupazione'] }}"{{ old('occupazione') == $occupazione['codice_occupazione'] ? 'selected' : '' }}>{{ $occupazione['nome_occupazione'] }}</option>
                    @endforeach
                </select>

                <!-- Se vengono rilevati degli errori allora vengono stampati -->
                @if ($errors->first('occupazione'))
                    <ul>
                        @foreach ($errors->get('occupazione') as $message)
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
                    <option value="">Seleziona il tuo comune</option>
                    @foreach ($comuni as $comune)
                        <option value="{{ $comune['id'] }}"{{ old('comune_ref') == $comune['id'] ? 'selected' : '' }}>{{ $comune['nome'] }}</option>
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
            <div>
                <!-- Definizione della label per l'inserimento dell'indirizzo di residenza dell'utente -->
                {{ Form::label('indirizzo', 'Indirizzo') }}
                <br>

                <!-- Campo di inserimento dell'indirizzo di residenza, avente come id "indirizzo" -->
                {{ Form::text('indirizzo', '', ['class' => 'campo_form', 'id' => 'indirizzo', 'required' => 'required'] )}}

                <!-- Se vengono rilevati degli errori allora vengono stampati -->
                @if ($errors->first('indirizzo'))
                    <ul>
                        @foreach ($errors->get('indirizzo') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div>
                <!-- Definizione della label per l'inserimento della password dell'utente -->
                {{ Form::label('password', 'Password') }}
                <br>

                <!-- Campo di inserimento della password, avente come id "password" -->
                {{ Form::password('password', ['class' => 'campo_form', 'id' => 'password', 'required' => 'required'] )}}

                <!-- Se vengono rilevati degli errori allora vengono stampati -->
                @if ($errors->first('password'))
                    <ul>
                        @foreach ($errors->get('password') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div>
                <!-- Definizione della label per l'inserimento della password dell'utente -->
                {{ Form::label('conferma_password', 'Conferma password') }}
                <br>

                <!-- Campo di inserimento della password, avente come id "password" -->
                {{ Form::password('conferma password', ['class' => 'campo_form', 'id' => 'password', 'required' => 'required'] )}}

            </div>
            <!-- Se vengono rilevati degli errori allora vengono stampati -->
            @if($errors->has('conferma_password'))
                <span class="text-danger">{{ $errors->first('conferma_password') }}</span>
            @endif
        </div>

        <!-- Bottone di submit per l'invio dei dati inseriti nella form -->
        {{ Form::submit('Registrazione', ['class' => 'bottone'])}}

        <!-- Tag di chiusura della Form di aggiunta dell'utente -->
        {{ Form::close() }}

        <div>
            <p>Hai già un account?<b><a href="{{ route('login') }}" class="tabella_link">
                        Effettua il Login</a></b>
            </p>
        </div>
    </div>
@endsection
