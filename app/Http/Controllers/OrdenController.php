<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Dominio;
use App\Reino;
use App\Filum;
use App\Clase;
use App\Orden;
use Orden1\http\Request\ClaseRequest;
use RealRashid\SweetAlert\Facades\Alert;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	
        $clases = Clase::all();
        $ordens = Orden::all();
        $nombre =$request->get('nombreOrden');
        $ordens = Orden::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('orden.index',compact('ordens','clases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $clases = Clase::all();
        $ordens = Orden::all();
        return view('orden.create', compact('clases','ordens'));
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
          'idClase'=>'required|numeric',  
          'nombreOrden'=>'required|alpha_spaces',
          ]);
            Orden::create($request->all());
            Alert::success('Orden agregado con éxito');
        return redirect()->route('orden.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordens = Orden::find($id);
      return view('orden.show',compact('ordens'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idOrden)
    {
       
        $clases = Clase::all();
        $ordens = Orden::find($idOrden);
        return view('orden.edit',compact('ordens','clases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idOrden)
    {
        $this->validate($request,[
          'idClase'=>'required|numeric',  
          'nombreOrden'=>'required|alpha_spaces',
          ]);
        Orden::find($idOrden)->update($request->all());
        Alert::success('Orden actualizado con éxito');
        return redirect()->route('orden.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idOrden)
    {
        try{
             Orden::find($idOrden)->delete();
             Alert::success('Orden eliminada con exito');
        return redirect()->route('orden.index');
    }catch (\Illuminate\Database\QueryException $e) {
    	Alert::danger('No se Puede eliminar este registro porque esta asociado a otros datos');
        return redirect()->route('orden.index');
    }
    }
}
