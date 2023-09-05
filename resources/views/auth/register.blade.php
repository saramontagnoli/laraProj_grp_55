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
                            <option value="{{ $occupazione['codice_occupazione'] }}">{{ $occupazione['nome_occupazione'] }}</option>
                        @endforeach
                    </select>
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
