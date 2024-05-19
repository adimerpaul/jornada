<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller{
    public function index(){
        return Evento::orderBy('id', 'desc')->get();
    }
    public function store(Request $request){
        $codigo = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
        $evento = new Evento();
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->codigo = $codigo;
        $evento->fecha_inicio = $request->fecha_inicio;
        $evento->fecha_fin = $request->fecha_fin;
        $evento->estado = 'ACTIVO'; // Default value 'ACTIVO
        $evento->cupos = $request->cupos;
        $evento->save();
        return $evento;
    }
    public function show($id){
        return Evento::findOrFail($id);
    }
    public function update(Request $request, $id){
        $evento = Evento::findOrFail($id);
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->codigo = $request->codigo;
        $evento->fecha_inicio = $request->fecha_inicio;
        $evento->fecha_fin = $request->fecha_fin;
        $evento->estado = $request->estado;
        $evento->cupos = $request->cupos;
        $evento->save();
        return $evento;
    }
    public function destroy($id){
        $evento = Evento::findOrFail($id);
        $evento->delete();
        return $evento;
    }
}
