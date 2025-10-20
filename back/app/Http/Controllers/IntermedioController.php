<?php

namespace App\Http\Controllers;

use App\Models\Intermedio;
use App\Http\Requests\StoreIntermedioRequest;
use App\Http\Requests\UpdateIntermedioRequest;

class IntermedioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Intermedio::all();
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
     * @param  \App\Http\Requests\StoreIntermedioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIntermedioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Intermedio  $intermedio
     * @return \Illuminate\Http\Response
     */
    public function show(Intermedio $intermedio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Intermedio  $intermedio
     * @return \Illuminate\Http\Response
     */
    public function edit(Intermedio $intermedio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIntermedioRequest  $request
     * @param  \App\Models\Intermedio  $intermedio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIntermedioRequest $request, Intermedio $intermedio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Intermedio  $intermedio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intermedio $intermedio)
    {
        //
    }
}
