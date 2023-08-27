<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use App\Prestamo;
use App\Prestatario;
use Pago1\http\Request\PagoRequest;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Carbon\Carbon;

class PagoController extends Controller
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
        $pagos = Pago::orderBy('id','DESC')->paginate(10);
               return view('pago.index',compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $pagos = Pago::all();
        $prestatarios = Prestatario::all();
        return view('pago.create', compact('pagos', 'prestatarios'));
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

          'idprest', 'idprest2', 'fechadepago', 'cantidad', 'diasintereses', 'comentario'
        ]);

        $idprestamo = $request->get('idprest2');
        $pcantidad = $request->get('cantidad');
        $dintereses = $request->get('diasintereses');

        $prestamos = Prestamo::find($idprestamo);
        $remante = $prestamos->pendpago;
        $ptasa = $prestamos->tasa;
       
        $pintereses = (((($ptasa/100)/30)*$remante)*$dintereses);
        $cappagado = ($pcantidad-(((($ptasa/100)/30)*$remante)*$dintereses));
        $cappagado = round($cappagado, 2);
        $nuevadeuda = ($remante-$cappagado);
        $prestamos->pendpago = $nuevadeuda;

        $prestamos->save();


        $pago = new Pago;
        $pago->idprest = $request->get('idprest');
        $pago->idprest2 = $request->get('idprest2');
        $pago->fechadepago = $request->get('fechadepago');
        $pago->cantidad = $request->get('cantidad');
        $pago->intereses = $pintereses;
        $pago->capitalpagado = $cappagado;
        $pago->diasintereses = $request->get('diasintereses');
        $pago->comentario = $request->get('comentario');
        $pago->save();
        //Pago::create($request->all());
        Alert::success('pago agregada con éxito');
        return redirect()->route('pago.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pagos = Pago::find($id);
      return view('pago.show',compact('pagos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagos = Pago::find($id);
        return view('pago.edit',compact('pagos'));
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
          'idprest', 'idprest2', 'fechadepago', 'cantidad', 'intereses', 'comentario'
        ]);
        Pago::find($id)->update($request->all());
        return redirect()->route('pago.index')->with('success','pago actualizado con exito');
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
            Pago::find($id)->delete();
            Alert::success('pago eliminada con exito');
        return redirect()->route('pago.index');
    		} catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otra asignación');
        return redirect()->route('pago.index');
        }
    }

     public function generatePDF(Request $request, $id)

    {
        //$nombre = $request->get('cuenta');
        //$catcuentas = Catcuenta::orderBy('id','ASC')->nombre($nombre)->paginate(100);
        //$data = ['title' => 'Esta es una página de Prueba'];
        $pagos = Pago::find($id);
        $date=new Carbon();
        $fecha = $date->format('d-m-Y');

        $pdf = PDF::loadView('pago.reportePago',compact('pagos','fecha'));
        $pdf->getDomPDF()->set_option("enable_php", TRUE);
        return $pdf->stream('pago.pdf');

    }
}
