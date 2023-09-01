@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina del catalogo generale delle auto -->
@section('content')
    <br><br>

    <h1 class="titolo_info">RIEPILOGO NOLEGGI ANNO CORRENTE</h1>

    <p class="titolo">Anno corrente di riepilogo: {{$annoCorrente}}</p>
    <br>
    <div class="posizione_cx">
        <table class="tabella_noleggi">
            <thead>
            <tr>
                <th style="width: 60%">Mese</th>
                <th style="width: 40%">Numero auto noleggiate</th>
            </tr>
            </thead>
            <tbody>
            @foreach($risultatiFinali as $ris)
                <!-- Righe della tabella -->
                <tr>
                    @switch($ris['mese'])
                        @case(1)
                            <td>Gennaio</td>
                        @break
                        @case(2)
                            <td>Febbraio</td>
                            @break
                        @case(3)
                            <td>Marzo</td>
                            @break
                        @case(4)
                            <td>Aprile</td>
                            @break
                        @case(5)
                            <td>Maggio</td>
                            @break
                        @case(6)
                            <td>Giugno</td>
                            @break
                        @case(7)
                            <td>Luglio</td>
                            @break
                        @case(8)
                            <td>Agosto</td>
                            @break
                        @case(9)
                            <td>Settembre</td>
                            @break
                        @case(10)
                            <td>Ottobre</td>
                            @break
                        @case(11)
                            <td>Novembre</td>
                            @break
                        @case(12)
                            <td>Dicembre</td>
                            @break

                    @endswitch

                    <td>{{$ris['num_noleggi']}}</td>
                </tr>
            @endforeach

            <!-- Altre righe... -->
            </tbody>
        </table>
        <br><br>
    </div>


@endsection
