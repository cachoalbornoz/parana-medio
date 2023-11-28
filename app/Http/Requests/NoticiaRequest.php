<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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

            'titulo' => 'max:255',
            'imagen' => 'mimes:png,jpg,jpeg|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required'   => 'El titulo de la noticia es requerido ',
            'imagen.max'   => 'La imagen supera los 5 Mbytes',
        ];
    }
}
