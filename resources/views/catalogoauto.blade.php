<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina del catalogo generale delle auto -->
@section('content')

    <!-- Sezione dedicata al catalogo delle auto noleggiabili -->
    <h1 class="titolo_info">CATALOGO AUTO NOLEGGIABILI</h1>

    <!-- Form predisposta per la ricerca delle auto all'interno del catalogo -->
    <form method="POST" action="{{ route('catalogoauto') }}">
        @csrf

        <!-- Definizione della sezione dei filtri di ricerca -->
        <h3 class="titolo posizione_cx">Filtri di ricerca:</h3>

        <div class="rigacatalogo">
            <div class="colonna colonna_filtro ">
                <!-- Input per il filtro di ricerca prezzo minimo -->
                <label class="titolo">
                    Inserire prezzo min:
                    <br>
                    <input class="campo_form" type="number" step="0.01" name="min" placeholder="Prezzo min" min="0">
                </label>

                <br>

                <!-- Input per il filtro di ricerca prezzo massimo -->
                <label class="titolo">
                    Inserire prezzo max:
                    <br>
                    <input class="campo_form" type="number" step="0.01" name="max" placeholder="Prezzo max" min="0">
                </label>
            </div>

            <!-- Se l'utente autenticato è di tipo 'user' si aggiungono i filtri per data -->
            @if(auth()->check() && (Auth::user()->role=='staff' || Auth::user()->role=='admin' || Auth::user()->role=='user') )
                <div class="colonna colonna_filtro">
                    <!-- Input per il filtro di ricerca data inizio -->
                    <label class="titolo">
                        DA:&nbsp;
                        <input class="campo_form" type="date" name="inizio">
                    </label>

                    <!-- Input per il filtro di ricerca prezzo massimo -->
                    <label class="titolo">
                        A:
                        <input class="campo_form" type="date" name="fine">
                    </label>
                </div>

                @if(session('popupMessage'))
                    <script>
                        alert("{{ session('popupMessage') }}");
                    </script>
                @endif
            @endif
        </div>

        <div class="rigacatalogo">
            <!-- Button di submit per l'invio dei dati inseriti nella form -->
            <button type="submit" class="bottone" name="action" value="submit1">Cerca</button>
        </div>

    </form>

    <!-- Definizione della riga del catalogo -->
    <div class="rigacatalogo">
        <!-- Per ogni auto estratta dalla tabella del database viene stampata la relativa card -->
        @if(!empty($cardAuto))
            @foreach ($cardAuto as $auto)

                <!-- Definizione della colonna del catalogo -->
                <div class="colonnacatalogo">
                    <!-- Definizione del link cliccabile per ogni auto -->
                    <a href="{{ url('/catalogoauto/'.$auto->codice_auto)}}" style="text-decoration: none; color:black">

                        <!-- Definizione della card dedll'auto con le informazioni -->
                        <div class="cardauto">

                            <!-- Inserimento dell'immagine dal path definito all'interno del database -->
                            <img class="imgauto_catalogo" src="{{$auto ->foto_auto}}" alt="IMMAGINE NON DISPONIBILE AL MOMENTO">

                            <!-- Inserimento della marca, modello e costo dell'auto -->
                            <div class="nomeauto">
                                <p class="titolo">{{$auto -> nome_marca}} {{$auto ->nome_modello}} - {{$auto -> costo_giorno}}€ </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <!-- Se non viene trovata nessuna auto allora si stampa un messaggio di errore -->
            <div style="padding-top: 30px"> SORRY! CARS NOT FOUND</div>
        @endif
    </div>
@endsection
