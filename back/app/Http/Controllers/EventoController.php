<?php

namespace App\Http\Controllers;

use App\Models\Cupo;
use App\Models\Evento;
use App\Models\EventoCupo;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller{
    public function index(Request $request){
        if ($request->user()->role == 'ADMINISTRADOR') {
            return Evento::orderBy('id', 'desc')->get();
        }else{
            return Evento::orderBy('id', 'desc')->where('estado', 'ACTIVO')->get();
        }
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
        $evento= Evento::with('cupo')->findOrFail($id);
        $evento->libres = $evento->cupos - $evento->cupo->count();
        $evento->registrados = $evento->cupo->where('estado', 'REGISTRADO')->count();
        return $evento;
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
        DB::beginTransaction();
        try {

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
                $newCupo->nombres = $student->nombres;
                $newCupo->carrera = $student->carrera;
                $newCupo->save();

                $eventoCupo = new EventoCupo();
                $eventoCupo->evento_id = $evento->id;
                $eventoCupo->cupos_id = $newCupo->id;
                $eventoCupo->estado = 'PENDIENTE';
                $eventoCupo->ci = $ci;
                $eventoCupo->save();
                DB::commit();
            }else{
                return response()->json(['message' => 'Estudiante ya registrado'], 404);
            }
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['message' => 'Error al registrar'], 500);
        }
    }

    public function registroEvento(Request $request, $id){
        $evento = EventoCupo::findOrFail($id);
        $evento->estado = $request->estado;
        $evento->fecha_registro = date('y-m-d H:i:s');
        $evento->user_id = $request->user()->id;
        $evento->save();
        return $evento;
    }
}
