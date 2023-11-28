<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsociadoRequest extends FormRequest
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
            'dni'   => 'required|string|min:7|max:10|unique:users,dni,'.$this->asociado,
            'email' => 'required|email|unique:users,email,'.$this->asociado,
        ];
    }
}
