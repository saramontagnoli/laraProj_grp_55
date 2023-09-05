@extends('layouts.skel')

@section('title', 'Registrazione')

@section('content')
    <!-- il wrapper è il contenitore che contiene il box della form di login -->
    <div style="text-align: center">
        <!-- box che contiene la form di login -->
        <div class="form-box form-box-inputdialog login">
            <h2>Registrazione</h2>

            <!-- effettiva form di input -->
            {{ Form::open(array('route' => 'register', 'class' => 'contact-form')) }}
            <div class="form-row">
                <div>
                    {{ Form::label('nome', 'Nome', ['class' => 'label-input']) }}
                    <br>
                    {{ Form::text('nome', '', ['class' => 'input', 'id' => 'nome', 'required' => 'campo_form']) }}
                    @if ($errors->first('nome'))
                        <ul class="errors">
                            @foreach ($errors->get('nome') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div>
                    {{ Form::label('cognome', 'Cognome', ['class' => 'campo_form']) }}
                    <br>
                    {{ Form::text('cognome', '', ['class' => 'input', 'id' => 'cognome', 'required' => 'required']) }}
                    @if ($errors->first('cognome'))
                        <ul class="errors">
                            @foreach ($errors->get('cognome') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div>
                    {{ Form::label('username', 'Username', ['class' => 'campo_form']) }}
                    <br>
                    {{ Form::text('username', '', ['class' => 'input', 'id' => 'username', 'required' => 'required']) }}
                    @if ($errors->first('username'))
                        <ul class="errors">
                            @foreach ($errors->get('username') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div>
                    {{ Form::label('email', 'Email', ['class' => 'campo_form']) }}
                    <br>
                    {{ Form::email('email', '', ['class' => 'input', 'id' => 'email', 'required' => 'required']) }}
                    @if ($errors->first('email'))
                        <ul class="errors">
                            @foreach ($errors->get('email') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div>
                    {{ Form::label('data_nascita', 'Data di nascita', ['class' => 'campo_form']) }}
                    <br>
                    {{ Form::date('data_nascita', '', ['class' => 'input', 'id' => 'data_nascita', 'rules' => 'date_format:d-m-Y', 'required' => 'required', 'max' => now()->format('Y-m-d')]) }}
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

                    <select name="occupazione" id="occupazione" class="campo_form">
                        <option value="">Seleziona la tua occupazione</option> <!-- Opzione predefinita -->
                        @foreach ($occupazioni as $occupazione)
                            <option value="{{ $occupazione->codice_occupazione }}">{{ $occupazione->nome_occupazione }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <select name="stato" id="stato" class="campo_form">
                        <option value="">Seleziona il tuo stato d'appartenza</option> <!-- Opzione predefinita -->
                        @foreach ($stati as $stato)
                            <option value="{{ $stato->codice_stato }}">{{ $stato->nome_stato}}</option>
                        @endforeach
                    </select>
                    <!-- Se vengono rilevati degli errori, vengono stampati -->
                    @if ($errors->first('stato'))
                        <ul>
                            @foreach ($errors->get('stato') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div>
                    <select name="regione" id="regione" class="campo_form">
                        <option value="">Seleziona la tua regione d'appartenza</option> <!-- Opzione predefinita -->
                        @foreach ($regioni as $regione)
                            <option value="{{ $regione->id }}">{{ $regione->nome}}</option>
                        @endforeach
                    </select>
                    <!-- Se vengono rilevati degli errori, vengono stampati -->
                    @if ($errors->first('regione'))
                        <ul>
                            @foreach ($errors->get('regione') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div>
                    <select name="provincia" id="provincia" class="campo_form">
                        <option value="">Seleziona la tua provincia d'appartenza</option> <!-- Opzione predefinita -->
                        @foreach ($province as $provincia)
                            <option value="{{ $provincia->id }}">{{ $stato->nome}}</option>
                        @endforeach
                    </select>
                    <!-- Se vengono rilevati degli errori, vengono stampati -->
                    @if ($errors->first('provincia'))
                        <ul>
                            @foreach ($errors->get('provincia') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div>
                    <select name="comune" id="comune" class="campo_form">
                        <option value="">Seleziona la tua città d'appartenza</option> <!-- Opzione predefinita -->
                        @foreach ($comuni as $comune)
                            <option value="{{ $cit->id }}">{{ $cit->nome}}</option>
                        @endforeach
                    </select>
                    <!-- Se vengono rilevati degli errori, vengono stampati -->
                    @if ($errors->first('comune'))
                        <ul>
                            @foreach ($errors->get('comune') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <br>
                <div>
                    {{ Form::label('password', 'Password') }}
                    <br>
                    {{ Form::password('password', array('required' => 'required')) }}
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
