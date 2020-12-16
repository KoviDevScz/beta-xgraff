<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes= Cliente::latest()->paginate(10);
        return view('cliente.index',compact('clientes'));
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
    public function store(ClienteRequest $request)
    {
        $requestdata=$request->except('_token');
        Cliente::create([
            'nombre'=>$requestdata['nombre'],
            'ci'=>$requestdata['ci'],
            'telf'=>$requestdata['telf'],
            'direccion'=>$requestdata['direccion']
            ]);
        return redirect('cliente')->with('success', 'Cliente creada exitosamente!');
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
    public function update(ClienteRequest $request, $id)
    {
        
        $requestdata=$request->except('_token','method');
        Cliente::where('id',$id)->update([
            'nombre'=>$requestdata['nombre'],
            'ci'=>$requestdata['ci'],
            'telf'=>$requestdata['telf'],
            'direccion'=>$requestdata['direccion'],
            'estado'=>$requestdata['estado']
            ]);
        return redirect('cliente')->with('update', 'Cliente modificado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::where('id',$id)->delete();
        return back()->with('danger', 'Cliente modificado exitosamente!');
    }
}
