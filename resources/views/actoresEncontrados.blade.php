@extends('layout')

@section('titulo')
  <title>Listado</title>
@endsection
@section ('resultados')
      <ol>
        @if (isset($actoresEncontrados))
          @foreach ($actoresEncontrados as $elActor)
            <li>
              Nombre: {{$elActor->first_name . " " . $elActor->last_name }} <br>
              Rating: {{$elActor->rating}};
              <br><br>
            </li>
          @endforeach

        @endif

      </ol>
@endsection
