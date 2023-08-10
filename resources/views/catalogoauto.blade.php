<!-- Si estende la struttura definita per le pagine del sito web -->
@extends('layouts.struttura')

<!-- Definizione della sezione del contenuto della pagina del catalogo generale delle auto -->
@section('content')

    <!-- Sezione dedicata al catalogo delle auto noleggiabili -->
    <h1 class="titolo_info">CATALOGO AUTO NOLEGGIABILI</h1>

    <form method="POST" action="{{ route('catalogoauto') }}" id="catalog-search-form">
        @csrf
        <h2>Filtri di ricerca</h2>
        <!-- Input per il filtro di ricerca -->
        <input type="number" name="min" placeholder="Prezzo min">
        <input type="number" name="max" placeholder="Prezzo max">

        <!-- Pulsante di invio del form -->
        <button type="submit">Cerca</button>
    </form>



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
                                <p class="titolo">{{$auto['nome_marca']}} - {{$auto['nome_modello']}} </p>
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div>NOT FOUND</div>
        @endif
    </div>
@endsection
