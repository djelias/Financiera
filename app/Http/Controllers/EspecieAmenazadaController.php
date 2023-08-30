<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Riesgo;
use App\EspecieAmenazada;
use EspecieAmenazada1\http\Request\EspecieAmenazadaRequest;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Carbon\Carbon;


class EspecieAmenazadaController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
         $this->middleware('permission:EspeciesAmenazadas|Crear EspecieAmenazada|Editar EspecieAmenazada|Eliminar EspecieAmenazada', ['only' => ['index','show']]);
         $this->middleware('permission:Crear EspecieAmenazada', ['only' => ['create','store']]);
         $this->middleware('permission:Editar EspecieAmenazada', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar EspecieAmenazada', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
    	$riesgos = Riesgo::all();
        $especieAmenazadas = EspecieAmenazada::all();
        $nombre =$request->get('nomEspamen');
        $especieAmenazadas = EspecieAmenazada::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('especieAmenazada.index',compact('especieAmenazadas','riesgos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $riesgos = Riesgo::all();
        $especieAmenazadas = EspecieAmenazada::all();
        return view('especieAmenazada.create', compact('riesgos','especieAmenazadas'));
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
          'idRiesgo'=>'required|numeric',  
          'nomEspamen'=>'required',
          'nomComEspamen'=>'required',
          ]);
            EspecieAmenazada::create($request->all());
            Alert::success('EspecieAmenazada agregado con éxito');
        return redirect()->route('especieAmenazada.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especieAmenazadas = EspecieAmenazada::find($id);
      return view('especieAmenazada.show',compact('especieAmenazadas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idEspecieAmenazada)
    {
        $riesgos = Riesgo::all();
        $especieAmenazadas = EspecieAmenazada::find($idEspecieAmenazada);
        return view('especieAmenazada.edit',compact('especieAmenazadas','riesgos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idEspecieAmenazada)
    {
        $this->validate($request,[
          'idRiesgo'=>'required|numeric',  
          'nomEspamen'=>'required|alpha_spaces',
          'nomComEspamen'=>'required|alpha_spaces',
          ]);
        EspecieAmenazada::find($idEspecieAmenazada)->update($request->all());
        Alert::success('EspecieAmenazada actualizado con éxito');
        return redirect()->route('especieAmenazada.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idEspecieAmenazada)
    {
        try{
             EspecieAmenazada::find($idEspecieAmenazada)->delete();
             Alert::success('EspecieAmenazada eliminado con exito');
        return redirect()->route('especieAmenazada.index');
    }catch (\Illuminate\Database\QueryException $e) {
    	Alert::danger('No se Puede eliminar este registro porque esta asociado con otra asignación');
        return redirect()->route('especieAmenazada.index');
    }
    }

    public function generatePDF(Request $request)

    {
        $nombre = $request->get('nomEspamen');
        $especieAmenazadas = EspecieAmenazada::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        //$data = ['title' => 'Esta es una página de Prueba'];
        $date=new Carbon();
        $fecha = $date->format('d-m-Y');

        $pdf = PDF::loadView('especieAmenazada.especieAmenzada',compact('especieAmenazadas','fecha'));
        $pdf->getDomPDF()->set_option("enable_php", TRUE);
        return $pdf->stream('especieAmenzada.pdf');

    }
}
