<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventoCupo;

class EventoCupoController extends Controller
{
    //
    public function buscarEventoEst(Request $request){
        //return $request;
        $res= EventoCupo::where('evento_id',$request->id)->where('ci',$request->ci)->count();
        if($res<1)
            return response()->json(['message' => 'NO Esta Registrado el Estudiante'], 404);

        $res= EventoCupo::where('evento_id',$request->id)->where('ci',$request->ci)->first();
        //return $res;
        if($res->fecha_registro!=null)
            return response()->json(['message' => 'Estudiante Ya recibio'], 404);
        else
        {
            $res->estado='REGISTRADO';
            $res->fecha_registro=date('y-m-d');
            $res->user_id=$request->user()->id;
            $res->save();
            return $res;
        }
    }

}
