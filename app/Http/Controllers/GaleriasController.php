<?php

namespace App\Http\Controllers;

use App\Galeria;
use Illuminate\Http\Request;

class GaleriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galerias = Galeria::orderBy('id', 'DESC')->paginate(10);
        return view('adminlte::galerias.index', compact('galerias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte::galerias.create');
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
 
        $galerias = new Galeria();
        $galerias -> nombre = $request->nombre;
        $galerias -> save();

        return redirect('galerias')->with('message', 'Se ha creado una nueva Galeria');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeria  $Galeria
     * @return \Illuminate\Http\Response
     */
    public function show($galeria)
    {
     
    $datos = Galeria::where('id',$galeria)->with('video')->first();
    
    return view('adminlte::galerias.show')->with(['datos'=> $datos]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeria  $Galeria
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeria $galeria)
    {
        return view('adminlte::galerias.edit')->with(['galeria'=> $galeria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeria  $Galeria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeria $galeria)
    {
        $this->validate($request,[
            'nombre' => 'required',
        ]);

        $galeria->nombre = $request->get('nombre');
        $galeria->save();

        return redirect('galerias')->with('message', 'Se ha editado el Galeria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeria  $Galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeria $galeria)
    {  
        $galerias = Galeria::where('id', $galeria->id)->first();
        $galerias->delete();

        return back()->with('info', 'La Galeria ha sido eliminado');
    }
}
