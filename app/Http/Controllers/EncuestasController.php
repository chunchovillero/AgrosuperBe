<?php

namespace App\Http\Controllers;

use App\Encuesta;
use Illuminate\Http\Request;

class EncuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encuestas = Encuesta::orderBy('id', 'DESC')->paginate(10);
        return view('adminlte::encuestas.index', compact('encuestas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte::encuestas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'nombre' => 'required',
        ]);
 
        $encuestas = new Encuesta();
        $encuestas -> nombre = $request->nombre;
        $encuestas -> save();

        return redirect('encuestas')->with('message', 'Se ha creado una nueva Encuesta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeria  $Galeria
     * @return \Illuminate\Http\Response
     */
    public function show($encuesta)
    {
     
    $datos = Encuesta::where('id',$encuesta)->with('pregunta')->first();
    
    return view('adminlte::encuestas.show')->with(['datos'=> $datos]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeria  $Galeria
     * @return \Illuminate\Http\Response
     */
    public function edit(Encuesta $encuesta)
    {
        return view('adminlte::encuestas.edit')->with(['encuesta'=> $encuesta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeria  $Galeria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encuesta $encuesta)
    {
        $this->validate($request,[
            'nombre' => 'required',
        ]);

        $encuesta->nombre = $request->get('nombre');
        $encuesta->save();

        return redirect('encuestas')->with('message', 'Se ha editado el Encuesta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeria  $Galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encuesta $encuesta)
    {  
        $encuestas = Encuesta::where('id', $encuesta->id)->first();
        $encuestas->delete();

        return back()->with('info', 'La Encuesta ha sido eliminado');
    }
}
