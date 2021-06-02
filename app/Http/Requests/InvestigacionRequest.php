<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestigacionRequest extends FormRequest
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
            'idZona'=> 'required',
            'idMunicipio'=> 'required',
            'idTipo'=> 'required',
            'idUsuario'=> 'required',
            'nombreInv'=> 'required',

            ];
    }
}