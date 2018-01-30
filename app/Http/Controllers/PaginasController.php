<?php

namespace App\Http\Controllers;

use App\Pagina;
use App\Tipo;
use App\Galeria;
use App\Video;
use App\Registro;
use App\Sesion;
use Illuminate\Http\Request;
use Response;

class PaginasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginas = Pagina::with('tipo')->orderBy('posicion', 'ASC')->paginate(10);
        return view('adminlte::paginas.index', compact('paginas'));
    }


    public function indexjson()
    {
        $paginas = Pagina::with('tipo')->orderBy('posicion', 'ASC')->paginate(10);
        $totalpaginas=count($paginas);

        $ancho=100/$totalpaginas;

        switch ($totalpaginas) {
            case 1:
                $lg=6;
                $sm=6;
                break;
            case 2:
                $lg=6;
                $sm=6;
                break;
            case 3:
                $lg=4;
                $sm=4;
                break;
            case 4:
                $lg=3;
                $sm=6;
                break;
            case 5:
                $lg=1;
                $sm=6;
                break;
            case 6:
                $lg=2;
                $sm=4;
                break;
            case 7:
                $lg=1;
                $sm=1;
                break;
            case 8:
                $lg=1;
                $sm=6;
                break;
            case 9:
                $lg=1;
                $sm=6;
                break;
            case 10:
                $lg=1;
                $sm=6;
                break;
        }

        return Response::json(['pagina'=>$paginas, 'lg'=>$lg, 'sm'=>$sm, 'ancho'=>$ancho]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos=Tipo::all();
        return view('adminlte::paginas.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $imagen=$request->file('imagen');
        $cadena = \rand(100, 999);
        $imagen->move('uploads', $cadena.$imagen->getClientOriginalName());


        $this->validate($request,[
            'nombre' => 'required',
            'email' => 'required|unique:user,email'
        ]);
 
        $paginas = new Pagina();
        $paginas -> nombre = $request->nombre;
        $paginas -> tipo_id = $request->tipo;
        $paginas -> posicion = $request->posicion;
        $paginas -> imagen = $cadena.$imagen->getClientOriginalName();
        $paginas -> save();

        return redirect('paginas')->with('message', 'Se ha creado una nueva pagina');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function show(Pagina $pagina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function edit(pagina $pagina)
    {
        $tipos=Tipo::all();
        return view('adminlte::paginas.edit', compact('tipos'))->with(['pagina'=> $pagina]);
    }


    public function configurar($pagina)
    {   
        $pagina=Pagina::with('tipo')->where('id',$pagina)->first();
        $galerias= Galeria::all();
        $configuracion=json_decode($pagina->configuracion);


        return view('adminlte::paginas.configurar', compact('pagina', 'configuracion', 'galerias'));
    }


    public function configurarjson($pagina, $device)
    {   
        $pagina=Pagina::with('tipo')->where('id',$pagina)->first();
        //registro de entrada a una pagina
        $registro = new Registro();
        $registro -> section = $pagina->nombre;
        $registro -> id_pagina = $pagina->id;
        $registro -> fecha = date("Y-m-d H:i:s");
        $registro -> device = $device;
        $registro -> save();

        $configuracion=json_decode($pagina->configuracion);
        $videos=0;

        if($pagina->tipo->nombre=='Videos'){
            $videos= Video::where('galeria_id',$configuracion->galeria)->get();
        }

         return Response::json(['pagina'=>$pagina, 'configuracion'=>$configuracion, 'videos'=>$videos]);
    }

    public function iniciarsesionjson(Request $request)
    {   

        $sesion = new Sesion();
        $sesion -> device = $request->device;
        $sesion -> save();

        return Response::json(['device'=>$request->device]);
    }


    public function configurarstore(Request $request, $pagina)
    {   

        $configuracion = json_encode($request->except('_token'));


        $configurar = Pagina::where('id', $pagina)->update([
            'configuracion' => $configuracion,
        ]);

        $paginas = Pagina::with('tipo')->orderBy('id', 'DESC')->paginate(10);

        return redirect('paginas')->with('message', 'Se ha editado la configuracion del a pagina');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @param  \App\pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagina $pagina)
    {
        $imagen=$request->file('imagen');
        if($imagen==null){
        
        }else
        {
            $cadena = \rand(100, 999);
            $imagen->move('uploads', $cadena.$imagen->getClientOriginalName());
            $pagina -> imagen = $cadena.$imagen->getClientOriginalName();
        }

        $this->validate($request,[
            'nombre' => 'required',
        ]);

        $pagina->nombre = $request->get('nombre');
        $pagina->tipo_id = $request->get('tipo');
        $pagina->posicion = $request->get('posicion');
        $pagina->save();

        return redirect('paginas')->with('message', 'Se ha editado la pagina');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagina $pagina)
    {  
        $paginas = Pagina::where('id', $pagina->id)->first();
        $paginas->delete();

        return back()->with('info', 'La pagina ha sido eliminado');
    }


    public function vistasporpaginas(){
        $registros = Registro::orderBy('id', 'DESC')->paginate(20);
        return view('adminlte::paginas.registros', compact('registros'));
    }
}
