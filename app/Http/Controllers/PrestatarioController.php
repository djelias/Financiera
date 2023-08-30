<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestatario;
use Prestatario1\http\Request\PrestatarioRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PrestatarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Dominios|Crear Dominio|Editar Dominio|Eliminar Dominio', ['only' => ['index','store']]);
         $this->middleware('permission:Dominios', ['only' => ['index']]);
         $this->middleware('permission:Crear Dominio', ['only' => ['create','store']]);
         $this->middleware('permission:Editar Dominio', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar Dominio', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        //$nombre = $request->get('nombrePrestatario');
        $prestatarios = Prestatario::orderBy('id','DESC')->paginate(10);
               return view('prestatario.index',compact('prestatarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $prestatarios = Prestatario::all();
        return view('prestatario.create', compact('prestatarios'));
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

          'id','pnombre', 'snombre', 'papellido', 'sapellido', 'capellido', 'dui', 'email', 'tel', 'direccion', 'direccion2', 'ciudad' ,'municipio', 'zip', 'pais', 'comentario', 'cuenta', 'balance', 'imagen', 'estatus', 'estatus2'
        ]);
        
        Prestatario::create($request->all());
        Alert::success('Prestatario agregada con éxito');
        return redirect()->route('prestatario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestatarios = Prestatario::find($id);
      return view('prestatario.show',compact('prestatarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestatarios = Prestatario::find($id);
        return view('prestatario.edit',compact('prestatarios'));
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
          'id', 'pnombre', 'snombre', 'papellido', 'sapellido', 'capellido', 'dui', 'email', 'tel', 'direccion', 'direccion2', 'ciudad' ,'municipio', 'zip', 'pais', 'comentario', 'cuenta', 'balance', 'imagen', 'estatus', 'estatus2'
        ]);
        Prestatario::find($id)->update($request->all());
        return redirect()->route('prestatario.index')->with('success','Prestatario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Prestatario::find($id)->delete();
            Alert::success('Prestatario eliminada con exito');
        return redirect()->route('prestatario.index');
    		} catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otra asignación');
        return redirect()->route('prestatario.index');
        }
    }
}
