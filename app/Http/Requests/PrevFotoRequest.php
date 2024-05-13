<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrevFotoRequest extends FormRequest
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
            'fotos_preventivo' => 'mimes:png,jpg,jpeg',
            'fotos_observaciones' => 'mimes:png,jpg,jpeg',
            'fotos_boleta' => 'mimes:png,jpg,jpeg',
            'fotos_ot_combustible' => 'mimes:png,jpg,jpeg',
            'fotos_planilla' => 'mimes:png,jpg,jpeg',
        ];
    }
    public function messages()
    {
        return [
            'fotos_preventivo.mimes' => 'La imagen debe estar en formato: <p class="inline-block text-red-500">PNG,JPG,JPEG</p>.',
            'fotos_observaciones.mimes' => 'La imagen debe estar en formato: <p class="inline-block text-red-500">PNG,JPG,JPEG</p>.',
            'fotos_boleta.mimes' => 'La imagen debe estar en formato: <p class="inline-block text-red-500">PNG,JPG,JPEG</p>.',
            'fotos_ot_combustible.mimes' => 'La imagen debe estar en formato: <p class="inline-block text-red-500">PNG,JPG,JPEG</p>.',
            'fotos_planilla.mimes' => 'La imagen debe estar en formato: <p class="inline-block text-red-500">PNG,JPG,JPEG</p>.',
        ];
    }
}
