<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
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
     * @param  \App\Http\Requests\StoreMaterialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMaterialRequest $request)
    {
        //
        $request->id;
        $mat1=Material::where('cupo_id',$request->id)->where('nombre','CREDENCIAL')->first();
        if(!$mat1){ $mat1=DB::table('materials')->insert(['nombre'=>'CREDENCIAL','fecha'=>$request->fecha,'hora'=>$request->hora,'cupo_id'=>$request->id]);}
        $mat2=Material::where('cupo_id',$request->id)->where('nombre','BARBIJO')->first();
        if(!$mat2){ $mat2=DB::table('materials')->insert(['nombre'=>'BARBIJO','fecha'=>$request->fecha,'hora'=>$request->hora,'cupo_id'=>$request->id]);}
        $mat3=Material::where('cupo_id',$request->id)->where('nombre','FOLDER')->first();
        if(!$mat3){ $mat3=DB::table('materials')->insert(['nombre'=>'FOLDER','fecha'=>$request->fecha,'hora'=>$request->hora,'cupo_id'=>$request->id]);}
        $mat4=Material::where('cupo_id',$request->id)->where('nombre','CERTIFICADO')->first();
        if(!$mat4){ $mat4=DB::table('materials')->insert(['nombre'=>'CERTIFICADO','fecha'=>$request->fecha,'hora'=>$request->hora,'cupo_id'=>$request->id]);}
        $mat5=Material::where('cupo_id',$request->id)->where('nombre','CD')->first();
        if(!$mat5){ $mat5=DB::table('materials')->insert(['nombre'=>'CD','fecha'=>$request->fecha,'hora'=>$request->hora,'cupo_id'=>$request->id]);}

        if($mat1->estado != $request->credencial){
            $mat1->fecha=$request->fecha;
            $mat1->hora=$request->hora;
            $mat1->estado=$request->credencial;
            $mat1->save();
        }
        if($mat2->estado != $request->barbijo){
            $mat2->fecha=$request->fecha;
            $mat2->hora=$request->hora;
            $mat2->estado=$request->barbijo;
            $mat2->save();
        }
        if($mat3->estado != $request->folder){
            $mat3->fecha=$request->fecha;
            $mat3->hora=$request->hora;
            $mat3->estado=$request->folder;
            $mat3->save();
        }
        if($mat4->estado != $request->certificado){
            $mat4->fecha=$request->fecha;
            $mat4->hora=$request->hora;
            $mat4->estado=$request->certificado;
            $mat4->save();
        }
        if($mat5->estado != $request->cd){
            $mat5->fecha=$request->fecha;
            $mat5->hora=$request->hora;
            $mat5->estado=$request->cd;
            $mat5->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMaterialRequest  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMaterialRequest $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }
}
