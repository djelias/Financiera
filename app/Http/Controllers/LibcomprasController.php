<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribuyentes;
use App\Libcompras;
use App\Catcuenta;
use Libcompras1\http\Request\LibcomprasRequest;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Carbon\Carbon;
use App\Exports\libcomprasExport;
use Maatwebsite\Excel\Facades\Excel;

class LibcomprasController extends Controller
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
        $nombre =$request->get('nombre');
        //$libcompra = Partidac::orderBy('correlativo','desc')->groupBy('correlativo')->having('correlativo', '>', 0)->get();
        //$partidac = Partidac::select('correlativo')
        //                ->distinct()
        //                ->get();
        $libcompra = Libcompras::orderBy('id','ASC')->nombre($nombre)->paginate(10);
        $libcompras = Libcompras::all();
        return view('libcompras.index',compact('libcompra', 'libcompras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //$personas = TableCliente::all();
        //$productos = TableProductos::all();
        //$factura = TableFacturas::all();
        //$venta = TableVentas::all();
        $catcuentas = Catcuenta::all();
        $contribuyentes = Contribuyentes::all();
        return view('libcompras.create',compact('contribuyentes'));
    }

    public function estadoc()
    {
        //$personas = TableCliente::all();
        //$productos = TableProductos::all();
        //$factura = TableFacturas::all();
        //$venta = TableVentas::all();
        $catcuentas = Catcuenta::all();
        $libcompra = libcompras::all();
        $libcompras = Libcompras::all()->unique('correlativo');
        
        return view('libcompras.estadoc',compact('catcuentas', 'libcompra', 'libcompras'));
    }

    public function estadoco()
    {
        //$personas = TableCliente::all();
        //$productos = TableProductos::all();
        //$factura = TableFacturas::all();
        //$venta = TableVentas::all();
        $catcuentas = Catcuenta::all();
        $libcompra = Libcompras::all();
        $libcompras = Libcompras::all()->unique('correlativo');
        
        return view('libcompras.estadoco',compact('catcuentas', 'libcompra', 'libcompras'));
    }

    public function reporte(Request $request)
    {
        //$personas = TableCliente::all();
        //$productos = TableProductos::all();
        //$factura = TableFacturas::all();
        //$venta = TableVentas::all();
        $mes = $request->get('mes');
        $año = $request->get('año');
        $libcompras2 = DB::table('libcompras')
        ->select('*')
        ->where('mes', $mes)
        ->orWhere('año', $año)
        ->get();
        $contribuyentes = Contribuyentes::all();
        $catcuentas = Catcuenta::all();
        $libcompra = libcompras::all();
        //$libcompras2 = DB::select('select * from libcompras where mes = :mes1',  $mes1);;
        $libcompras = Libcompras::all()->unique('correlativo');
        
        return view('libcompras.reporte',compact('catcuentas', 'libcompra', 'libcompras', 'libcompras2', 'contribuyentes'));
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
        $tipoDoc = $request->get('tipoDoc');
        $tipo2 = $request->get('tipo2');
        $ccf = $request->get('ccf');
        $fechaccf = $request->get('fechaccf');
        $montoGravado = $request->get('montot');
        $idContribuyente = $request->get('idContribuyente');
        $siva2 = $request->get('siva');
        $sriva2 = $request->get('sriva');
        $sneto2 = $request->get('sneto2');
        $srenta = $request->get('srenta');
        while ($cont < count($montoGravado)) {
        $año= substr($fechaccf[$cont], 0, 4);
        $mes= substr($fechaccf[$cont], 5, 2);
        $libcompra = new Libcompras;
        $libcompra->tipoDoc = $tipoDoc[$cont]; 
        $libcompra->tipo2 = $tipo2[$cont]; 
        $libcompra->ccf = $ccf[$cont]; 
        $libcompra->fechaccf = $fechaccf[$cont]; 
        $libcompra->año = $año; 
        $libcompra->mes = $mes; 
        $libcompra->idContribuyente = $idContribuyente[$cont]; 
        $libcompra->iva = $siva2[$cont]; 
        $libcompra->riva = $sriva2[$cont]; 
        $libcompra->sneto = $sneto2[$cont]; 
        $libcompra->renta = $srenta[$cont]; 
        $libcompra->montoGravado = $montoGravado[$cont]; 
        $libcompra->estatus = $estatus;
        $libcompra->save();


        $cont = $cont + 1;
        }


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

        //$factura->totals = $totalf;*/
        
        return redirect()->route('libcompras.index')->with('success','Registro guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libcompra = Libcompras::find($id);
      return view('libcompras.show',compact('libcompra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libcompra = Libcompras::find($id);
        return view('libcompras.edit',compact('libcompra'));
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
        libcompras::find($id)->update($request->all());
        return redirect()->route('libcompras.index')->with('success','Partida actualizado con exito');
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
            Libcompras::find($id)->delete();
            Alert::success('compras eliminada con exito');
        return redirect()->route('libcompras.index');
            } catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otros datos');
        return redirect()->route('libcompras.index');
        }
    }

    public function generatePDF(Request $request)

    {
        $nombre = $request->get('tipoDoc');
        //$libcompras2 = Libcompras::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        $libcompras2 = Libcompras::all();
        $contribuyentes = Contribuyentes::all();
        $catcuentas = Catcuenta::all();
        
        $date=new Carbon();
        $fecha = $date->format('d-m-Y');

        $pdf = PDF::loadView('libcompras.reporteLibcompras',compact('libcompras2','fecha','contribuyentes','catcuentas'));
        $pdf->getDomPDF()->set_option("enable_php", TRUE);
        return $pdf->stream('libcompras.pdf');

    }

    public function exportExcel(){
      //$partidac = Partidac::orderBy('id', 'desc')->get();
      //return (new partidacExport($partidac))->download('partidac.csv', \Maatwebsite\Excel\Excel::CSV);
      return Excel::download(new libcomprasExport, 'libcompras.xlsx');
      //return Excel::download(new partidacEport, 'partidac.xlsx');
    }


}
