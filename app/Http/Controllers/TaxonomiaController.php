<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Coleccion;
use App\Especie;
use App\Especimen;
use Taxonomia1\http\Request\TaxonomiaRequest;
use RealRashid\SweetAlert\Facades\Alert;
class TaxonomiaController extends Controller
{
    //
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$coleccion = Coleccion::all();
    	$especies = Especie::all();
    	$especimenes= Especimen::all();
    	$nombre =$request->get('nombreTaxonomia');
        $taxonomias = Taxonomia::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('taxonomia.index',compact('taxonomias','coleccion','especie','especimen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $coleccion = Coleccion::all();
    	$especies = Especie::all();
    	$especimenes= Especimen::all();
        $taxonomias = Taxonomia::all();
        return view('taxonomia.create', compact('taxonomias','coleccion','especie','especimen'));
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
          'idEspecie'=>'required|numeric',  
          'idColeccion'=>'required|numeric', 
          'idEspecimen'=>'required|numeric',   
          'NumVoucher'=>'required|numeric',  
          'nomComun',
          ]);
            Taxonomia::create($request->all());
            Alert::success('Clasificación Taxonómica agregado con éxito');
        return redirect()->route('taxonomia.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taxonomias = Taxonomia::find($id);
      return view('taxonomia.show',compact('taxonomias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idTaxonomia)
    {
        $coleccion = Coleccion::all();
    	$especies = Especie::all();
    	$especimenes= Especimen::all();
        $taxonomias = Taxonomia::find($idTaxonomia);
        return view('taxonomia.edit',compact('taxonomias','coleccion','especie','especimen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idTaxonomia)
    {
        $this->validate($request,[
          'idEspecie'=>'required|numeric',  
          'idColeccion'=>'required|numeric', 
          'idEspecimen'=>'required|numeric',   
          'NumVoucher'=>'required|numeric',  
          'nomComun',
          ]);
        Taxonomia::find($idTaxonomia)->update($request->all());
        Alert::success('Taxonomia actualizado con éxito');
        return redirect()->route('taxonomia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTaxonomia)
    {
        try{
             Taxonomia::find($idTaxonomia)->delete();
             Alert::success('Taxonomia eliminado con exito');
        return redirect()->route('taxonomia.index');
    }catch (\Illuminate\Database\QueryException $e) {
    	Alert::danger('No se Puede eliminar este registro porque esta asociado con otra asignación');
        return redirect()->route('taxonomia.index');
    }
    }
}
