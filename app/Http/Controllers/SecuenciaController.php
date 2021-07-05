<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Secuencia;
use Secuencia1\http\Request\SecuenciaRequest;
use RealRashid\SweetAlert\Facades\Alert;


class SecuenciaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      function __construct()
    {
         $this->middleware('permission:Secuencias|Crear Secuencia|Editar Secuencia|Eliminar Secuencia', ['only' => ['index','show']]);
         $this->middleware('permission:Crear Secuencia', ['only' => ['create','store']]);
         $this->middleware('permission:Editar Secuencia', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar Secuencia', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $nombre = $request->get('secuenciaObtenida');
        $secuencias = Secuencia::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('secuencia.index',compact('secuencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $secuencias = Secuencia::all();
        return view('secuencia.create', compact('secuencias'));
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
          'secuenciaObtenida'=>'required',
          'metodoSecuenciacion'=>'required',
          'lugarSec'=>'required',
          'horaSec'=>'required',
          'fechaSec'=>'required|date',
          'responsableSec'=>'required',
        ]);
        
        Secuencia::create($request->all());
         Alert::success('Secuencia agregada con éxito');
        return redirect()->route('secuencia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $secuencias = Secuencia::find($id);
      return view('secuencia.show',compact('secuencias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idSecuencia)
    {
        $secuencias = Secuencia::find($idSecuencia);
        return view('secuencia.edit',compact('secuencias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idSecuencia)
    {
        $this->validate($request,[
          'id',
          'secuenciaObtenida',
          'metodoSecuenciacion',
          'lugarSec',
          'horaSec',
          'fechaSec',
          'responsableSec'
        ]);
        Secuencia::find($idSecuencia)->update($request->all());
          Alert::success('Secuencia Actualizada con éxito');
        return redirect()->route('secuencia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idSecuencia)
    {
        try{
            Secuencia::find($idSecuencia)->delete();
              Alert::success('Secuencia eliminada con exito');
        return redirect()->route('secuencia.index');
    		} catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otra tabla');
        return redirect()->route('secuencia.index');
        }
    }
}
