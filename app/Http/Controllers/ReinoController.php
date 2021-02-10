<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Dominio;
use App\Reino;
use Reino1\http\Request\ReinoRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ReinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$dominios = Dominio::all();
        $nombre =$request->get('nombreReino');
        $reinos = Reino::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('reino.index',compact('reinos','dominios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $dominios = Dominio::all();
        $reinos = Reino::all();
        return view('reino.create', compact('dominios','reinos'));
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
          'idDominio'=>'required|numeric',  
          'nombreReino'=>'required|alpha_spaces',
          ]);
            Reino::create($request->all());
            Alert::success('Reino agregado con éxito');
        return redirect()->route('reino.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reinos = Reino::find($id);
      return view('reino.show',compact('reinos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idReino)
    {
        $dominios = Dominio::all();
        $reinos = Reino::find($idReino);
        return view('reino.edit',compact('reinos','dominios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idReino)
    {
        $this->validate($request,[
          'idDominio'=>'required|numeric',  
          'nombreReino'=>'required|alpha_spaces',
          ]);
        Reino::find($idReino)->update($request->all());
        Alert::success('Reino actualizado con éxito');
        return redirect()->route('reino.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idReino)
    {
        try{
             Reino::find($idReino)->delete();
             Alert::success('Reino eliminado con exito');
        return redirect()->route('reino.index');
    }catch (\Illuminate\Database\QueryException $e) {
    	Alert::danger('No se Puede eliminar este registro porque esta asociado con otra asignación');
        return redirect()->route('reino.index');
    }
    }
}
