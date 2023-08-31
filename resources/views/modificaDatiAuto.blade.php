<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

@section('title', 'Modifica dati di un auto')
<!-- Definizione della sezione del contenuto della pagina della singola auto -->
@section('content')
    <div class="wrapper wrapper-register">
        <div class="form-box form-box-inputdialog">
            <h2>Modifica dati dell'auto {{$dati['targa']}}</h2>

            <br>
            @csrf
            {{ Form::open(array('url' => '/modificadatiauto', 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}
            <div class="form-row">
                <div class="form-left">
                    {{ Form::label('targa', 'Targa', ['class' => 'label-input']) }}
                    {{ Form::text('targa', $dati['targa'], ['class' => 'input', 'id' => 'targa', 'required' => 'required']) }}
                    @if ($errors->first('nome'))
                        <ul class="errors">
                            @foreach ($errors->get('targa') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {{ Form::label('marca_ref', 'Marca', ['class' => 'label-input']) }}
                    {{ Form::text('marca_ref', $dati['marca_ref'], ['class' => 'input', 'id' => 'marca_ref', 'required' => 'required']) }}
                    @if ($errors->first('marca_ref'))
                        <ul class="errors">
                            @foreach ($errors->get('marca_ref') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {{ Form::label('modello_ref', 'Modello', ['class' => 'label-input']) }}
                    {{ Form::label('modello_ref', $dati['modello_ref'], ['class' => 'input', 'id' => 'modello_ref','required' => 'required']) }}
                    @if ($errors->first('modello_ref'))
                        <ul class="errors">
                            @foreach ($errors->get('modello_ref') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                </div>

                <div class="form-right">
                    {{ Form::label('num_posti', 'Numero Posti', ['class' => 'label-input']) }}
                    {{ Form::label('num_posti', $dati['num_posti'], ['class' => 'input', 'id' => 'num_posti', 'rules' => 'num_posti', 'required' => 'required']) }}
                    @if ($errors->first('num_posti'))
                        <ul class="errors">
                            @foreach ($errors->get('num_posti') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {{ Form::label('allestimento', 'Allestimento', ['class' => 'label-input']) }}
                    {{ Form::label('allestimento', $dati['allestimento'], ['class' => 'input', 'id' => 'allestimento', 'rules' => 'allestimento', 'required' => 'required']) }}
                    @if ($errors->first('allestimento'))
                        <ul class="errors">
                            @foreach ($errors->get('allestimento') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {{ Form::label('costo_giorno', 'Costo Giornaliero', ['class' => 'label-input']) }}
                    {{ Form::label('costo_giorno', $dati['costo_giorno'], ['class' => 'input', 'id' => 'costo_giorno', 'rules' => 'costo_giorno', 'required' => 'required']) }}
                    @if ($errors->first('costo_giorno'))
                        <ul class="errors">
                            @foreach ($errors->get('costo_giorno') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                </div>
            </div>
            <button onclick="myFunction()" type="submit" class="btn">Modifica dati</button>
            <br>
        </div>

@endsection
