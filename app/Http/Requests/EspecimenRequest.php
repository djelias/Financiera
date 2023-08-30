<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EspecimenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'codigoEspecimen'=>'required',
          'idEspecie'=>'required|numeric', 
          'cantidad'=>'required|numeric',      
          'caracteristicas'=>'required',
          'colector' =>'required',
          'fechaColecta'=>'required|date',
          'habitat'=>'required',
          'horaSecuenciacion1'=>'required',
          'latitud'=>'required',
          'longitud'=>'required',
          'peso'=>'required',
          'tamano'=>'required',
          'tecnicaRecoleccion'=>'required',
          'tipoMuestra'=>'required',
            ];
    }
}

