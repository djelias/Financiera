<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Dominio;
use App\Reino;
use App\Filum;
use Filum1\http\Request\FilumRequest;
use RealRashid\SweetAlert\Facades\Alert;

class FilumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	
        $reinos = Reino::all();
        $filums = Filum::all();
        $nombre =$request->get('nombreFilum');
        $filums = Filum::orderBy('id','DESC')->nombre($nombre)->paginate(10);
        return view('filum.index',compact('filums','reinos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $reinos = Reino::all();
        $filums = Filum::all();
        return view('filum.create', compact('reinos','filums'));
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
          'idReino'=>'required|numeric',  
          'nombreFilum'=>'required|alpha_spaces',
          ]);
            Filum::create($request->all());
            Alert::success('Filum agregado con éxito');
        return redirect()->route('filum.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filums = Filum::find($id);
      return view('filum.show',compact('filums'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idFilum)
    {
       
        $reinos = Reino::all();
        $filums = Filum::find($idFilum);
        return view('filum.edit',compact('filums','reinos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idFilum)
    {
        $this->validate($request,[
          'idReino'=>'required|numeric',  
          'nombreFilum'=>'required|alpha_spaces',
          ]);
        Filum::find($idFilum)->update($request->all());
        Alert::success('Filum actualizado con éxito');
        return redirect()->route('filum.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idFilum)
    {
        try{
             Filum::find($idFilum)->delete();
             Alert::success('Filum eliminado con exito');
        return redirect()->route('reino.index');
    }catch (\Illuminate\Database\QueryException $e) {
    	Alert::danger('No se Puede eliminar este registro porque esta asociado a otros datos');
        return redirect()->route('filum.index');
    }
    }
}
