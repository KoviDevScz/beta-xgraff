<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nombre'=> 'required|string|max:150',
            'ci'=> 'required|string|max:8|min:7',
            'telf' => 'required|string|max:8|min:7',
            'direccion'=> 'required|string|max:150',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'   => 'El campo no puede estar vacio',
            'nombre.max'        => 'El campo no puede exceder :max caracteres',
            'nombre.min'        => 'El campo tiene que ser mayor a :max caracteres',
            'ci.required'   => 'Usted no ha selecionado una categoría',
            'ci.max'        => 'El campo no puede exceder :max caracteres',
            'ci.min'        => 'El campo tiene que ser mayor a :min caracteres',
            'telf.required'=> 'El campo :attribute no puede estar vacio',
            'telf.max'        => 'El campo no puede exceder :max caracteres',
            'telf.min'        => 'El campo tiene que ser mayor a :max caracteres',
            'direccion.required'=> 'El campo :attribute no puede estar vacio',
            'direccion.max'        => 'El campo no puede exceder :max caracteres',
            'direccion.min'        => 'El campo tiene que ser mayor a :max caracteres',
        ];
    }
}
