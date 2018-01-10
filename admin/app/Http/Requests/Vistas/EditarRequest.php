<?php

namespace App\Http\Requests\Vistas;

use Illuminate\Foundation\Http\FormRequest;

class EditarRequest extends FormRequest
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
            'state' => 'required'   
        ];
    }
    public function messages()
    {
        return [
            'state.required' => 'Selecciona un estado'
        ];
    }
}
