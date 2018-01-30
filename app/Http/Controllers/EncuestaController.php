<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encuesta;
use Response;

class EncuestaController extends Controller
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

    public function Encuestajson(Request $request, $device)
    {
        $respuesta = new Encuesta;
        $respuesta -> 1 = $request->respuesta1;
        $respuesta -> 2 = $request->respuesta2;
        $respuesta -> 3 = $request->respuesta3;
        $respuesta -> 4 = $request->respuesta3;
        $respuesta -> 5 = $request->respuesta5;
        $respuesta -> 6 = $request->respuesta6;
        $respuesta -> 7 = $request->respuesta7;
        $respuesta -> device = $device;
        $respuesta -> save();

        return Response::json(['device'=>$device, 'respuesta'=>$request->respuesta1]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
