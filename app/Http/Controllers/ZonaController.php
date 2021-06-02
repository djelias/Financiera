<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zona;
use App\Municipio;
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
         $this->middleware('permission:zona-listado|zona-create|zona-edit|zona-delete', ['only' => ['index','show']]);
         $this->middleware('permission:zona-create', ['only' => ['create','store']]);
         $this->middleware('permission:zona-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:zona-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $municipios = Municipio::all();
        $nombre = $request->get('nombreZona');
        $zonas = Zona::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('zona.index',compact('municipios','zonas'));
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
        return view('zona.create', compact('municipios','zonas'));
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
          'nombreZona'=>'required|alpha_spaces',
          'lugarZona'=>'required|alpha_spaces',
          'latitudZona'=>'required|alpha_spaces',
          'longitudZona'=>'required|alpha_spaces',
          'habitatZona'=>'required|alpha_spaces',
          'descripcionZona1'=>'required|alpha_spaces',
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
        return view('zona.edit',compact('zonas','municipios'));
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
          'nombreZona'=>'required|alpha_spaces',
          'lugarZona'=>'required|alpha_spaces',
          'latitudZona'=>'required|alpha_spaces',
          'longitudZona'=>'required|alpha_spaces',
          'habitatZona'=>'required|alpha_spaces',
          'descripcionZona1'=>'required|alpha_spaces',
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
