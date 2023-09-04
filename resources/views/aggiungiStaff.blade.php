<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

@section('title', 'Login')

<!-- Definizione della sezione del contenuto della pagina del login -->
@section('content')
    <div style="text-align: center">
        <!-- Intestazione della form di login -->
        <h1 class="titolo_info">Aggiungi Auto</h1>
        <p>Utilizza questa form per aggiungere un'auto:</p>
        <br>

        <div>
            <div>
                <!-- Apertura della form per il login con redirezione alla rotta di login -->
                {{ Form::open(array('url' => '/aggiuntaStaff', 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}
                <div>
                    <!-- Definizione della label per l'inserimento dello username -->
                    {{ Form::label('username', 'Username') }}
                    <br>
                    <!-- Campo di inserimento dello username, avente come id "username" -->
                    {{ Form::text('username', '', ['id' => 'username', 'class' => 'campo_form']) }}

                    <!-- Se vengono rilevati degli errori allora vengono stampati -->
                    @if ($errors->first('username'))
                        <ul>
                            @foreach ($errors->get('username') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <br>

                <div>
                    <!-- Definizione della label per l'inserimento dello username -->
                    {{ Form::label('nome', 'Nome') }}
                    <br>
                    <!-- Campo di inserimento dello username, avente come id "username" -->
                    {{ Form::text('nome', '', ['id' => 'nome', 'class' => 'campo_form']) }}

                    <!-- Se vengono rilevati degli errori allora vengono stampati -->
                    @if ($errors->first('nome'))
                        <ul>
                            @foreach ($errors->get('nome') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <br>

                <div>
                    <!-- Definizione della label per l'inserimento dello username -->
                    {{ Form::label('cognome', 'Cognome') }}
                    <br>
                    <!-- Campo di inserimento dello username, avente come id "username" -->
                    {{ Form::text('cognome', '', ['id' => 'cognome', 'class' => 'campo_form']) }}

                    <!-- Se vengono rilevati degli errori allora vengono stampati -->
                    @if ($errors->first('cognome'))
                        <ul>
                            @foreach ($errors->get('cognome') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <br>

                <div>
                    <!-- Definizione della label per l'inserimento dello username -->
                    {{ Form::label('password', 'Password') }}
                    <br>
                    <!-- Campo di inserimento dello username, avente come id "username" -->
                    {{ Form::password('password', ['id' => 'password' , 'class' => 'campo_form']) }}

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
                    <!-- Bottone di submit per l'invio dei dati inseriti nella form -->
                    {{ Form::submit('Aggiungi Membro Staff', ['class' => 'bottone']) }}
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>

    <br><br>
@endsection
