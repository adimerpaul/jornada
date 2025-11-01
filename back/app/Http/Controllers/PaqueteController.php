<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Models\Cupo;
use App\Http\Requests\StorePaqueteRequest;
use App\Http\Requests\UpdatePaqueteRequest;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // verificar si existe limite cantidad cupo y recuperar solo si no supera limit
        $res = Paquete::with('conferencias')->get();
        $resPaquetes = [];
        foreach ($res as $paquete) {
            $cupos = Cupo::where('paquete_id', $paquete->id)->get();
            if (sizeof($cupos) >= $paquete->limite) {
//                $res->remove($paquete);
            }else{
                $resPaquetes[] = $paquete;
            }
        }
        return $resPaquetes;
        //return Paquete::with('conferencias')->get();
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
     * @param  \App\Http\Requests\StorePaqueteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaqueteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paquete  $paquete
     * @return \Illuminate\Http\Response
     */
    public function show(Paquete $paquete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paquete  $paquete
     * @return \Illuminate\Http\Response
     */
    public function edit(Paquete $paquete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaqueteRequest  $request
     * @param  \App\Models\Paquete  $paquete
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaqueteRequest $request, Paquete $paquete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paquete  $paquete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paquete $paquete)
    {
        //
    }
}
