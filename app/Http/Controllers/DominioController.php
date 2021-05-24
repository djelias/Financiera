<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dominio;
use Dominio1\http\Request\DominioRequest;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Carbon\Carbon;

class DominioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombreDominio');
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

          'id',
          'nombreDominio'=>'required|alpha_spaces',
        ]);
        Dominio::create($request->all());
        Alert::success('Dominio agregada con éxito');
        return redirect()->route('dominio.index');
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
        Alert::success('Dominio actualizado con éxito');
        return redirect()->route('dominio.index');
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
            Alert::success('Dominio eliminado con exito');
        return redirect()->route('dominio.index');
            } catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otros datos');
        return redirect()->route('dominio.index');
        }
    }

    public function generatePDF(Request $request)

    {
        $nombre = $request->get('nombreDominio');
        $dominios = Dominio::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        //$data = ['title' => 'Esta es una página de Prueba'];
        $date=new Carbon();
        $fecha = $date->format('d-m-Y');

        $pdf = PDF::loadView('dominio.reporteDominio',compact('dominios','fecha'));
        $pdf->getDomPDF()->set_option("enable_php", TRUE);
        return $pdf->stream('dominio.pdf');

    }


}
