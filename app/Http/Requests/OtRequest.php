<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            //'remedit' => 'required',
            'fecha_abierto' => 'required',
            'estado' =>  'required',
            //'remedit' => '',
            //'descripcion' => '',
            'sucursal' => 'required',
            'cliente' => 'required',
            //'personal_asignado' => '',
            //'url_carpeta' => 'required',
            //'estado' => 'required',
            //'fecha_abierto' => 'required',
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
            'remedit.required' => 'El numero de :attribute es obligatorio.',
            'fecha_abierto.required' => 'Añade una :attribute por favor',
            'estado.required' => 'El :attribute es obligatorio',
            'sucursal.required' => 'La :attribute es necesaria',
            'cliente.required' => 'El :attribute es obligatorio',
        ];
    }
}
