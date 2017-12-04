@extends('layout')

@section('titulo')
  <title>Listado</title>
@endsection
@section ('resultados')
    @isset($listadoPeliculas)
      <ol>
        @foreach ($listadoPeliculas as $laPelicula)
          <li>
            Titulo: {{ $laPelicula->title }} <br>
            Rating: {{ $laPelicula->rating }} <br>
            Premios {{ $laPelicula->awards }} <br>
            <a href="{{ route('editarPeli', $laPelicula->id)}}">[editar]</a>
          </li>
        @endforeach
      </ol>
    @endisset

    {{-- @isset($unaPelicula)
        <h2>{{ $unaPelicula }}</h2>
    @endisset --}}
@endsection
