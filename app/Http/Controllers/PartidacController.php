<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partidac;
use App\Catcuenta;
use App\Prestatario;
use Partidac1\http\Request\PartidacRequest;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Carbon\Carbon;
use App\Exports\partidacExport;
use Maatwebsite\Excel\Facades\Excel;

class PartidacController extends Controller
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
        $nombre =$request->get('nombre');
        //$partidac = Partidac::orderBy('correlativo','desc')->groupBy('correlativo')->having('correlativo', '>', 0)->get();
        //$partidac = Partidac::select('correlativo')
        //                ->distinct()
        //                ->get();
        $partidac = Partidac::orderBy('id','ASC')->nombre($nombre)->paginate(10);
        $partidacs = Partidac::all();
        return view('partidac.index',compact('partidac', 'partidacs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $catcuentas = Catcuenta::all();
        $partidacs = Partidac::select('correlativo')->orderBy('id', 'desc')->first();
        return view('partidac.create',compact('catcuentas', 'partidacs'));
    }

    public function estadoc()
    {
        //$personas = TableCliente::all();
        //$productos = TableProductos::all();
        //$factura = TableFacturas::all();
        //$venta = TableVentas::all();
        $catcuentas = Catcuenta::all();
        $partidac = Partidac::all();
        $partidacs = Partidac::all()->unique('correlativo');
        
        return view('partidac.estadoc',compact('catcuentas', 'partidac', 'partidacs'));
    }

    public function estadoco()
    {
        //$personas = TableCliente::all();
        //$productos = TableProductos::all();
        //$factura = TableFacturas::all();
        //$venta = TableVentas::all();
        $catcuentas = Catcuenta::all();
        $partidac = Partidac::all();
        $partidacs = Partidac::all()->unique('correlativo');
        
        return view('partidac.estadoco',compact('catcuentas', 'partidac', 'partidacs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**$this->validate($request,[
            'No_Facturas',
            'Productos',
            'cantidad'
            factura= cliente, fecha, total
            Cliente= id
        ]);
        
        TableVentas::create($request->all());
        return redirect()->route('tableVentas.create')->with('success','Venta guardado con éxito');*/
        $total = 0;
        $estatus = 1;
        $totalf = 0;
        $cant = 0;
        $cont = 0;
        $cuenta = $request->get('idcuenta');
        $desc = $request->get('desc');
        $cantidad = $request->get('cantidad');
        $tipo2 = $request->get('tipo2');
        $debe = $request->get('debe');
        $haber = $request->get('haber');
        while ($cont < count($cuenta)) {
        $idcatcuenta= substr($cuenta[$cont], 0, 1);
        $cuenta2= substr($cuenta[$cont], 1);
        $partidac = new Partidac;
        $partidac->idcatalogo = $cuenta2; 
        $partidac->tipo = $request->get('tipo'); 
        $partidac->correlativo = $request->get('correlativo');
        $partidac->fecha = $request->get('fecha');
        $partidac->descripcion = $desc[$cont];
        $partidac->debe = $debe[$cont];
        $partidac->haber = $haber[$cont];
        $partidac->tipo2 = $tipo2[$cont];
        $partidac->estatus = $estatus;
        $partidac->save();

        $cont = $cont + 1;

  }
        /**$idcatcuenta2= trim($idcatcuenta);
        $cat = Catcuenta::where('subcuenta', $idcatcuenta2);
        if (!empty($cat)) {
        $cat->estatus2 = $idcatcuenta2;
        $cat->save();
        }


        $cat = Catcuenta::where('cuentaDetalle', $idcatcuenta2);
        if ($cat != NULL) {
        $cat->estatus2 = $idcatcuenta2;
        $cat->save();
        }

        $cont = $cont + 1;
        }**/


        /**$Productos = $request->get('Productos');
        $cantidad = $request->get('cantidad');

        $total = 0;
        $totalf = 0;
        $cant = 0;
        $cont = 0;
        while ($cont < count($Productos)) {
            $venta = new TableVentas;
            $venta->id_facturas = $request->get('id_facturas');
            $venta->id_productos = $Productos[$cont];
            $venta->cantidad = $cantidad[$cont];
            $venta->notaEnvio = $request->get('notaEnvio');
            $venta->save();

            $pro = TableProductos::find($Productos[$cont]);
            $total = ($pro->preciosProductos*$cantidad[$cont]);
            $totalf = ($totalf + $total);

            $cant = ($pro->cantidadProductos - $cantidad[$cont]);
            $pro->cantidadProductos = $cant;
            $pro->save();

            $cont = $cont + 1;
        }

        $factura->totals = $totalf;**/
        //$partidac = Partidac::orderBy('id','ASC')->nombre($nombre)->paginate(10);
        return redirect()->route('partidac.index')->with('success','Partida actualizado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partidac = Partidac::find($id);
      return view('partidac.show',compact('partidac'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partidac = Partidac::find($id);
        return view('partidac.edit',compact('partidac'));
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
          'id_facturas',
            'id_productos',
            'cantidad'
        ]);
        Partidac::find($id)->update($request->all());
        return redirect()->route('partidac.index')->with('success','Partida actualizado con exito');
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
            Partidac::find($id)->delete();
            Alert::success('Partida eliminada con exito');
        return redirect()->route('partidac.index');
    		} catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otra asignación');
        return redirect()->route('partidac.index');
        }
    }

     public function generatePDF(Request $request)

    {
        //$nombre = $request->get('cuenta');
        //$catcuentas = Catcuenta::orderBy('id','ASC')->nombre($nombre)->paginate(100);
        //$data = ['title' => 'Esta es una página de Prueba'];
        $catcuentas = Catcuenta::all();
        $partidac = Partidac::all();
        $partidacs = Partidac::all()->unique('correlativo');
        
        //$partidacs = Partidac::find($id);
        $date=new Carbon();
        $fecha = $date->format('d-m-Y');

        $pdf = PDF::loadView('partidac.reportePartidac',compact('catcuentas', 'partidac', 'partidacs','fecha'));
        $pdf->getDomPDF()->set_option("enable_php", TRUE);
        return $pdf->stream('partidac.pdf');

    }

    public function exportExcel(){
      //$partidac = Partidac::orderBy('id', 'desc')->get();
      //return (new partidacExport($partidac))->download('partidac.csv', \Maatwebsite\Excel\Excel::CSV);
      return Excel::download(new partidacExport, 'invoices.xlsx');
      //return Excel::download(new partidacEport, 'partidac.xlsx');
    }
}
