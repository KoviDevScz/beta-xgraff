<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Detalle_Alquiler_Maquinaria_Cliente;
use App\Models\DetalleDevolucion;
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
        $devoluciones=Devolucion::paginate(10);
        return view('devolucion.index',compact('devoluciones') );
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
        $requestdata=$request->except('_token');
        
        $maquinarias=DB::table('detalle_alquiler_maquinaria_cliente')
                                ->select('maquinarias.*','detalle_alquiler_maquinaria_cliente.id as detalle_id','detalle_alquiler_maquinaria_cliente.*')
                                ->join('maquinarias','maquinarias.id','=','detalle_alquiler_maquinaria_cliente.maquinaria_id')
                                ->get();
        $datos= Devolucion::create([
            'alquiler_id'=>$requestdata['alquiler_id'],
            'cliente_id'=>$requestdata['cliente_id'],
            'personal_id'=>$requestdata['personal_id'],
            'observacion'=>$requestdata['observacion'],
            'garantia_devolucion'=>$requestdata['garantia'],
            'fecha_alquiler'=>date("Y-m-d h:i",strtotime($requestdata['fecha'])),
            'fecha_devolucion'=>date('Y-m-d H:i'),
        ]);
        Alquiler::where('id',$datos->id)->update([
            'estado'=>0,
        ]);
            if($datos){
            foreach ($maquinarias as $key => $value) {
                DetalleDevolucion::create([
                    'devolucion_id'=>$datos->id,
                    'maquinaria_id'=>$value->maquinaria_id,
                    'cantidad'=>$value->cantidad,
                ]);
            }
        }
        return redirect(route('devolucion.show',$requestdata['alquiler_id']))->with('success', 'alquiler devuelto exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alquiler=Devolucion::where('id',$id)->get();
        $maquinarias=DB::table('detalle_alquiler_maquinaria_cliente')
                            ->select('maquinarias.*','detalle_alquiler_maquinaria_cliente.id as detalle_id','detalle_alquiler_maquinaria_cliente.*')
                            ->join('maquinarias','maquinarias.id','=','detalle_alquiler_maquinaria_cliente.maquinaria_id')
                            ->get();
        return view('devolucion.show',compact('alquiler','maquinarias' ));
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
