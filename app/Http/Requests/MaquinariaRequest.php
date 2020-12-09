<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaquinariaRequest extends FormRequest
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
            'nombre'=> 'required|string|max:50',
            'categoria'=> 'required',
            'fecha' => 'required|string',
            'precio'=> 'required|string|max:4',
            'hora'  => 'nullable|string|max:4',
            'semana'=> 'nullable|string|max:4',
            'mes'   => 'nullable|string|max:4',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'   => 'El campo no puede estar vacio',
            'nombre.max'        => 'El campo :attribute no puede exceder :max caracteres',
            'categoria.required'   => 'Usted no ha selecionado una categoría',
            'fecha.required'    => 'El campo :attribute tiene que tener fecha',
            'fecha.date_format'    => 'El campo :attribute tiene formato de fecha',
            'precio.required'=> 'El campo :attribute no puede estar vacio',
            'precio.max'=> 'El campo :attribute no puede exceder el numero de :max digitos',
            'hora.max'=> 'El campo :attribute no puede exceder el numero de :max digitos',
            'semana.max'=> 'El campo :attribute no puede exceder el numero de :max digitos',
            'mes.max'=> 'El campo :attribute no puede exceder el numero de :max digitos',
        ];
    }
    public function attributes()
    {
        return [
            'nombre'=> 'required|string|max:50',
            'categoria'=> 'required',
            'fecha' => 'required|date_format:dd/mm/yyyy',
            'precio'=> 'required|digits:9',
            'hora'  => 'nullable|digits:9',
            'semana'=> 'nullable|digits:9',
            'mes'   => 'nullable|digits:9',
        ];
    }
}
