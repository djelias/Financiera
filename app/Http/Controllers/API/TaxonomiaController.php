<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Taxonomia;
use Validator;


class TaxonomiaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxonomias = Taxonomia::all();


        return $this->sendResponse($taxonomias->toArray(), 'Taxonomias retrieved successfully.');
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
            'numVoucher' => 'required',
            'nombreComun' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $taxonomia = Taxonomia::create($input);


        return $this->sendResponse($taxonomia->toArray(), 'taxonomia created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taxonomia = Taxonomia::find($id);


        if (is_null($taxonomia)) {
            return $this->sendError('taxonomia not found.');
        }


        return $this->sendResponse($taxonomia->toArray(), 'taxonomia retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taxonomia $taxonomia)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'numVoucher' => 'required',
            'nombreComun' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $taxonomia->numVoucher = $input['numVoucher'];
        $taxonomia->nombreComun = $input['nombreComun'];
        $taxonomia->save();


        return $this->sendResponse($taxonomia->toArray(), 'taxonomia updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taxonomia $taxonomia)
    {
        $taxonomia->delete();


        return $this->sendResponse($taxonomia->toArray(), 'taxonomia deleted successfully.');
    }
}