<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
use App\Investigacion;
use GMaps;
use Especimen1\http\Request\TaxonomiaRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use PDF;
use Carbon\Carbon;

class EspecimenController extends Controller
{
    //
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Especimens|Crear Especimen|Editar Especimen|Eliminar Especimen', ['only' => ['index','store']]);
         $this->middleware('permission:Crear Especimen', ['only' => ['create','store']]);
         $this->middleware('permission:Editar Especimen', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar Especimen', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
    	$especimens= Especimen::all();
        $investigaciones = Investigacion::all();
    	$codigo =$request->get('codigoEspecimen');
        $especimens = Especimen::orderBy('id','DESC')->nombre($codigo)->paginate(10);
        return view('especimen.index',compact('especimens','investigaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
    	$especimens= Especimen::all();
        $investigaciones = Investigacion::all();
        return view('especimen.create', compact('especimens','investigaciones'));
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
          'codigoEspecimen'=>'required',
          'idInvestigacion'=>'required|numeric', 
          'cantidad'=>'required|numeric',      
          'caracteristicas'=>'required',
          'colector' =>'required',
          'fechaColecta'=>'required|date',
          'habitat'=>'required',
          'horaSecuenciacion1'=>'required',
          'latitud'=>'required',
          'longitud'=>'required',
          'peso'=>'required',
          'tamano'=>'required',
          'tecnicaRecoleccion'=>'required',
          'tipoMuestra'=>'required',
          'imagen'=>'required',


          ]);
            $data = $request->all();
            if($request->hasFile('imagen')){
                   // $destination_path = 'public/especimens';
                     $imagen = $request->file('imagen');
                     $img_name = time().$request->file('imagen')->getClientOriginalName();
                    $imagen->move(public_path().'/especimens/',$img_name);
                     $data['imagen'] = $img_name;
                    }
            $especimens = Especimen::create($data);
           
            Alert::success('Especimen agregado con éxito');
        return redirect()->route('especimen.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especimens = Especimen::find($id);

        $latitud = $especimens->latitud;
        $longitud = $especimens->longitud;

        $config['center'] = ''.$latitud.',' .$longitud.'';
        $config['zoom'] = '10';
        $config['map_height'] = '500px';
        $config['scrollwheel'] = true;
        GMaps::initialize($config);

        $marker['position'] = ''.$latitud.',' .$longitud.'';
        $marker['infowindow_content'] = $latitud;
        GMaps::add_marker($marker);

        $map = GMaps::create_map();

      return view('especimen.show',compact('especimens'))->with('map',$map);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idEspecimen)
    {
       
    	$investigaciones= Investigacion::all();
        $especimens = Especimen::find($idEspecimen);
        return view('especimen.edit',compact('especimens','especies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idEspecimen)
    {
        $this->validate($request,[ 
          'idInvestigacion'=>'required|numeric', 
          'cantidad'=>'required|numeric',   
          'codigoEspecimen'=>'required',  
          'caracteristicas'=>'required',
          'colector' =>'required',
          'fechaColecta'=>'required|date',
          'habitat'=>'required',
          'horaSecuenciacion1'=>'required',
          'latitud'=>'required',
          'longitud'=>'required',
          'peso'=>'required',
          'tamano'=>'required',
          'tecnicaRecoleccion'=>'required',
          'tipoMuestra'=>'required',
          ]);
        Especimen::find($idEspecimen)->update($request->all());
        Alert::success('Especimen actualizado con éxito');
        return redirect()->route('especimen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idEspecimen)
    {
        try{
             Especimen::find($idEspecimen)->delete();
             Alert::success('Especimen eliminado con exito');
        return redirect()->route('especimen.index');
    }catch (\Illuminate\Database\QueryException $e) {
    	Alert::danger('No se Puede eliminar este registro porque esta asociado con otra asignación');
        return redirect()->route('especimen.index');
    }
    }

     public function generatePDF($id)
    {
       $especimens = Especimen::find($id);
        $date=new Carbon();
        $fecha = $date->format('d-m-Y');

        $pdf = PDF::loadView('especimen.reportePDF',compact('especimens','fecha'));
        $pdf->getDomPDF()->set_option("enable_php", TRUE);
        return $pdf->stream('reportePDF.pdf');
    }

}
