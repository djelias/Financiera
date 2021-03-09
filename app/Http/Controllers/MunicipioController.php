<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Departamento;
use App\Municipio;
use Municipio1\http\Request\MunicipioRequest;
use RealRashid\SweetAlert\Facades\Alert;


class MunicipioController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$departamentos = Departamento::all();
        $nombre =$request->get('nombreMunicipio');
        $municipios = Municipio::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('municipio.index',compact('municipios','departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        return view('municipio.create', compact('departamentos','municipios'));
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
          'idDepto'=>'required|numeric',  
          'nombreMunicipio'=>'required|alpha_spaces',
          ]);
            Municipio::create($request->all());
            Alert::success('Municipio agregado con éxito');
        return redirect()->route('municipio.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $municipios = Municipio::find($id);
      return view('municipio.show',compact('municipios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idMunicipio)
    {
        $departamentos = Departamento::all();
        $municipios = Municipio::find($idMunicipio);
        return view('municipio.edit',compact('municipios','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idMunicipio)
    {
        $this->validate($request,[
          'idDepto'=>'required|numeric',  
          'nombreMunicipio'=>'required|alpha_spaces',
          ]);
        Municipio::find($idMunicipio)->update($request->all());
        Alert::success('Municipio actualizado con éxito');
        return redirect()->route('municipio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idMunicipio)
    {
        try{
             Municipio::find($idMunicipio)->delete();
             Alert::success('Municipio eliminado con exito');
        return redirect()->route('municipio.index');
    }catch (\Illuminate\Database\QueryException $e) {
    	Alert::danger('No se Puede eliminar este registro porque esta asociado con otra asignación');
        return redirect()->route('municipio.index');
    }
    }

}
