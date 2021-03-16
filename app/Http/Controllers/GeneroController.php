<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Dominio;
use App\Reino;
use App\Filum;
use App\Clase;
use App\Orden;
use App\Familia;
use App\Genero;
use Genero1\http\Request\ClaseRequest;
use RealRashid\SweetAlert\Facades\Alert;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	
        $familias = Familia::all();
        $generos = Genero::all();
        $nombre =$request->get('nombreGenero');
        $generos = Genero::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('genero.index',compact('generos','familias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $generos = Genero::all();
        $familias = Familia::all();
        return view('genero.create', compact('familias','generos'));
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
          'idFamilia'=>'required|numeric',  
          'nombreGenero'=>'required|alpha_spaces',
          ]);
            Genero::create($request->all());
            Alert::success('Genero agregado con éxito');
        return redirect()->route('genero.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $generos = Genero::find($id);
      return view('genero.show',compact('generos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idGenero)
    {
       
        $familias = Familia::all();
        $generos = Genero::find($idGenero);
        return view('genero.edit',compact('generos','familias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idGenero)
    {
        $this->validate($request,[
          'idFamilia'=>'required|numeric',  
          'nombreGenero'=>'required|alpha_spaces',
          ]);
        Genero::find($idGenero)->update($request->all());
        Alert::success('Genero actualizado con éxito');
        return redirect()->route('genero.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idGenero)
    {
        try{
             Genero::find($idGenero)->delete();
             Alert::success('Genero eliminado con exito');
        return redirect()->route('genero.index');
    }catch (\Illuminate\Database\QueryException $e) {
    	Alert::danger('No se Puede eliminar este registro porque esta asociado a otros datos');
        return redirect()->route('generoGe.index');
    }
    }
}
