<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class PeliculasController extends Controller
    {
     public $peliculas = [
        1 => "Toy",
        2 => "Buscando a Nemo",
        3 => "Avatar",
        4 => "Happyo",
        5 => "Algo",
        6 => "Story",
        7 => "nemo"
      ];

    public function buscarPeliculaId($id){
      if ($id <= 6) {
        $result = $this->peliculas[$id];
      } else {
        $result = 'No existe';
      }

      return view('peliculas', ['unaPelicula'=>$result]);
    }

    public function buscarPeliculaNombre($nombre){

    foreach ($this->peliculas as $value) {
        if($value == $nombre){
          $encontrada = $value;
          break;
        }
        else {
          $encontrada = "Película inexistente";
        }
      }
      // $final = $encontrada;
      return $encontrada;
    }

    public function listarPeliculas(){
      // return view('peliculas', ['listadoPeliculas'=>$this->peliculas]); //estoy llamando a peliculas.blade.php
      $peliculas = Movie::all();

      return view('peliculas', ['listadoPeliculas'=>$peliculas]);
    }

    public function agregarPelicula(){
      return view('agregarPelicula');
    }
    public function crearPelicula(Request $request){
      $this->validate(
        $request,
        [
          'title' => 'required | unique:movies',
          'awards' => 'required | numeric',
          'rating' => 'required | numeric | between:1,10',
        ],
        [
          'title.unique' => 'La peli ya existe',
          'title.required' => 'El título es obligatorio',
          'awards.required' => 'Los premios son obligatorios',
          'rating.required' => 'El rating es obligatorio',
          'numeric' => 'El campo :attribute debe ser un número',
          'rating.between' => 'Rating, entre 1 y 10',
        ]
      );

      $pelicula = new Movie($request->all());


      $pelicula->save();

      return redirect('peliculas');
    }

    public function edicion(Request $request, $id){
      $this->validate(
        $request,
        [
          'title' => 'required',
          'awards' => 'required | numeric',
          'rating' => 'required | numeric | between:1,10',
        ],
        [
          'title.required' => 'El título es obligatorio',
          'awards.required' => 'Los premios son obligatorios',
          'rating.required' => 'El rating es obligatorio',
          'numeric' => 'El campo :attribute debe ser un número',
          'rating.between' => 'Rating, entre 1 y 10',
        ]
      );

      $pelicula = Movie::findOrFail($id);
      $pelicula->fill($request->all());
      $pelicula->save();

      return redirect('peliculas');
    }

    public function editarPelicula($id){
      $laPeli = Movie::findOrFail($id);

      return view('editarPelicula', compact('laPeli'));
    }


    }

    // public function detalle($id) {
    //   $pelicula = Pelicula::find($id);
    //   $genero = $pelicula->genero;
    //
    //   return view('peliculas.pelicula', compact('pelicula', 'genre'));
    // }
