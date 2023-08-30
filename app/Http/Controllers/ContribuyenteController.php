<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribuyentes;
use Contribuyente1\http\Request\ContribuyenteRequest;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Carbon\Carbon;

class ContribuyenteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Dominios|Crear Dominio|Editar Dominio|Eliminar Dominio', ['only' => ['index','store']]);
         $this->middleware('permission:Dominios', ['only' => ['index']]);
         $this->middleware('permission:Crear Dominio', ['only' => ['create','store']]);
         $this->middleware('permission:Editar Dominio', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar Dominio', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombres');
        $contribuyentes = Contribuyentes::orderBy('id','ASC')->nombre($nombre)->paginate(10);
               return view('contribuyente.index',compact('contribuyentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('contribuyente.create');
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
          'tipo', 
          'tipo2', 
          'nombreContrib', 
          'noIdentif', 
          'noRegistro', 
          'giro', 
          'direccion', 
          'categoria', 
          'estatus', 
          'estatus2'
        ]);
        Contribuyentes::create($request->all());
        return redirect()->route('contribuyente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contribuyentes = Contribuyente::find($id);
      return view('contribuyente.show',compact('contribuyentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contribuyentes = Contribuyente::find($id);
        return view('contribuyente.edit',compact('contribuyentes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
          'tipo', 
          'tipo2', 
          'nombreContrib', 
          'noIdentif', 
          'noRegistro', 
          'giro', 
          'direccion', 
          'categoria', 
          'estatus', 
          'estatus2'
        ]);
        Contribuyentes::find($id)->update($request->all());
        return redirect()->route('contribuyente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       try{
            Contribuyente::find($id)->delete();
            Alert::success('contribuyente eliminado con exito');
        return redirect()->route('contribuyente.index');
            } catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otros datos');
        return redirect()->route('contribuyente.index');
        }
    }

    public function generatePDF(Request $request)

    {
        $nombre = $request->get('nombreContrib');
        $contribuyentes = Contribuyentes::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        //$data = ['title' => 'Esta es una página de Prueba'];
        $date=new Carbon();
        $fecha = $date->format('d-m-Y');

        $pdf = PDF::loadView('contribuyente.reporteContribuyente',compact('contribuyentes','fecha'));
        $pdf->getDomPDF()->set_option("enable_php", TRUE);
        return $pdf->stream('contribuyente.pdf');

    }


}
