<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina del catalogo generale delle auto -->
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/filtri_catalogo.js') }}"></script>
    <!-- Sezione dedicata al catalogo delle auto noleggiabili -->
    <h1 class="titolo_info">CATALOGO AUTO NOLEGGIABILI</h1>

    <button type="button" id="mostra_filtri" class="bottone" name="action" value="submit1">Mostra Filitri</button>
    <!-- Form predisposta per la ricerca delle auto all'interno del catalogo -->

    <div id="filtri">
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

                <div class="colonna colonna_filtro ">
                    <!-- Input per il filtro di ricerca per numero posti -->
                    <label class="titolo">
                        Seleziona il numero di posti:
                        <br>
                        <select class="campo_form" name="num_posti">
                            <option value="0"></option>
                            <option value="1">1 posto</option>
                            <option value="2">2 posti</option>
                            <option value="3">3 posti</option>
                            <option value="4">4 posti</option>
                            <option value="5">5 posti</option>
                            <option value="6">6 posti</option>
                            <option value="7">7 posti</option>
                            <option value="8">8 posti</option>
                            <option value="9">9 posti</option>
                        </select>
                    </label>
                    <br>
                </div>
                <!-- Se l'utente autenticato è di tipo 'user' si aggiungono i filtri per data -->
                @if(auth()->check() && (Auth::user()->role=='staff' || Auth::user()->role=='admin' || Auth::user()->role=='user') )
                    <div class="colonna colonna_filtro">
                        <!-- Input per il filtro di ricerca data inizio -->
                        <!-- Campo input type=date per l'inserimento dell'inizio del noleggio -->
                        <label>
                            Da:
                            <input class="campo_form" type="date" name="inizio" required id="inizio">
                        </label>

                        <script>
                            // Ottieni la data odierna in formato "AAAA-MM-GG"
                            const today = new Date().toISOString().split('T')[0];
                            // Imposta la data minima come attributo "min" dell'elemento input
                            document.getElementById("inizio").setAttribute("min", today);
                        </script>

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
    </div>
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
