<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Zona;
use App\Municipio;
use App\Departamento;
use Zona1\http\Request\ZonaRequest;
use RealRashid\SweetAlert\Facades\Alert;


class ZonaController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
         $this->middleware('permission:Zonas|Crear Zona|Editar Zona|eliminar Zona', ['only' => ['index','show']]);
         $this->middleware('permission:Crear Zona', ['only' => ['create','store']]);
         $this->middleware('permission:Editar Zona', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar Zona', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $municipios = Municipio::all();
        $departamentos=Departamento::all();
        $nombre = $request->get('nombreZona');
        $zonas = Zona::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('zona.index',compact('zonas','municipios','departamentos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $municipios = Municipio::all();
        $zonas = Zona::all();
         $municipios = Municipio::all();
         $departamentos=Departamento::all();
        return view('zona.create', compact('zonas','municipios','departamentos'));

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
          'idMunicipio',
          'nombreZona'=>'required',
          'lugarZona'=>'required',
          'latitudZona'=>'required',
          'longitudZona'=>'required',
          'habitatZona'=>'required',
          'descripcionZona1'=>'required',
        ]);
        
        Zona::create($request->all());
         Alert::success('Zona agregado con éxito');
        return redirect()->route('zona.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zonas = Zona::find($id);
      return view('zona.show',compact('zonas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idZona)
    {
        $zonas = Zona::find($idZona);
         $municipios = Municipio::all();
         $departamentos=Departamento::all();
        return view('zona.edit',compact('zonas','municipios','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idZona)
    {
       $this->validate($request,[

          'id',
          'idMunicipio',
          'nombreZona'=>'required',
          'lugarZona'=>'required',
          'latitudZona'=>'required',
          'longitudZona'=>'required',
          'habitatZona'=>'required',
          'descripcionZona1'=>'required',
        ]);
        Zona::find($idZona)->update($request->all());
         Alert::success('Zona  Actualizada con éxito');
        return redirect()->route('zona.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idZona)
    {
        try{
            Zona::find($idZona)->delete();
            Alert::success('Zona eliminada con exito');
        return redirect()->route('zona.index');
            } catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otros datos');
        return redirect()->route('zona.index');

        }
    }

}
