@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina della visualizzazione del riepilogo annuo del numero di noleggi divisi per mese -->
@section('content')
    <br><br>

    <!-- Titolo per il riepilogo dei noleggi divisi per mese dell'anno corrente -->
    <h1 class="titolo_info">RIEPILOGO NOLEGGI ANNO CORRENTE</h1>

    <!-- Stampa dell'anno corrente -->
    <p style="font-size: 14pt; font-weight: bolder;">Anno corrente di riepilogo: {{$annoCorrente}}</p>
    <br>

    <!-- Sezione della pagina che contiene la tabella a due colonne " Mese ", " Numero auto noleggiate " -->
    <div class="posizione_cx">
        <!-- Definizione della tabella -->
        <table class="tabella_noleggi">

            <!-- Riga di intestazione della tabella a due colonne -->
            <thead>
            <tr>
                <th style="width: 60%">Mese</th> <!-- Mese di riferimento dei noleggi -->
                <th style="width: 40%">Numero auto noleggiate</th> <!-- Numero di auto noleggiate nel mese relativo -->
            </tr>
            </thead>

            <!-- Corpo della tabella, contenente tutti i valori estratti dal Controller del riepilogo annuo -->
            <tbody>
            @foreach($risultatiFinali as $ris)
                <!-- Righe della tabella -->
                <tr>
                    <!-- Switch per la scrittura estesa del nome del mese a posto del numero del mese -->
                    @switch($ris['mese'])
                        @case(1)
                            <td>Gennaio</td> <!-- Gennaio -->
                        @break
                        @case(2)
                            <td>Febbraio</td> <!-- Febbraio -->
                            @break
                        @case(3)
                            <td>Marzo</td> <!-- Marzo -->
                            @break
                        @case(4)
                            <td>Aprile</td> <!-- Aprile -->
                            @break
                        @case(5)
                            <td>Maggio</td> <!-- Maggio -->
                            @break
                        @case(6)
                            <td>Giugno</td> <!-- Giugno -->
                            @break
                        @case(7)
                            <td>Luglio</td> <!-- Luglio -->
                            @break
                        @case(8)
                            <td>Agosto</td> <!-- Agosto -->
                            @break
                        @case(9)
                            <td>Settembre</td> <!-- Settembre -->
                            @break
                        @case(10)
                            <td>Ottobre</td> <!-- Ottobre -->
                            @break
                        @case(11)
                            <td>Novembre</td> <!-- Novembre -->
                            @break
                        @case(12)
                            <td>Dicembre</td> <!-- Dicembre -->
                            @break
                    @endswitch

                    <!-- Stampa del numero dei noleggi effettuati nel mese relativo -->
                    <td>{{$ris['num_noleggi']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
@endsection
