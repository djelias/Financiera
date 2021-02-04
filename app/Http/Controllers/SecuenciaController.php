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
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');
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
          'secuenciaObtenida',
          'metodoSecuenciacion'=>'required|alpha_spaces',
          'lugarSec'=>'required|alpha_spaces',
          'horaSec',
          'fechaSec',
          'responsableSec'=>'required|alpha_spaces',
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
          'metodoSecuenciacion'=>'required|alpha_spaces',
          'lugarSec'=>'required|alpha_spaces',
          'horaSec',
          'fechaSec',
          'responsableSec'=>'required|alpha_spaces',
        ]);
        Secuencia::find($idSecuencia)->update($request->all());
        return redirect()->route('secuencia.index')->with('success','Secuencia actualizado con exito');
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
        return redirect()->route('secuencia.index')->with('success','Secuencia eliminado con exito');
    		} catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otra tabla');
        return redirect()->route('secuencia.index');
        }
    }
}
