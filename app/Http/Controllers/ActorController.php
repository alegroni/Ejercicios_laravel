<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;


class ActorController extends Controller
{
  public function directory(){

    $actores = Actor::all();

    return view('actores', compact('actores'));
  }

  public function show($id) {
    $actor = Actor::findOrFail($id);
    $nombre = $actor->first_name . " " . $actor->last_name;

    return view('actor', compact('nombre'));
  }
  public function buscarActoresForm(){
    return view('actores');
  }

  public function search(Request $request){
    $this->validate($request,
    [
      'buscar' => 'required'
    ],
    [
      'buscar:required' => 'Ingrese el nombre de un actor'
    ]);

    $busqueda = $request->input('buscar');

    $actoresEncontrados = Actor::where('first_name', 'like', '%'. $busqueda .'%')->get();
    return view('actoresEncontrados', compact('actoresEncontrados'));
  }
}
