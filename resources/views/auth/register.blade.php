@extends('layouts.struttura')

@section('title', 'Registrazione')


@section('content')
    <!-- il wrapper è il contenitore che contiene il box della form di login -->
    <div style="text-align: center">
        <!-- box che contiene la form di login -->
        <div class="form-box form-box-inputdialog login">
            <h2>Registrazione</h2>

            <!-- effettiva form di input -->
            {{ Form::open(array('url' => '/register', 'enctype' => 'multipart/form-data', 'class' => 'contact-form')) }}
            <div class="form-row">
                <div>
                    {{ Form::label('nome', 'Nome') }}
                    <br>
                    {{ Form::text('nome', '', ['class' => 'campo_form', 'id' => 'nome', 'required' => 'campo_form']) }}
                    @if ($errors->first('nome'))
                        <ul class="errors">
                            @foreach ($errors->get('nome') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div>
                    {{ Form::label('cognome', 'Cognome') }}
                    <br>
                    {{ Form::text('cognome', '', ['class' => 'campo_form', 'id' => 'cognome', 'required' => 'required']) }}
                    @if ($errors->first('cognome'))
                        <ul class="errors">
                            @foreach ($errors->get('cognome') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div>
                    {{ Form::label('username', 'Username') }}
                    <br>
                    {{ Form::text('username', '', ['class' => 'campo_form', 'id' => 'username', 'required' => 'required']) }}
                    @if ($errors->first('username'))
                        <ul class="errors">
                            @foreach ($errors->get('username') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div>
                    {{ Form::label('email', 'Email') }}
                    <br>
                    {{ Form::email('email', '', ['class' => 'campo_form', 'id' => 'email', 'required' => 'required']) }}
                    @if ($errors->first('email'))
                        <ul class="errors">
                            @foreach ($errors->get('email') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div>
                    {{ Form::label('data_nascita', 'Data di nascita') }}
                    <br>
                    {{ Form::date('data_nascita', '', ['class' => 'campo_form', 'id' => 'data_nascita', 'rules' => 'date_format:d-m-Y', 'required' => 'required', 'max' => now()->format('Y-m-d')]) }}
                    @if ($errors->first('data_nascita'))
                        <ul class="errors">
                            @foreach ($errors->get('data_nascita') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div>
                    {{ Form::label('occupazione', 'Occupazione') }}
                    <br>
                    <select name="occupazione" id="occupazione" class="campo_form">
                        <option value="">Seleziona la tua occupazione</option> <!-- Opzione predefinita -->
                        @foreach ($occupazioni as $occupazione)
                            <option value="{{ $occupazione['codice_occupazione'] }}">{{ $occupazione['nome_occupazione'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    {{ Form::label('comune', 'Comune') }}
                    <br>
                    <select name="comune" id="comune" class="campo_form">
                        <option value="">Seleziona il tuo comune</option> <!-- Opzione predefinita -->
                        @foreach ($comuni as $comune)
                            <option value="{{ $comune['id'] }}">{{ $comune['nome'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                {{ Form::label('indirizzo', 'Indirizzo') }}
                <br>
                {{ Form::text('indirizzo', '', ['class' => 'campo_form', 'id' => 'indirizzo', 'required' => 'required'] )}}
                @if ($errors->first('indirizzo'))
                    <ul class="errors">
                        @foreach ($errors->get('indirizzo') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div>
                {{ Form::label('password', 'Password') }}
                <br>
                {{ Form::password('password', ['class' => 'campo_form', 'id' => 'password', 'required' => 'required'] )}}
                @if ($errors->first('password'))
                    <ul class="errors">
                        @foreach ($errors->get('password') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>

            {{ Form::submit('Registrazione', ['class' => 'btn'])}}
            {{ Form::close() }}

            <div class="form-alt-container">
                <p>Hai già un account?<b><a href="{{ route('login') }}" class="form-alt-link">
                            Effettua il Login</a></b>
                </p>
            </div>
        </div>
    </div>
@endsection
