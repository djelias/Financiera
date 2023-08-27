<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;
use App\Pago;
use App\Prestatario;
use Prestamo1\http\Request\PrestamoRequest;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Carbon\Carbon;

class PrestamoController extends Controller
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

    public function index(Request $request)
    {
        //$nombre = $request->get('nombreprestamo');
        $prestamos = Prestamo::orderBy('id','DESC')->paginate(10);
        $prestatarios = Prestatario::all();

               return view('prestamo.index',compact('prestamos', 'prestatarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $prestamos = Prestamo::all();
        $prestatarios = Prestatario::all();
        return view('prestamo.create', compact('prestamos', 'prestatarios'));
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

          'idprest',
          'codigoPrestamo', 
          'periodicidad', 
          'tasa', 
          'tiempo', 
          'cantidad', 
          'descrip', 
          'pago', 
          'fechadePago', 
          'pendpago', 
          'fechapago', 
          'intereses'
        ]);

        $prestamo = new Prestamo;
        $prestamo->idprest = $request->get('idprest');
        $prestamo->codigoPrestamo = $request->get('codigoPrestamo');
        $prestamo->periodicidad = $request->get('periodicidad');
        $prestamo->tasa = $request->get('tasa');
        $prestamo->tiempo = $request->get('tiempo');
        $prestamo->cantidad = $request->get('cantidad');
        $prestamo->descrip = $request->get('descrip');
        $prestamo->pago = $request->get('pago');
        $prestamo->fechadePago = $request->get('fechadePago');
        $prestamo->pendpago = $request->get('cantidad');
        $prestamo->save();
        
        //Prestamo::create($request->all());
        Alert::success('prestamo agregada con éxito');
        return redirect()->route('prestamo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pagos = Pago::all();
        $prestamos = Prestamo::find($id);
      return view('prestamo.show',compact('prestamos','pagos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestamos = Prestamo::find($id);
        return view('prestamo.edit',compact('prestamos'));
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
          'idprest', 'codigoPrestamo', 'periodicidad', 'tasa', 'tiempo', 'cantidad', 'descrip', 'pago', 'fechadepago', 'pendpago', 'fechapago', 'intereses'
        ]);
        Prestamo::find($id)->update($request->all());
        return redirect()->route('prestamo.index')->with('success','prestamo actualizado con exito');
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
            Prestamo::find($id)->delete();
            Alert::success('prestamo eliminada con exito');
        return redirect()->route('prestamo.index');
    		} catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otra asignación');
        return redirect()->route('prestamo.index');
        }
    }

     public function generatePDF(Request $request, $id)

    {
        //$nombre = $request->get('cuenta');
        //$catcuentas = Catcuenta::orderBy('id','ASC')->nombre($nombre)->paginate(100);
        //$data = ['title' => 'Esta es una página de Prueba'];
        $pagos = Pago::all();
        $prestamos = Prestamo::find($id);
        $date=new Carbon();
        $fecha = $date->format('d-m-Y');

        $pdf = PDF::loadView('prestamo.reportePrestamo',compact('prestamos','fecha','pagos'));
        $pdf->getDomPDF()->set_option("enable_php", TRUE);
        return $pdf->stream('prestamo.pdf');

    }
}
