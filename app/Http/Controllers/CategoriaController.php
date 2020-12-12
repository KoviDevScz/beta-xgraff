<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias= Categoria::latest()->paginate(5);
        return view('categoria.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'nombre' => ['required', 'max:50','min:2'],
            'descripcion' => ['nullable','max:150','min:2'],
        ];
        //mensajes
        $messages=[
            'nombre.required'=>'Debes colocar un nombre',
            'nombre.max'=>'No debe exceder el maximo de :value caracteres',
            'nombre.min'=>'Debe ser mayor a :value caracteres',
            'descripcion.max'=>'No debe exceder el maximo valor :value caracteres',
            'descripcion.min'=>'Debe ser mayor a :value caracteres',
        ];
        //validar todo lo que entrea por el request
        $this->validate($request,$rules,$messages);
        //evitar que entre el token y el method del formulario
        $requestdata=$request->except('_token');
        Categoria::create([
            'nombre'=>$requestdata['nombre'],
            'descripcion'=>$requestdata['descripcion']
            ]);
        return redirect('categoria')->with('success', 'Categoría creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestdata=$request->except('_token','method');
        $datos=Categoria::where('id',$id)->update([
            'nombre'=>$requestdata['nombre'],
            'descripcion'=>$requestdata['descripcion'],
            'estado'=>$requestdata['estado']
            ]);
        return redirect('categoria')->with('update', 'Categoría modificada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Categoria::where('id',$id)->delete();
        return back()->with('delete', 'Categoría  eliminada exitosamente!');
    }
}
