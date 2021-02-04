<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dominio;
use Dominio1\http\Request\DominioRequest;
use RealRashid\SweetAlert\Facades\Alert;

class DominioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombreDominio');
        $dominios = Dominio::orderBy('id','DESC')->nombre($nombre)->paginate(10);
               return view('dominio.index',compact('dominios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $dominios = Dominio::all();
        return view('dominio.create', compact('dominios'));
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

          'id',
          'nombreDominio'=>'required|alpha_spaces',
        ]);
        Dominio::create($request->all());
        Alert::success('Dominio agregada con éxito');
        return redirect()->route('dominio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dominio  $dominio
     * @return \Illuminate\Http\Response
     */
    public function show(Dominio $dominio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dominio  $dominio
     * @return \Illuminate\Http\Response
     */
    public function edit(Dominio $dominio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dominio  $dominio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dominio $dominio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dominio  $dominio
     * @return \Illuminate\Http\Response
     */
    public function destroy($idDominio)
    {
       try{
            Dominio::find($idDominio)->delete();
            Alert::success('Dominio eliminado con exito');
        return redirect()->route('dominio.index');
            } catch  (\Illuminate\Database\QueryException $e){
                 Alert::danger('No se Puede eliminar este registro porque esta asociado con otros datos');
        return redirect()->route('dominio.index');
        }
    }
    }

