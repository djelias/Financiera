<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoInvestigacion;
use TipoInvestigacion1\http\Request\TipoInvestigacionRequest;
use RealRashid\SweetAlert\Facades\Alert;


class TipoInvestigacionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      function __construct()
    {
         $this->middleware('permission:TiposInvestigaciones|Crear TipoInvestigacion|Editar TipoInvestigacion|Eliminar TipoInvestigacion', ['only' => ['index','show']]);
         $this->middleware('permission:Crear TipoInvestigacion', ['only' => ['create','store']]);
         $this->middleware('permission:Editar TipoInvestigacion', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar TipoInvestigacion', ['only' => ['destroy']]);
    }
    
   public function index(Request $request)
    {
        $nombre = $request->get('nombreTipoInvestigacion');
        $tipoInvestigaciones = TipoInvestigacion::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('tipoInvestigacion.index',compact('tipoInvestigaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $tipoInvestigaciones = TipoInvestigacion::all();
        return view('tipoInvestigacion.create', compact('tipoInvestigaciones'));
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

          'id',
          'nombreTipoInvestigacion',
          'descripcionTipo'
        ]);
        
        TipoInvestigacion::create($request->all());
        Alert::success('Tipo de Investigación  agregado con éxito');
        return redirect()->route('tipoInvestigacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoInvestigaciones = TipoInvestigacion::find($id);
      return view('tipoInvestigacion.show',compact('tipoInvestigaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idTipoInvestigacion)
    {
        $tipoInvestigaciones = TipoInvestigacion::find($idTipoInvestigacion);
        return view('tipoInvestigacion.edit',compact('tipoInvestigaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idTipoInvestigacion)
    {
        $this->validate($request,[
          'id',
          'nombreTipoInvestigacion',
          'descripcionTipo'
        ]);
        TipoInvestigacion::find($idTipoInvestigacion)->update($request->all());
        Alert::success('Tipo Investigación Actualizada con éxito');
        return redirect()->route('tipoInvestigacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTipoInvestigacion)
    {
        try{
            TipoInvestigacion::find($idTipoInvestigacion)->delete();
            Alert::success('Tipo de Investigación eliminada con exito');
        return redirect()->route('tipoInvestigacion.index');
            } catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otros datos');
        return redirect()->route('tipoInvestigacion.index');
        }
    }
}
