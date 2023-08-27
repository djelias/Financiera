<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catcuenta;
use Catcuenta1\http\Request\CatcuentaRequest;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Carbon\Carbon;

class CatcuentaController extends Controller
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
        $nombre = $request->get('rubroDesc');
        $catcuentas = Catcuenta::orderBy('id','ASC')->nombre($nombre)->paginate(1000);
               return view('catcuenta.index',compact('catcuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $catcuentas = Catcuenta::all();
        return view('catcuenta.create', compact('catcuentas'));
    }

    public function create2()
    {
        $catcuentas = Catcuenta::all();
        return view('catcuenta.create2', compact('catcuentas'));
    }

    public function create3()
    {
        $catcuentas = Catcuenta::all();
        return view('catcuenta.create3', compact('catcuentas'));
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
          'cuenta', 
          'subcuenta', 
          'cuentaDetalle', 
          'rubroDesc', 
          'estatus',
          'saldoInicial',
          'debe',
          'haber',
          'saldo'
        ]);
        Catcuenta::create($request->all());
        return redirect()->route('catcuenta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catcuentas = Catcuenta::find($id);
      return view('catcuenta.show',compact('catcuentas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catcuentas = Catcuenta::find($id);
        return view('catcuenta.edit',compact('catcuentas'));
    }

    public function edit2($id)
    {
        $catcuentas = Catcuenta::find($id);
        return view('catcuenta.edit2',compact('catcuentas'));
    }

    public function edit3($id)
    {
        $catcuentas = Catcuenta::find($id);
        return view('catcuenta.edit3',compact('catcuentas'));
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
          'cuenta', 
          'subcuenta', 
          'cuentaDetalle', 
          'rubroDesc', 
          'estatus',
          'saldoInicial',
          'debe',
          'haber',
          'saldo'
        ]);
        Catcuenta::find($id)->update($request->all());
        return redirect()->route('catcuenta.index');
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
            Catcuenta::find($id)->delete();
            Alert::success('catcuenta eliminado con exito');
        return redirect()->route('catcuenta.index');
            } catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otros datos');
        return redirect()->route('catcuenta.index');
        }
    }

    public function generatePDF(Request $request)

    {
        $nombre = $request->get('cuenta');
        $catcuentas = Catcuenta::orderBy('id','ASC')->nombre($nombre)->paginate(100);
        //$data = ['title' => 'Esta es una página de Prueba'];
        $date=new Carbon();
        $fecha = $date->format('d-m-Y');

        $pdf = PDF::loadView('catcuenta.reporteCatcuenta',compact('catcuentas','fecha'));
        $pdf->getDomPDF()->set_option("enable_php", TRUE);
        return $pdf->stream('catcuenta.pdf');

    }


}
