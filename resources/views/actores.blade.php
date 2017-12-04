@extends('layout')

@section('titulo')
  <title>Listado</title>
@endsection

@section('buscador')

      <form action="{{route('buscador')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
  				<h2>Buscar</h2>
  				<input class="form-control" type="text" name="buscar" autofocus>
          <button class="btn btn-primary" type="submit">Find</button>
  			</div>

  			<div class="form-group">

  			</div>
      </form>



@endsection
