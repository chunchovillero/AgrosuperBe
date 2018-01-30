<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $galeria)
    {

        $video=$request->file('video');
        $cadena = \rand(100, 999);

        $video->move('uploads', $cadena.$video->getClientOriginalName());
        $imagen=$request->file('imagen');
        $imagen->move('uploads', $cadena.$imagen->getClientOriginalName());

        $videos = new Video();
        $videos -> nombre = $request->nombre;
        $videos -> url = $cadena.$video->getClientOriginalName();
        $videos -> imagen = $cadena.$imagen->getClientOriginalName();
        $videos -> galeria_id = $galeria;
        $videos -> save();

        return back()->with('message', 'Se ha creado un video a la galeria Galeria');
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
    public function destroy(Video $video, $galeria)
    {  
        $videos = Video::where('id', $video->id)->first();
        $videos->delete();

        return back()->with('info', 'Se ha eliminado un video');
    }
}
