<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Detalle_Alquiler_Maquinaria_Cliente;
use App\Models\Devolucion;
use App\Models\Maquinaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return view('devolucion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        /* dd($request); */
        $maquinarias=DB::table('detalle_alquiler_maquinaria_cliente')
                                ->select('maquinarias.*','detalle_alquiler_maquinaria_cliente.id as detalle_id','detalle_alquiler_maquinaria_cliente.*')
                                ->join('maquinarias','maquinarias.id','=','detalle_alquiler_maquinaria_cliente.maquinaria_id')
                                ->get();
        $requestdata=$request->except('_token');
        $datos= Devolucion::create([
            'alquiler_id'=>$requestdata['alquiler_id'],
            'cliente_id'=>$requestdata['cliente_id'],
            'empleado_id'=>$requestdata['personal_id'],
            'garantia_devolucion'=>$requestdata['garantia'],
            'fecha_retiro'=>date("Y-m-d h:i",strtotime($requestdata['fecha'])),
            'fecha_devolucion'=>date('Y-m-d H:i'),
        ]);
            if($datos){
            foreach ($maquinarias as $key => $value) {
                /* dd($value['dia']);
                $value['dia']=str_replace(' ','-',$value['dia']); */
                Detalle_Alquiler_Maquinaria_Cliente::create([
                    'alquiler_id'=>$datos->id,
                    'maquinaria_id'=>$value['maquinaria_id'],
                    'cantidad'=>$value['cantidad'],
                ]);
            }
        }
        return redirect('devolucion')->with('success', 'alquiler devuelto exitosamente!');
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
