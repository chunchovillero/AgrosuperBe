<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluar;
use Response;

class EvaluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encuestas=Evaluar::orderBy('id', 'DESC')->paginate(20);
        return view('adminlte::evaluar.index', compact('encuestas'));
    }

    public function evaluarjson(Request $request, $device)
    {
        $respuesta = new Evaluar;
        $respuesta -> respuesta1 = $request->respuesta1;
        $respuesta -> respuesta2 = $request->respuesta2;
        $respuesta -> respuesta3 = $request->respuesta3;
        $respuesta -> respuesta4 = $request->respuesta4;
        $respuesta -> respuesta5 = $request->respuesta5;
        $respuesta -> respuesta6 = $request->respuesta6;
        $respuesta -> respuesta7 = $request->respuesta7;
        $respuesta -> device = $device;
        $respuesta -> save();

        return Response::json(['device'=>$device, 'respuesta'=>$request->all()]);
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
