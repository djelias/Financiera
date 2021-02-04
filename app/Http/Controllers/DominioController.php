<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dominio;
use Dominio1\http\Request\DominioRequest;

class DominioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');
        $dominios = Dominio::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('dominio.index',compact('dominios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $dominios = Dominio::all();
        return view('dominio.create', compact('dominios'));
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

          'idDominio',
          'nombreDominio'
        ]);
        
        Dominio::create($request->all());
        return redirect()->route('dominio.index')->with('success','Dominio creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dominios = Dominio::find($id);
      return view('dominio.show',compact('dominios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idDominio)
    {
        $dominios = Dominio::find($idDominio);
        return view('dominio.edit',compact('dominios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idDominio)
    {
        $this->validate($request,[
          'idDominio',
          'nombreDominio'
        ]);
        Dominio::find($idDominio)->update($request->all());
        return redirect()->route('dominio.index')->with('success','Dominio actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idDominio)
    {
        try{
            Dominio::find($idDominio)->delete();
        return redirect()->route('dominio.index')->with('success','Dominio eliminado con exito');
    		} catch  (\Illuminate\Database\QueryException $e){
        return redirect()->route('dominio.index')->with('danger','No se Puede eliminar este registro porque esta asociado con otra asignación');
        }
    }
}
