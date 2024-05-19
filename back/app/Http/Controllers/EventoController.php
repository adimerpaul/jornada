<?php

namespace App\Http\Controllers;

use App\Models\Cupo;
use App\Models\Evento;
use App\Models\EventoCupo;
use App\Models\Student;
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
    public function eventoSearch($codigo){
        error_log($codigo);
        $evento= Evento::where('codigo', $codigo)->where('estado', 'ACTIVO')->first();

        $libres = $evento->cupos - $evento->cupo->count();
        $evento->libres = $libres;
        return $evento;
    }
    public function searchStudent($ci, $codigo){
        $student = Student::where('ci', $ci)->first();
//        if (!$student) {
//            return response()->json(['message' => 'Estudiante no encontrado'], 404);
//        }
        return $student;


//        $evento= Evento::where('codigo', $codigo)->where('estado', 'ACTIVO')->first();
//        if (!$evento) {
//            return response()->json(['message' => 'Evento no encontrado'], 404);
//        }
//        $cupo = $evento->cupo->where('ci', $ci)->first();
//        if (!$cupo) {
//            $student = Student::where('ci', $ci)->first();
//            if (!$student) {
//                return response()->json(['message' => 'Estudiante no encontrado'], 404);
//            }
//            $newCupo = new Cupo();
//            $newCupo->ci = $ci;
//            $newCupo->nombre = $student->nombre;
//            $newCupo->direccion = $student->direccion;
//            $newCupo->save();
//
//            $eventoCupo = new EventoCupo();
//            $eventoCupo->evento_id = $evento->id;
//            $eventoCupo->cupo_id = $newCupo->id;
//            $eventoCupo->estado = 'PENDIENTE';
//            $eventoCupo->user_id = auth()->user()->id;
//            $eventoCupo->save();
//
//        }else{
//            return response()->json(['message' => 'Estudiante ya registrado'], 404);
//        }
    }

    function EventoCupoRegister($ci,$codigo){
        $evento= Evento::where('codigo', $codigo)->where('estado', 'ACTIVO')->first();
        if (!$evento) {
            return response()->json(['message' => 'Evento no encontrado'], 404);
        }
        $fecha_inicio = strtotime($evento->fecha_inicio);
        $fecha_fin = strtotime($evento->fecha_fin);
        if (time() < $fecha_inicio || time() > $fecha_fin) {
            return response()->json(['message' => 'Evento fuera de rango de fecha'], 404);
        }

        //veriifcar cantidad de cupos
        $libres = $evento->cupos - $evento->cupo->count();
        if ($libres <= 0) {
            return response()->json(['message' => 'Evento sin cupos'], 404);
        }
//        $verificadmos si esta en evntocupo
        $cupo = $evento->cupo->where('ci', $ci)->first();
        if (!$cupo) {
            $student = Student::where('ci', $ci)->first();
            if (!$student) {
                return response()->json(['message' => 'Estudiante no encontrado'], 404);
            }
            $newCupo = new Cupo();
            $newCupo->ci = $ci;
            $newCupo->nombres = $student->nombre;
            $newCupo->direccion = $student->direccion;
            $newCupo->save();

            $eventoCupo = new EventoCupo();
            $eventoCupo->evento_id = $evento->id;
            $eventoCupo->cupos_id = $newCupo->id;
            $eventoCupo->estado = 'PENDIENTE';
            $eventoCupo->ci = $ci;
            $eventoCupo->save();

        }else{
            return response()->json(['message' => 'Estudiante ya registrado'], 404);
        }
    }
}
