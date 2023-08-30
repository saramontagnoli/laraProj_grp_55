@extends('layouts.struttura')

@section('title', 'Login')

@section('content')
    <div style="text-align: center">
        <!-- Intestazione della form di login -->
        <h1 class="titolo_info">Login</h1>
        <p>Utilizza questa form per autenticarti al sito:</p>
        <br>

        <div>
            <div>
                <!-- Apertura della form per il login con redirezione alla rotta di login -->
                {{ Form::open(array('route' => 'login')) }}
                <div>
                    <!-- Definizione della label per l'inserimento dello username -->
                    {{ Form::label('username', 'Nome Utente') }}
                    <br>
                    <!-- Campo di inserimento dello username, avente come id "username" -->
                    {{ Form::text('username', '', ['id' => 'username']) }}

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
                    <!-- Definizione della label per l'inserimento della password -->
                    {{ Form::label('password', 'Password') }}
                    <br>
                    <!-- Campo di inserimento della password, avente come id "password" -->
                    {{ Form::password('password', ['id' => 'password']) }}

                    <!-- Se vengono rilevati degli errori allora vengono stampati -->
                    @if ($errors->first('password'))
                        <ul>
                            @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <br>

                <div>
                    <!-- Bottone di submit per l'invio dei dati inseriti nella form -->
                    {{ Form::submit('Login', ['class' => 'bottone']) }}
                </div>

                <br><br>

                <div>
                    <p> Se non hai già un account <a  href="{{ route('register') }}">registrati</a></p>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>

    <br><br>
@endsection
