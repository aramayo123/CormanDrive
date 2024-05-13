<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreventivoRequest extends FormRequest
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
            'fecha' => 'required',
            'sucursal' => 'required',
            'cliente' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'fecha.required' => 'Añade una :attribute por favor',
            'sucursal.required' => 'La sucursal es necesaria',
            'cliente.required' => 'El cliente es obligatorio',
        ];
    }
}
