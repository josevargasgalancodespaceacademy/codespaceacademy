<?php

namespace App\Http\Requests\ContenidoWeb;

use Illuminate\Foundation\Http\FormRequest;

class RequestCrearEventos extends FormRequest
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
            'event_name' => 'required|string|max:100',
            'event_type' => 'required|string|max:100',
            'event_date' => 'required|date|date_format:Y/m/d|after:yesterday',
            'event_hour' => 'required|date_format:H:i',
            'event_url' => 'required',
            'event_image' => 'required|image|mimes:image/jpeg, image/png',
            'event_description' => 'required',
        ];
    }
        public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute tiene un formato incorrecto.',
            'alpha' => 'El campo :attribute solo puede contener letras.',
            'integer' => 'El campo :attribute tiene un formato incorrecto.',
            'date' => 'El campo :attribute tiene un formato incorrecto',
            'image' => 'El archivo :attribute seleccionado no es una imagen',
            'mimes' => 'El archivo :attribute no contiene un formato correcto',
            'date_format' => 'El campo :attribute no contiene el formato indicado',
            'after' => 'El campo :attribute no puede contener una fecha anterior al día de hoy',
            'max' => 'El campo :attribute ha superado el límite de caracteres permitido.',
        ];
    }
}
