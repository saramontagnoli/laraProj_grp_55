<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina del catalogo generale delle auto -->
@section('content')

    <!-- Sezione dedicata al catalogo delle auto noleggiabili -->
    <h1 class="titolo_info">CATALOGO AUTO NOLEGGIABILI</h1>
    @if(!auth()->check())
        <button onclick="mostra()">Ricerca</button>
    @endif
    @can('isUser')
     <button onclick="mostra()">Ricerca o Noleggia</button>
    @endcan
    <!-- Form da completare per la ricerca delle auto -->
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
                Data fine noleggio:
                <input type="date" name="fine">
            </label>
            @if(session('popupMessage'))
                <script>
                    alert("{{ session('popupMessage') }}");
                </script>
            @endif
        @endcan

        <!-- Pulsante di invio del form -->
        <button type="submit"  onclick="diattivaCampiNoleggio()" data="true">Cerca</button>
       @can('isUser')
            <button type="submit" onclick="attivaCampiNoleggio()" data="true">Noleggia</button>
        @endcan
    </form>
    <script>
        function attivaCampiNoleggio() {
            var campiPrezzoMin = document.getElementsByName('min')[0];
            var campiPrezzoMax = document.getElementsByName('max')[0];
            var campiPeriodoInizio = document.getElementsByName('inizio')[0];
            var campiPeriodoFine = document.getElementsByName('fine')[0];

            var noleggiaButton = document.querySelector('button[onclick="attivaCampiNoleggio()"]');
            if (noleggiaButton.getAttribute('data') == 'true') {
                campiPrezzoMax.setAttribute('required', 'required');
                campiPrezzoMin.setAttribute('required', 'required');
                campiPeriodoInizio.setAttribute('required', 'required');
                campiPeriodoFine.setAttribute('required', 'required');
            }
        }

        function diattivaCampiNoleggio(){
            var campiPrezzoMin = document.getElementsByName('min')[0];
            var campiPrezzoMax = document.getElementsByName('max')[0];
            var campiPeriodoInizio = document.getElementsByName('inizio')[0];
            var campiPeriodoFine = document.getElementsByName('fine')[0];

            var noleggiaButton = document.querySelector('button[onclick="attivaCampiNoleggio()"]');
            if (noleggiaButton.getAttribute('data') == 'true') {
                campiPrezzoMin.removeAttribute('required');
                campiPrezzoMax.removeAttribute('required');
                campiPeriodoInizio.removeAttribute('required');
                campiPeriodoFine.removeAttribute('required');
            }
        }
    </script>
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
