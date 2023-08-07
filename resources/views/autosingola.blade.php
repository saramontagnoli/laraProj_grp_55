@extends('layouts.struttura')

@section('content')

    <br>

    <a href="{{url('/catalogoauto')}}" class="previous">&laquo; INDIETRO </a>

    @if(count($data) < 1)
        <div>
            <strong>Sorry!</strong> No Product Found.
        </div>
    @else
        @foreach($data as $auto)
            <p> Targa: {{$auto->targa}} </p>

            <p> Targa: {{$auto->allestimento}} </p>
        @endforeach
    @endif
    <br><br><br><br>
@endsection
