<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coleccion;
use Coleccion1\http\Request\ColeccionRequest;

class ColeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');
        $colecciones = Coleccion::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('coleccion.index',compact('colecciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $colecciones = Coleccion::all();
        return view('coleccion.create', compact('colecciones'));
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

          'idColeccion',
          'nombreColeccion'
        ]);
        
        Coleccion::create($request->all());
        return redirect()->route('coleccion.index')->with('success','Coleccion creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $colecciones = Coleccion::find($id);
      return view('coleccion.show',compact('colecciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idColeccion)
    {
        $colecciones = Coleccion::find($idColeccion);
        return view('coleccion.edit',compact('colecciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idColeccion)
    {
        $this->validate($request,[
          'idColeccion',
          'nombreColeccion'
        ]);
        Coleccion::find($idColeccion)->update($request->all());
        return redirect()->route('coleccion.index')->with('success','Coleccion actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idColeccion)
    {
        try{
            Coleccion::find($idColeccion)->delete();
        return redirect()->route('coleccion.index')->with('success','Coleccion eliminado con exito');
    		} catch  (\Illuminate\Database\QueryException $e){
        return redirect()->route('coleccion.index')->with('danger','No se Puede eliminar este registro porque esta asociado con otra asignación');
        }
    }
}
