<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina del catalogo generale delle auto -->
@section('content')

    <!-- Sezione dedicata al catalogo delle auto noleggiabili -->
    <h1 class="titolo_info">CATALOGO AUTO NOLEGGIABILI</h1>

    <button onclick="mostra()">Ricerca</button>

    <button onclick="mostra2()">Noleggia</button>

    <form method="POST" id="mostra_nascondi" style="display: none" action="{{ route('catalogoauto') }}">
        @csrf
        <h2>Filtri di ricerca:</h2>
        <!-- Input per il filtro di ricerca -->
        <label>
            Inserire prezzo min:
            <input type="number" step="0.01" name="min" placeholder="Prezzo min" min="0">
        </label>

        <label>
            Inserire prezzo max:
            <input type="number" step="0.01" name="max" placeholder="Prezzo max" min="0">
        </label>

        <br><br>

        @can('isUser')
            <label>
                Data inizio noleggio:
                <input type="date" name="inizio">
            </label>

            <label>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Data fine noleggio:
                <input type="date" name="fine">
            </label>
            @if(session('popupMessage'))
                <script>
                    alert("{{ session('popupMessage') }}");
                </script>
            @endif
        @endcan

        <!-- Pulsante di invio del form -->
        &nbsp; &nbsp; &nbsp; &nbsp;
        <button type="submit">Cerca</button>
    </form>

    <script>
        function mostra() {
            var x = document.getElementById("mostra_nascondi");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>


    <form method="POST" id="compari_scompari" style="display: none" action="{{ route('catalogoauto') }}">
        @csrf
        <h2>Noleggio:</h2>
        <!-- Input per il filtro di ricerca -->
        <label>
            Inserire prezzo min:
            <input type="number" step="0.01" name="min" placeholder="Prezzo min" min="0">
        </label>

        <label>
            Inserire prezzo max:
            <input type="number" step="0.01" name="max" placeholder="Prezzo max" min="0">
        </label>

        <br><br>

        @can('isUser')
            <label>
                Data inizio noleggio:
                <input type="date" name="inizio">
            </label>

            <label>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Data fine noleggio:
                <input type="date" name="fine">
            </label>
            @if(session('popupMessage'))
                <script>
                    alert("{{ session('popupMessage') }}");
                </script>
            @endif
        @endcan

        <!-- Pulsante di invio del form -->
        &nbsp; &nbsp; &nbsp; &nbsp;
        <button type="submit">Noleggia</button>
    </form>

    <script>
        function mostra2() {
            var x = document.getElementById("compari_scompari");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>



    <!-- Definizione della riga del catalogo -->
    <div class="rigacatalogo">

        <!-- Per ogni auto estratta dalla tabella del database viene stampata la relativa card -->
        @if(count($cardAuto)> 0)
            @foreach ($cardAuto as $auto)

                <!--  -->
                <div class="colonnacatalogo">
                    <!-- Definizione del link cliccabile per ogni auto -->
                    <a href="{{ url('/catalogoauto/'.$auto['codice_auto']) }}" style="text-decoration: none; color:black">

                        <!-- Definizione della card dedll'auto con le informazioni -->
                        <div class="cardauto">

                            <!-- Inserimento dell'immagine dal path definito all'interno del database -->
                            <img class="imgauto_catalogo" src="{{$auto['foto_auto']}}" alt="IMMAGINE NON DISPONIBILE AL MOMENTO">

                            <!-- Inserimento della targa dell'auto -->
                            <div class="nomeauto">
                                <p class="titolo">{{$auto['nome_marca']}} {{$auto['nome_modello']}} - {{$auto['costo_giorno']}}€ </p>
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div style="padding-top: 30px"> SORRY! CARS NOT FOUND</div>
        @endif
    </div>
@endsection
