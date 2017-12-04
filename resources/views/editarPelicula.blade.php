<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Editar Pelicula</h1>
    @isset($laPeli)

    <form action="{{ route('edicion', $laPeli->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      Titulo<br><input type="text" name="title" value="{{ old('title', $laPeli->title) }}"><br>
      Premios<br><input type="text" name="awards" value="{{ old('awards', $laPeli->awards) }}"><br>
      Rating<br><input type="text" name="rating" value="{{ old('rating', $laPeli->rating) }}"><br>
      Lanzamiento<br><input type="date" name="release_date" value="{{ old('release_date', date('Y-m-d', strtotime($laPeli->release_date))) }}"><br>


      <button type="submit">Agregar</button>
    </form>

    @endisset

    @if (count($errors ) > 0)
        <ul style="color: red">
          @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
          @endforeach
        </ul>
    @endif

  </body>
</html>
