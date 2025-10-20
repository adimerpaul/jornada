<?php

namespace App\Http\Controllers;

use App\Models\Conferencia;
use App\Http\Requests\StoreConferenciaRequest;
use App\Http\Requests\UpdateConferenciaRequest;

class ConferenciaController extends Controller
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
     * @param  \App\Http\Requests\StoreConferenciaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConferenciaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conferencia  $conferencia
     * @return \Illuminate\Http\Response
     */
    public function show(Conferencia $conferencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conferencia  $conferencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Conferencia $conferencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConferenciaRequest  $request
     * @param  \App\Models\Conferencia  $conferencia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConferenciaRequest $request, Conferencia $conferencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conferencia  $conferencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conferencia $conferencia)
    {
        //
    }
}
