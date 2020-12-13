<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaquinariaRequest;
use App\Models\Categoria;
use App\Models\Maquinaria;
use DateTime;
use Illuminate\Http\Request;

class MaquinariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias =Categoria::where('estado',1)->get();
        $maquinarias =Maquinaria::paginate(10);
        $aux = new DateTime($maquinarias[0]->fecha_compra);
        $fecha_ejemplo = $aux->format('Y-m-d');
        return view('maquinaria.index',compact('categorias','maquinarias'));
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
    public function store(MaquinariaRequest $request)
    {
        $requestdata=$request->except('_token');
        Maquinaria::create([
            'nombre'=>$requestdata['nombre'],
            'categoria_id'=>$requestdata['categoria'],
            'nombre'=>$requestdata['nombre'],
            'fecha_compra'=>date("Y-m-d h:i:s",strtotime($requestdata['fecha']) ),
            'garantia'=>$requestdata['precio'],
            'precio'=>$requestdata['precio'],
            'hora'=>$requestdata['hora'],
            'semana'=>$requestdata['semana'],
            'mes'=>$requestdata['mes'],
            ]);
        return redirect('maquinaria')->with('success', 'Maquinaria creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
        $requestData = $request->except('_token','_method');
        Maquinaria::where('id',$id)-> update([
            'nombre'=>$requestData['nombre'],
            'categoria_id'=>$requestData['categoria'],
            'nombre'=>$requestData['nombre'],
            'fecha_compra'=>date("Y-m-d h:i:s",strtotime($requestData['fecha']) ),
            'garantia'=>$requestData['precio'],
            'precio'=>$requestData['precio'],
            'hora'=>$requestData['hora'],
            'semana'=>$requestData['semana'],
            'mes'=>$requestData['mes'],
            ]);
        return redirect('maquinaria')->with('update', 'Maquinaria Editada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Maquinaria::where('id',$id)->delete();
        return back()->with('delete', 'Maquinaria eliminada exitosamente!');
    }
}
