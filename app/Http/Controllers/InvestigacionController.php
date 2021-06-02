<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Investigacion;
use App\Zona;
use App\Municipio;
use App\TipoInvestigacion;
use App\User;
use Investigacion1\http\Request\InvestigacionRequest;
use RealRashid\SweetAlert\Facades\Alert;

class InvestigacionController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
    	$zonas = Zona::all();
      $municipios = Municipio::all();
      $tipoInvestigaciones = TipoInvestigacion::all();
      $users = User::all();
      $nombre =$request->get('nombreInv');
      $investigaciones = Investigacion::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('investigacion.index',compact('zonas','municipios','tipoInvestigaciones','investigaciones','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $zonas = Zona::all();
        $municipios = Municipio::all();
        $tipoInvestigaciones = TipoInvestigacion::all();
        $users = User::all();
        $investigaciones = Investigacion::all();
        
        return view('investigacion.create', compact('zonas','municipios','tipoInvestigaciones','investigaciones','users'));
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
          'idZona', 
           'idMunicipio',
           'idTipo',
           'idUsuario',
          'nombreInv'=>'required|alpha_spaces',
          'fechaIngreso',
          'lugarInv'=>'required|alpha_spaces',
          'responsableInv'=>'required|alpha_spaces',
          'objetivo'=>'required|alpha_spaces',
          'contacto'=>'required|alpha_spaces',
          'unidadEncargada'=>'required|alpha_spaces',
          'otrasInstit'=>'required|alpha_spaces',
          'documentacion'=>'required|alpha_spaces',
          'descripcionInvestigacion'=>'required|alpha_spaces',
          'correoElectronico'=>'required|alpha_spaces',

          ]);
            Investigacion::create($request->all());
            Alert::success('Investigacion agregada con éxito');
      return redirect()->route('investigacion.index');
      

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $investigaciones = Investigacion::find($id);
      return view('investigacion.show',compact('investigaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idInv)
    {
        $zonas = Zona::all();
        $municipios = Municipio::all();
        $tipoInvestigaciones = TipoInvestigacion::all();
        $users = User::all();
        $investigaciones = Investigacion::find($idInv);
        return view('investigacion.edit',compact('zonas','municipios','tipoInvestigaciones','investigaciones','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idInv)
    {
        $this->validate($request,[
          'idZona' ,
          'idMunicipio',
          'idTipo', 
          'idUsuario',
          'nombreInv'=>'required|alpha_spaces',
          'fechaIngreso',
          'lugarInv'=>'required|alpha_spaces',
          'responsableInv'=>'required|alpha_spaces',
          'objetivo'=>'required|alpha_spaces',
          'contacto'=>'required|alpha_spaces',
          'unidadEncargada'=>'required|alpha_spaces',
          'otrasInstit'=>'required|alpha_spaces',
          'documentacion'=>'required|alpha_spaces',
          'descripcionInvestigacion'=>'required|alpha_spaces',
          'correoElectronico'=>'required|alpha_spaces',
          ]);
        Investigacion::find($idInv)->update($request->all());
        Alert::success('Investigacion actualizada con éxito');
      return redirect()->route('investigacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idInv)
    {
        try{
             Investigacion::find($idInv)->delete();
             Alert::success('Investigacion eliminado con exito');
        return redirect()->route('investigacion.index');
    }catch (\Illuminate\Database\QueryException $e) {
    	Alert::danger('No se Puede eliminar este registro porque esta asociado con otra asignación');
        return redirect()->route('investigacion.index');
    }
    }

       
}
