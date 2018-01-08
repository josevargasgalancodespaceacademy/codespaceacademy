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
        return false;
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
            'min_studies' => 'required|max:25',
            'min_salary' => 'integer|max:30',
            'max_salary' => 'integer|max:30',
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
            'state.required' => 'Selecciona un estado'
        ];
    }
}
