@extends('layouts.struttura')

@section('content')

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
