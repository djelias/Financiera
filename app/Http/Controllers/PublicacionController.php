<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use Coleccion1\http\Request\PublicacionRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
         $this->middleware('permission:Publicaciones|Crear Publicacion|Editar Publicacion|Eliminar Publicacion', ['only' => ['index','show']]);
         $this->middleware('permission:Publicaciones', ['only' => ['index']]);
         $this->middleware('permission:Crear Publicacion', ['only' => ['create','store']]);
         $this->middleware('permission:Editar Publicacion', ['only' => ['edit','update']]);
         $this->middleware('permission:Eliminar Publicacion', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $nombre = $request->get('nombrePublicacion');
        $publicaciones = Publicacion::orderBy('id','DESC')->nombre($nombre)->paginate(10);
               return view('publicacion.index',compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $publicaciones = Publicacion::all();
        return view('publicacion.create', compact('publicaciones'));
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

          'nombrePublicacion'=>'required',
          'descripcionPub'=>'required',
          'url',
          'fechaInicio',
          'fechaFin',
          'imagen',
        ]);

        $data = $request->all();
            if($request->hasFile('imagen')){
                   // $destination_path = 'public/especimens';
                     $imagen = $request->file('imagen');
                     $img_name = time().$request->file('imagen')->getClientOriginalName();
                    $imagen->move(public_path().'/publicaciones/',$img_name);
                     $data['imagen'] = $img_name;
                    }
        
        Publicacion::create($request->all());
        Alert::success('Publicacion agregada con éxito');
        return redirect()->route('publicacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicaciones = Publicacion::find($id);
      return view('publicacion.show',compact('publicaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicaciones = Publicacion::find($id);
        return view('publicacion.edit',compact('publicaciones'));
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
          'nombrePublicacion'=>'required',
          'descripcionPub'=>'required',
          'url',
          'fechaInicio',
          'fechaFin',
          'imagen',
        ]);
        Publicacion::find($id)->update($request->all());
        return redirect()->route('publicacion.index')->with('success','Publicacion actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            Publicacion::find($id)->delete();
            Alert::success('Publicacion eliminada con exito');
        return redirect()->route('publicacion.index');
    }
}
