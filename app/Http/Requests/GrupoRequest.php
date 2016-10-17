<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GrupoRequest extends Request
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
            'codigoGrupo'=>'unique:grupo|required', 
            'clasificacion'=>'min:2|max:15|required', 
            'grado'=>'numeric|required', 
        ];
    }
}
