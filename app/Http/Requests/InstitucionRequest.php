<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InstitucionRequest extends Request
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
            'codigoInstitucion' => 'required|unique:institucion',
            'nombre' => 'required|max:45',
            'direccion' => 'required|max: 45',
            'telefono' => 'numeric|required|digits_between:5,15',
            'sitioWeb' => 'required',
            'ciudad' => 'required|max:45'
        ];
    }
}
