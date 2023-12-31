<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')
@section('content')

<script src="{{ asset('assets/js/aggiungi_faq.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var homeRoute = '{{ route('gestioneFaq') }}';

    $(function () {

        var actionUrl = "{{ route('aggiuntaFaq') }}";

        var formId = 'addfaq';
        $(":input:not([type='submit'])").on('blur', function (event) {

            var formElementId = $(this).attr('id');

            doElemValidation(formElementId, actionUrl, formId);

        });
        $("#addfaq").on('submit',function (event) {

            event.preventDefault();

            doFormValidation(actionUrl, formId);

        });

    });

</script>

    <!-- Definizione del titolo della pagina di aggiunta delle F.A.Q. -->
    <h1 class="titolo_info">AGGIUNTA F.A.Q.</h1>

    <br>

    <p class="posizione_cx">Utilizza questa form per aggiungere una nuova F.A.Q. al sito:</p>
    <br>

    <!-- Definizione della sezione della form di aggiunta di una nuova F.A.Q., con redirezione alla rotta di aggiuntaFaq -->
    <div class="posizione_cx">
        {{ Form::open(array('url' => '/aggiuntaFaq', 'id'=>"addfaq", 'enctype' => 'multipart/form-data')) }}

        <div>
            <!-- Definizione della label per l'inserimento della domanda -->
            {{ Form::label('domanda', 'Domanda') }}
            <br>
            <!-- Campo di inserimento della domanda, avente come id "domanda" -->
            {{ Form::text('domanda', '', ['id' => 'domanda', 'class' => 'campo_form']) }}

            <!-- Se vengono rilevati degli errori allora vengono stampati -->
            @if ($errors->first('domanda'))
                <ul>
                    @foreach ($errors->get('domanda') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <br>

        <div>
            <!-- Definizione della label per l'inserimento della risposta -->
            {{ Form::label('risposta', 'Risposta') }}
            <br>
            <!-- Campo di inserimento della risposta, avente come id "risposta" -->
            {{ Form::text('risposta', '', ['id' => 'risposta', 'class' => 'campo_form']) }}

            <!-- Se vengono rilevati degli errori allora vengono stampati -->
            @if ($errors->first('risposta'))
                <ul>
                    @foreach ($errors->get('risposta') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <br>

        <div>
            <!-- Bottone di submit per l'invio dei dati inseriti nella form di aggiunta della F.A.Q. -->
            {{ Form::submit('Aggiungi F.A.Q.', ['class' => 'bottone']) }}
        </div>

        <br><br>

        <!-- Tag di chiusura della Form di aggiunta della F.A.Q. -->
        {{ Form::close() }}

    </div>

@endsection
