<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Investigacion;
use Validator;


class InvestigacionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investigacions = Investigacion::all();


        return $this->sendResponse($investigacions->toArray(), 'Investigaciones recibidas con exito.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'nombreInv' => 'required',
            'fechaIngreso' => 'required',
            'lugarInv' => 'required',
            'responsableInv' => 'required',
            'objetivo' => 'required',
            'contacto' => 'required',
            'unidadEncargada' => 'required',
            'otrasInstit' => 'required',
            'documentacion' => 'required',
            'descripcionInvestigacion' => 'required',
            'correoElectronico' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Error de validacion.', $validator->errors());       
        }


        $investigacion = Investigacion::create($input);


        return $this->sendResponse($investigacion->toArray(), 'Investigacion creada con exito.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $investigacion = Investigacion::find($id);


        if (is_null($investigacion)) {
            return $this->sendError('Investigacion no encontrada.');
        }


        return $this->sendResponse($investigacion->toArray(), 'Investigacion enviada con exito.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investigacion $investigacion)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'nombreInv' => 'required',
            'fechaIngreso' => 'required',
            'lugarInv' => 'required',
            'responsableInv' => 'required',
            'objetivo' => 'required',
            'contacto' => 'required',
            'unidadEncargada' => 'required',
            'otrasInstit' => 'required',
            'documentacion' => 'required',
            'descripcionInvestigacion' => 'required',
            'correoElectronico' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Error de validacion.', $validator->errors());       
        }


        $investigacion->nombreInv = $input['nombreInv'];
        $investigacion->fechaIngreso = $input['fechaIngreso'];
        $investigacion->lugarInv = $input['lugarInv'];
        $investigacion->responsableInv = $input['responsableInv'];
        $investigacion->objetivo = $input['objetivo'];
        $investigacion->contacto = $input['contacto'];
        $investigacion->unidadEncargada = $input['unidadEncargada'];
        $investigacion->otrasInstit = $input['otrasInstit'];
        $investigacion->documentacion = $input['documentacion'];
        $investigacion->descripcionInvestigacion = $input['descripcionInvestigacion'];
        $investigacion->correoElectronico = $input['correoElectronico'];
        $investigacion->save();


        return $this->sendResponse($investigacion->toArray(), 'Investigacion actualizada con exito.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investigacion $investigacion)
    {
        $investigacion->delete();


        return $this->sendResponse($investigacion->toArray(), 'Investigacion eliminada con exito.');
    }
}