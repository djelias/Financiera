<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zona;
use Zona1\http\Request\ZonaRequest;

class ZonaController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');
        $zonas = Zona::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('zona.index',compact('zonas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $zonas = Zona::all();
        return view('zona.create', compact('zonas'));
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
          'nombreZona',
          'descripcionZona1'
        ]);
        
        Zona::create($request->all());
        return redirect()->route('zona.index')->with('success','Zona creada con éxito');
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
        return view('zona.edit',compact('zonas'));
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
          'idZona',
          'nombreZona',
          'descripcionZona1'
        ]);
        Zona::find($idZona)->update($request->all());
        return redirect()->route('zona.index')->with('success','Zona actualizado con exito');
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
        return redirect()->route('zona.index')->with('success','Zona eliminado con exito');
    		} catch  (\Illuminate\Database\QueryException $e){
        return redirect()->route('zona.index')->with('danger','No se Puede eliminar este registro porque esta asociado con otra asignación');
        }
    }

}
