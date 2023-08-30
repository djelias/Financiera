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
use App\Especie;
use App\Especimen;
use App\Taxonomia;
use Taxonomia1\http\Request\TaxonomiaRequest;
use RealRashid\SweetAlert\Facades\Alert;
use GMaps;
use PDF;
use Carbon\Carbon;

class TaxonomiaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
         $this->middleware('permission:Taxonomias|Crear Taxonomia|Editar Taxonomia|Eliminar Taxonomia', ['only' => ['index','show']]);
         $this->middleware('permission:Crear Taxonomia', ['only' => ['create','store']]);
         $this->middleware('permission:Editar Taxonomia', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar Taxonomia', ['only' => ['destroy']]);
    }
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$especimens= Especimen::all();
        $taxonomias = Taxonomia::all();
    	$nombre =$request->get('nombreComun');
        //$taxonomias = DB::table('taxonomias')->distinct()->get();
        $taxono = Taxonomia::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        $taxonomias = $taxono->unique('idEspecie');

        //$alumnos = Alumnos::orderBy('id','ASC')->pluck('nombre','id');

        return view('taxonomia.index',compact('taxonomias','especimens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
    	$especimens= Especimen::all();
        $taxonomias = Taxonomia::all();
        return view('taxonomia.create', compact('taxonomias','especimens'));
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
          'idEspecimen'=>'required|numeric',   
          'numVoucher'=>'required',  
          'nombreComun'=>'required|alpha_spaces',
          ]);
            Taxonomia::create($request->all());
            Alert::success('Clasificación Taxonómica agregado con éxito');
        return redirect()->route('taxonomia.index');
        
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
        $taxonomias = Taxonomia::all();

            $config['center'] = '13.7177,-89.2027';
                $config['zoom'] = '10';
                $config['map_height'] = '500px';
                $config['scrollwheel'] = true;
                GMaps::initialize($config);

        foreach ($taxonomias as $key => $value) {
            if ($value->Especie->id == $especies->id) {       

                $marker['position'] = ''.$value->Especimen->latitud.',' .$value->Especimen->longitud.'';
                $marker['infowindow_content'] = $value->Especimen->latitud;
                GMaps::add_marker($marker);

                
            }
}

$map = GMaps::create_map();

      return view('taxonomia.show',compact('taxonomias','especies'))->with('map',$map);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idTaxonomia)
    {
       
    	$especimens= Especimen::all();
        $taxonomias = Taxonomia::find($idTaxonomia);
        return view('taxonomia.edit',compact('taxonomias','especimens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idTaxonomia)
    {
        $this->validate($request,[  
          'idEspecimen'=>'required|numeric',   
          'numVoucher'=>'required',  
          'nombreComun'=>'required|alpha_spaces',
          ]);
        Taxonomia::find($idTaxonomia)->update($request->all());
        Alert::success('Taxonomia actualizado con éxito');
        return redirect()->route('taxonomia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTaxonomia)
    {
        try{
             Taxonomia::find($idTaxonomia)->delete();
             Alert::success('Taxonomia eliminado con exito');
        return redirect()->route('taxonomia.index');
    }catch (\Illuminate\Database\QueryException $e) {
    	Alert::danger('No se Puede eliminar este registro porque esta asociado con otra asignación');
        return redirect()->route('taxonomia.index');
    }
    }
    
        public function generatePDF(Request $request)

    {
        $nombre = $request->get('numVoucher');
        $taxonomias = Taxonomia::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        //$data = ['title' => 'Esta es una página de Prueba'];
        $date=new Carbon();
        $fecha = $date->format('d-m-Y');

        $pdf = PDF::loadView('taxonomia.reporteTaxonomia',compact('taxonomias','fecha'));
        $pdf->getDomPDF()->set_option("enable_php", TRUE);
        return $pdf->stream('reporteTaxonomia.pdf');

    }
}
