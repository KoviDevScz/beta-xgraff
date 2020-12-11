<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Maquinaria;
use App\User;
use DateTime;
use Illuminate\Http\Request;

class AlquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alquiler.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maquinarias = Maquinaria::where('estado',1)->get();
        $clientes = User::get();
        return view('alquiler.create',compact('maquinarias','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $requestdata=$request->except('_token');
        $date = DateTime::createFromFormat('d/m/Y', $requestdata['fecha']);
        $datos= Alquiler::create([
            'nombre'=>$requestdata['nombre'],
            'categoria_id'=>$requestdata['categoria'],
            'nombre'=>$requestdata['nombre'],
            'fecha_compra'=>$date->format('d-m-Y'),
            'garantia'=>$requestdata['precio'],
            'precio'=>$requestdata['precio'],
            'hora'=>$requestdata['hora'],
            'semana'=>$requestdata['semana'],
            'mes'=>$requestdata['mes'],
            ]);
        return redirect('alquiler')->with('success', 'Maquinaria creada exitosamente!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
