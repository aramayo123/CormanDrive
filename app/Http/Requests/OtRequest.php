<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OtRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'remedit' => 'required_without_all:combustible|unique:ots',
            'fecha_abierto' => 'required',
            'estado' =>  'required',
            'sucursal' => 'required_without_all:atm',
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
            'sucursal.required_without_all' => 'La sucursal es obligatoria',
            'remedit.required_without_all' => 'El remedy es obligatorio',
        ];
    }
}
