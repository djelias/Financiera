<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Coleccion;
use Validator;
use Illuminate\Support\Facades\DB;


class ColeccionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $coleccions = Coleccion::all();


        return $this->sendResponse($coleccions->toArray(), 'Coleccions retrieved successfully.');
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
            'nombreColeccion' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $coleccion = Coleccion::create($input);


        return $this->sendResponse($coleccion->toArray(), 'Coleccion created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coleccion = Coleccion::find($id);


        if (is_null($coleccion)) {
            return $this->sendError('Coleccion not found.');
        }


        return $this->sendResponse($coleccion->toArray(), 'Coleccion retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coleccion $coleccion)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'nombreColeccion' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $coleccion->nombreColeccion = $input['nombreColeccion'];
        $coleccion->save();


        return $this->sendResponse($coleccion->toArray(), 'Coleccion updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coleccion $coleccion)
    {
        $coleccion->delete();


        return $this->sendResponse($coleccion->toArray(), 'Coleccion deleted successfully.');
    }
}