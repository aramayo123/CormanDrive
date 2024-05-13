<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtEditRequest extends FormRequest
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

    public function rules()
    {
        return [
            'fecha_abierto' => 'required',
            'estado' =>  'required',
            'sucursal' => 'required',
            'cliente' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'fecha_abierto' => 'fecha de apertura',
            'fecha_cerrado' => 'fecha de cierre',
        ];
    }
    public function messages()
    {
        return [
            'remedit.required' => 'El remedy es obligatorio.',
            'remedit.unique' => 'El remedy ya existe.',
            'fecha_abierto.required' => 'Añade una fecha de apertura por favor',
            'estado.required' => 'El estado del remedy es obligatorio',
            'sucursal.required' => 'La sucursal es obligatoria',
            'cliente.required' => 'El cliente es obligatorio',
        ];
    }
}
