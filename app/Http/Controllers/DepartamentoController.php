<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Departamento;
use departamento1\http\Request\DepartamentoRequest;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Departamentos|Crear Departamentos|Editar Departamentos|Eliminar Departamentos', ['only' => ['index','store']]);
         $this->middleware('permission:Crear Departamentos', ['only' => ['create','store']]);
         $this->middleware('permission:Editar Departamentos', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar Departamentos', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');
        $departamentos = Departamento::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('departamento.index',compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $departamentos = Departamento::all();
        return view('departamento.create', compact('departamentos'));
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
          'nombreDepto',
        ]);
        
        Departamento::create($request->all());
        Alert::success('Departamento agregado con éxito');
        return redirect()->route('departamento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamentos = Departamento::find($id);
      return view('departamento.show',compact('departamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idDepto)
    {
        $departamentos = Departamento::find($idDepto);
        return view('departamento.edit',compact('departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idDepto)
    {
        $this->validate($request,[
          'id',
          'nombreDepto'
        ]);
        Departamento::find($idDepto)->update($request->all());
        return redirect()->route('departamento.index')->with('success','Departamento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idDepto)
    {
        try{
            Departamento::find($idDepto)->delete();
        return redirect()->route('departamento.index')->with('success','Departamento eliminado con exito');
    		} catch  (\Illuminate\Database\QueryException $e){
        return redirect()->route('departamento.index')->with('danger','No se Puede eliminar este registro porque esta asociado con otra asignación');
        }
    }
}
