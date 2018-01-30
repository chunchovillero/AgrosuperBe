<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buzon;
use Response;

class BuzonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buzones=Buzon::orderBy('id', 'DESC')->paginate(20);
        return view('adminlte::buzon.index', compact('buzones'));
    }

    public function buzonjson(Request $request, $device)
    {
        $respuesta = new Buzon;
        $respuesta -> nombre = $request->nombre;
        $respuesta -> cargo = $request->cargo;
        $respuesta -> telefono = $request->telefono;
        $respuesta -> respuesta = $request->respuesta1;
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
