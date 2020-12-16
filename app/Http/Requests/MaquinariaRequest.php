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
            'precio'=> 'required|string|max:5|min:2',
            'hora'  => 'nullable|string|max:5|min:2',
            'semana'=> 'nullable|string|max:5|min:2',
            'mes'   => 'nullable|string|max:5|min:2',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'   => 'El campo :attribute no puede estar vacio',
            'nombre.max'        => 'El campo :attribute no puede exceder :max caracteres',
            'categoria.required'   => 'Usted no ha selecionado una categoría',
            'fecha.required'    => 'El campo fecha no tiene que estar vacio',
            'fecha.date_format'    => 'El campo fecha no tiene formato de fecha',
            'precio.required'=> 'El campo :attribute no puede estar vacio',
            'precio.max'=> 'El campo :attribute no puede exceder el numero de :max digitos',
            'precio.min'=> 'El campo :attribute tiene que ser mayor a :min digitos',
            'hora.max'=> 'El campo :attribute no puede exceder el numero de :max digitos',
            'hora.min'=> 'El campo :attribute tiene que ser mayor a :min digitos',
            'semana.max'=> 'El campo :attribute no puede exceder el numero de :max digitos',
            'semana.min'=> 'El campo :attribute tiene que ser mayor a :min digitos',
            'mes.max'=> 'El campo :attribute no puede exceder el numero de :max digitos',
            'mes.min'=> 'El campo :attribute tiene que ser mayor a :min digitos',
        ];
    }
    public function attributes()
    {
        return [
            'nombre'=> 'nombre completo',
            'categoria'=> 'required',
            'fecha' => 'fecha de compra',
            'precio'=> 'precio del producto',
            'hora'  => 'precio por hora',
            'semana'=> 'precio por semana',
            'mes'   => 'precio por mes',
        ];
    }
}
