<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Agregar Peli</h1>
    <form action="{{ route('crearPeli') }}" method="post">
      {{ csrf_field() }}
      Titulo<br><input type="text" name="title" value="{{ old('title') }}"><br>
      Premios<br><input type="text" name="awards" value="{{ old('awards') }}"><br>
      Rating<br><input type="text" name="rating" value="{{ old('rating') }}"><br>
      Lanzamiento<br><input type="date" name="release_date" value="{{ old('release_date') }}"><br>
      <button type="submit">Agregar</button>
    </form>

    @if (count($errors ) > 0)
        <ul style="color: red">
          @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
          @endforeach
        </ul>
    @endif

  </body>
</html>
