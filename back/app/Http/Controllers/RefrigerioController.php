<?php

namespace App\Http\Controllers;

use App\Models\Refrigerio;
use App\Http\Requests\StoreRefrigerioRequest;
use App\Http\Requests\UpdateRefrigerioRequest;

class RefrigerioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRefrigerioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function totalreg(Request $request){
        return DB::SELECT("SELECT (select count(*) from cupos where ci is not null) total,
         (select COUNT(*) from refrigerios where turno='$request->turno' and date(fecha)='$request->fecha') refri ");
        
    }
    public function store(StoreRefrigerioRequest $request)
    {
        //
        $cupo=Cupo::where('ci',$ci)->first();
        $refrigerio=Refrigerio::where('cupo_id',$cupo->id)->where('turno',$request->turno)->where('fecha',$request->fecha)->get();
        if(sizeof($refrigerio)==0){
            $refri=new Refrigerio;
            $refri->fecha=$request->fecha;
            $refri->hora=$request->hora;
            $refri->turno=$request->turno;
            $refri->cupo_id=$cupo->id;
            $refri->save();
        }
        else{
            return response()->json(['message' => 'Se encuentra registrado'], 500);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refrigerio  $refrigerio
     * @return \Illuminate\Http\Response
     */
    public function show(Refrigerio $refrigerio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refrigerio  $refrigerio
     * @return \Illuminate\Http\Response
     */
    public function edit(Refrigerio $refrigerio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRefrigerioRequest  $request
     * @param  \App\Models\Refrigerio  $refrigerio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRefrigerioRequest $request, Refrigerio $refrigerio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refrigerio  $refrigerio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refrigerio $refrigerio)
    {
        //
    }
}
