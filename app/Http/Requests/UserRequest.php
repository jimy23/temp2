<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'id' => 'required|digits_between:10,11|unique:users|unique:solicitudes',
            'name' => 'required|max:255',
            'apellido' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'tipoDocumento' => 'required',
            'fechaNacimiento' => 'required|before:now',
            'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'genero' => 'required',
            'telefono' => 'required|size:7',
            'tipoUsuario_codigoTipoUsuario' => 'required',
            'grupo_codigoGrupo' => 'required_if:tipoUsuario_codigoTipoUsuario,3',
            'institucion_codigoInstitucion' => 'required_if:tipoUsuario_codigoTipoUsuario,3'
        ];
    }
}
