<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Dominio;
use App\Reino;
use App\Filum;
use App\Clase;
use Clase1\http\Request\ClaseRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ClaseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Clases|Crear Clase|Editar Clase|Eliminar Clase', ['only' => ['index','store']]);
         $this->middleware('permission:Crear Clase', ['only' => ['create','store']]);
         $this->middleware('permission:Editar Clase', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar Clase', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	
        $filums = Filum::all();
        $clases = Clase::all();
        $nombre =$request->get('nombreClase');
        $clases = Clase::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('clase.index',compact('clases','filums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $filums = Filum::all();
        $clases = Clase::all();
        return view('clase.create', compact('reinos','clases'));
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
          'idFilum'=>'required|numeric',  
          'nombreClase'=>'required|alpha_spaces',
          ]);
            Clase::create($request->all());
            Alert::success('Clase agregada con éxito');
        return redirect()->route('clase.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clases = Clase::find($id);
      return view('clase.show',compact('clases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idClase)
    {
       
        $filums = Filum::all();
        $clases = Filum::find($idClase);
        return view('clase.edit',compact('clases','filums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idClase)
    {
        $this->validate($request,[
          'idFilum'=>'required|numeric',  
          'nombreClase'=>'required|alpha_spaces',
          ]);
        Clase::find($idClase)->update($request->all());
        Alert::success('Clase actualizada con éxito');
        return redirect()->route('clase.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idClase)
    {
        try{
             Clase::find($idClase)->delete();
             Alert::success('Clase eliminada con exito');
        return redirect()->route('reino.index');
    }catch (\Illuminate\Database\QueryException $e) {
    	Alert::danger('No se Puede eliminar este registro porque esta asociado a otros datos');
        return redirect()->route('clase.index');
    }
    }
}
