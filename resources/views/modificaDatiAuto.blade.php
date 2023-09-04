<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

@section('title', 'Modifica dati di un auto')
<!-- Definizione della sezione del contenuto della pagina della singola auto -->
@section('content')
    <div>
        <div>
            <h2 class="titolo_info">Modifica dati dell'auto {{$dati['nome_marca']}} - {{$dati['nome_modello']}}</h2>

            <br>
            <div>
                <!-- Button indietro che permette di tornare alla pagina di gestione delle F.A.Q. -->
                <a href="{{ route('gestioneauto') }}" class="bottone">&laquo; INDIETRO </a>
            </div>
            @csrf
            {{ Form::open(array('url' => '/modificadatiauto', 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}
            <div class="posizione_cx">
                <div>
                    {{ Form::hidden('codice_auto', $dati['codice_auto'], ['id' => 'codice_auto', 'class' => 'campo_form']) }}
                    <br>
                    {{ Form::label('targa', 'Targa') }}
                    <br>
                    {{ Form::text('targa', $dati['targa'], ['class' => 'campo_form', 'id' => 'targa', 'required' => 'required']) }}
                    <br>
                    @if ($errors->first('nome'))
                        <ul class="errors">
                            @foreach ($errors->get('targa') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {{ Form::label('nome_marca', 'Marca') }}
                    <br>
                    {{ Form::text('nome_marca', $dati['nome_marca'], ['class' => 'campo_form', 'readonly' => true, 'id' => 'nome_marca', 'required' => 'required']) }}

                    @if ($errors->first('nome_marca'))
                        <ul class="errors">
                            @foreach ($errors->get('nome_marca') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br>
                    {{ Form::label('nome_modello', 'Modello') }}
                    <br>
                    {{ Form::text('nome_modello', $dati['nome_modello'], ['class' => 'campo_form', 'readonly' => true, 'id' => 'nome_modello','required' => 'required']) }}

                    @if ($errors->first('nome_modello'))
                        <ul class="errors">
                            @foreach ($errors->get('nome_modello') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br>
                </div>

                <div>
                    {{ Form::label('num_posti', 'Numero Posti') }}
                    <br>
                    {{ Form::text('num_posti', $dati['num_posti'], ['class' => 'campo_form', 'id' => 'num_posti', 'rules' => 'num_posti', 'required' => 'required']) }}

                    @if ($errors->first('num_posti'))
                        <ul class="errors">
                            @foreach ($errors->get('num_posti') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br>

                    {{ Form::label('allestimento', 'Allestimento')}}
                    <br>
                    {{ Form::text('allestimento', $dati['allestimento'], ['class' => 'campo_form', 'id' => 'allestimento', 'rules' => 'allestimento', 'required' => 'required']) }}
                    @if ($errors->first('allestimento'))
                        <ul class="errors">
                            @foreach ($errors->get('allestimento') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br>

                    {{ Form::label('costo_giorno', 'Costo Giornaliero') }}
                    <br>
                    {{ Form::text('costo_giorno', $dati['costo_giorno'], ['class' => 'campo_form', 'id' => 'costo_giorno', 'rules' => 'costo_giorno', 'required' => 'required']) }}

                    @if ($errors->first('costo_giorno'))
                        <ul class="errors">
                            @foreach ($errors->get('costo_giorno') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br>
                </div>
            </div>
            <div class="posizione_cx">
                {{ Form::submit('Modifica Auto', ['class' => 'bottone', 'onclick' => 'return confirmModifica()']) }}
                {{ Form::close() }}
            </div>
            <br>
        </div>

@endsection
