<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Dominio;
use App\Reino;
use App\Filum;
use App\Clase;
use App\Orden;
use App\Familia;
use App\Genero;
use App\Especie;
use Especie1\http\Request\ClaseRequest;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use DB;
use Carbon\Carbon;

class EspecieController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Especies|Crear Especie|Editar Especie|Eliminar Especie', ['only' => ['index','store']]);
         $this->middleware('permission:Crear Especie', ['only' => ['create','store']]);
         $this->middleware('permission:Editar Especie', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar Especie', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        $idReino=$request->get('idReino');
       $generos = Genero::all();
       $especies = Especie::all();
       $reinos = Reino::all();
       $nombre=$request->get('nombreEspecie');


        if ($idReino != "") {
               
             $especies = Especie::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('especie.index_filter',compact('especies','generos','reinos','idReino'));
            }
        else{
           $especies = Especie::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('especie.index',compact('especies','generos','reinos','idReino'));
            } 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $especies = Especie::all();
        $generos = Genero::all();
        return view('especie.create', compact('generos','especies'));
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
          'idGenero'=>'required|numeric',  
          'nombreEspecie'=>'required|alpha_spaces',
           'idReino', 
          ]);
            Especie::create($request->all());
            Alert::success('Especie agregado con éxito');
        return redirect()->route('especie.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $especies = Especie::find($id);
        $date=new Carbon();
        $fecha = $date->format('d-m-Y');

        $pdf = PDF::loadView('especie.reportePDF',compact('especies','fecha'));
        $pdf->getDomPDF()->set_option("enable_php", TRUE);
        return $pdf->stream('reportePDF.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idEspecie)
    {
       
        $generos = Genero::all();
        $especies = Especie::find($idEspecie);
        return view('especie.edit',compact('especies','generos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idEspecie)
    {
        $this->validate($request,[
          'idGenero'=>'required|numeric',  
          'nombreEspecie'=>'required|alpha_spaces',
          'idReino',  
          ]);
        Especie::find($idEspecie)->update($request->all());
        Alert::success('Especie actualizada con éxito');
        return redirect()->route('especie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idEspecie)
    {
        try{
             Especie::find($idEspecie)->delete();
             Alert::success('Especie eliminado con exito');
        return redirect()->route('especie.index');
    }catch (\Illuminate\Database\QueryException $e) {
    	Alert::danger('No se Puede eliminar este registro porque esta asociado a otros datos');
        return redirect()->route('especie.index');
    }
    }
    
    public function reportePDF( request $request, $idReino)

    {
        if ($idReino != NULL) {
        $generos = Genero::all();
        $especies = Especie::all();
        $reinos = Reino::all();
        $nombre =$request->get('nombreEspecie');
        $nombreReino= DB::table('reinos')->select('nombreReino')->where('id', $idReino)->get();
        $especies = Especie::orderBy('id','DESC')->nombre($nombre)->paginate(15);
        $date=new Carbon();
        $fecha = $date->format('d-m-Y');
        $pdf = PDF::loadView('especie.reporte2',compact('especies','fecha','idReino','nombreReino'));
        $pdf->getDomPDF()->set_option("enable_php", TRUE);
        return $pdf->stream('reporteEspecie.pdf');
        }
        else {
            Alert::danger('Seleccione un reino');
             return redirect()->route('especie.index');
        }
        
        
        
    }

}
