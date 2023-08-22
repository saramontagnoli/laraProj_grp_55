@extends('layouts.struttura')

@section('title', 'Modifica dati personali del cliente')

@section('content')
    <div class="wrapper wrapper-register">
        <div class="form-box form-box-inputdialog">
            <h2>Modifica dati personali di: {{$dati['username']}}</h2>

            @if (session('success'))
                <div class="form-insertFAQ">
                    {{ session('success') }}
                </div>
            @endif

            <br>
            @csrf
            {{ Form::open(array('url' => '/modificaDatiL1', 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}
            <div class="form-row">
                <div class="form-left">
                    {{ Form::label('nome', 'Nome', ['class' => 'label-input']) }}
                    {{ Form::text('nome', $dati['nome'], ['class' => 'input', 'id' => 'nome', 'required' => 'required']) }}
                    @if ($errors->first('nome'))
                        <ul class="errors">
                            @foreach ($errors->get('nome') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {{ Form::label('cognome', 'Cognome', ['class' => 'label-input']) }}
                    {{ Form::text('cognome', $dati['cognome'], ['class' => 'input', 'id' => 'cognome', 'required' => 'required']) }}
                    @if ($errors->first('cognome'))
                        <ul class="errors">
                            @foreach ($errors->get('cognome') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {{ Form::label('data_nascita', 'Data di nascita', ['class' => 'label-input']) }}
                    {{ Form::date('data_nascita', $dati['data_nascita'], ['class' => 'input', 'id' => 'data_nascita', 'rules' => 'date_format:d-m-Y', 'required' => 'required']) }}
                    @if ($errors->first('data_nascita'))
                        <ul class="errors">
                            @foreach ($errors->get('data_nascita') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                </div>

                <div class="form-right">
                    {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
                    {{ Form::text('email', $dati['email'], ['class' => 'input', 'id' => 'email', 'rules' => 'email', 'required' => 'required']) }}
                    @if ($errors->first('email'))
                        <ul class="errors">
                            @foreach ($errors->get('email') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password')}}
                    @if ($errors->first('password'))
                        <ul class="errors">
                            @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn">Modifica dati</button>
            <br>
        </div>
@endsection
