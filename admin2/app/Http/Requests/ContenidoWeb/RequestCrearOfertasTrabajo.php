<?php

namespace App\Http\Requests\ContenidoWeb;

use Illuminate\Foundation\Http\FormRequest;

class RequestCrearOfertasTrabajo extends FormRequest
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
            'name' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'business' => 'required|max:100',
            'offer_type' => 'required|max:50',
            'min_experience' => 'required|max:25',
            'min_studies' => 'required|max:50',
            'min_salary' => 'max:30',
            'max_salary' => 'max:30',
            'min_requirements' => 'required',
            'num_vacant' => 'required|integer|max:10',
            'industry_type' => 'required|max:100',
            'offer_short_description' => 'required|max:300',
            'offer_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute tiene un formato incorrecto.',
            'integer' => 'El campo :attribute tiene un formato incorrecto.',
            'max' => 'El campo :attribute ha superado el límite de caracteres permitido.',
        ];
    }
}
