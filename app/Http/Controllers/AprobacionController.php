<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Aprobacion;
use Aprobacion1\http\Request\AprobacionRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AprobacionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Aprobaciones|Crear Aprobacion|Editar Aprobacion|Eliminar Aprobacion', ['only' => ['index','store']]);
         $this->middleware('permission:Aprobaciones', ['only' => ['index']]);
         $this->middleware('permission:Crear Aprobacion', ['only' => ['create','store']]);
         $this->middleware('permission:Editar Aprobacion', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar Aprobacion', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	
        //$clases = Clase::all();
        $nombre =$request->get('descripcion');
        $aprobaciones = Aprobacion::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('aprobacion.index',compact('aprobaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $aprobaciones = Aprobacion::all();
        return view('aprobacion.create');
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
          'descripcion'=>'required',
          'observacion'=>'required',
          'estado'=>'required',
          ]);
            Aprobacion::create($request->all());
            Alert::success('Aprobacion creada con éxito');
        return redirect()->route('aprobacion.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aprobaciones = Aprobacion::find($id);
      return view('aprobacion.show',compact('aprobaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $aprobaciones = Aprobacion::find($id);
        return view('aprobacion.edit',compact('aprobaciones'));
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
        $this->validate($request,[
          'descripcion'=>'required',
          'observacion'=>'required',
          'estado'=>'required',
          ]);
        Aprobacion::find($id)->update($request->all());
        Alert::success('Aprobacion actualizada con éxito');
        return redirect()->route('aprobacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idClase)
    {   
        return redirect()->route('aprobacion.index');
    }

}
