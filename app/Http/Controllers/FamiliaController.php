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
use Familia1\http\Request\ClaseRequest;
use RealRashid\SweetAlert\Facades\Alert;

class FamiliaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Familias|Crear Familia|Editar Familia|Eliminar Familia', ['only' => ['index','store']]);
         $this->middleware('permission:Crear Familia', ['only' => ['create','store']]);
         $this->middleware('permission:Editar Familia', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar Familia', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	
        $ordens = Orden::all();
        $familias = Familia::all();
        $nombre =$request->get('nombreFamilia');
        $familias = Familia::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('familia.index',compact('familias','ordens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $familias = Familia::all();
        $ordens = Orden::all();
        return view('familia.create', compact('ordens','familias'));
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
          'idOrden'=>'required|numeric',  
          'nombreFamilia'=>'required|alpha_spaces',
          ]);
            Familia::create($request->all());
            Alert::success('Familia agregada con éxito');
        return redirect()->route('familia.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $familias = Familia::find($id);
      return view('familia.show',compact('familias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idFamilia)
    {
       
        $familias = Familia::all();
        $ordens = Orden::find($idOrden);
        return view('familia.edit',compact('familias','ordens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idFamilia)
    {
        $this->validate($request,[
          'idOrden'=>'required|numeric',  
          'nombreFamilia'=>'required|alpha_spaces',
          ]);
        Familia::find($idFamilia)->update($request->all());
        Alert::success('Familia actualizada con éxito');
        return redirect()->route('familia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idFamilia)
    {
        try{
             Familia::find($idFamilia)->delete();
             Alert::success('Familia eliminada con exito');
        return redirect()->route('familia.index');
    }catch (\Illuminate\Database\QueryException $e) {
    	Alert::danger('No se Puede eliminar este registro porque esta asociado a otros datos');
        return redirect()->route('familia.index');
    }
    }
}
