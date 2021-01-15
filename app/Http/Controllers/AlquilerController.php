<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Cliente;
use App\Models\Detalle_Alquiler_Maquinaria_Cliente;
use App\Models\Empleados;
use App\Models\Maquinaria;
use App\Models\Personal;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alquileres=Alquiler::paginate(10);
        return view('alquiler.index',compact('alquileres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maquinarias = Maquinaria::where('estado',1)->get();
        $clientes = Cliente::where('estado',1)->get();
        $vendedores = Personal::where('estado',1)->get();
        return view('alquiler.create',compact('maquinarias','clientes','vendedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->products);
        $producto=$request->products;
        $requestdata=$request->except('_token');
        $datos= Alquiler::create([
            'cliente_id'=>$requestdata['cliente_id'],
            'personal_id'=>$requestdata['personal_id'],
            'monto_total'=>$requestdata['total'],
            'garantia'=>$requestdata['garantia'],
            'fecha_alquiler'=>date('Y-m-d H:i'),
            ]);
            if($datos){
            foreach ($producto as $key => $value) {
                /* dd($value['dia']);
                $value['dia']=str_replace(' ','-',$value['dia']); */
                Detalle_Alquiler_Maquinaria_Cliente::create([
                    'alquiler_id'=>$datos->id,
                    'maquinaria_id'=>$value['producto_id'],
                    'cantidad'=>$value['cantidad_producto'],
                    'monto'=>$value['precio_producto'],
                    'fecha_devolucion'=>date("Y-m-d h:i:s",strtotime($value['dia']) ),
                ]);
            }
        }
        return redirect('alquiler')->with('success', 'alquiler creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alquiler=Alquiler::where('id',$id)->get();
        $maquinarias=DB::table('detalle_alquiler_maquinaria_cliente')
                            ->select('maquinarias.*','detalle_alquiler_maquinaria_cliente.id as detalle_id','detalle_alquiler_maquinaria_cliente.*')
                            ->join('maquinarias','maquinarias.id','=','detalle_alquiler_maquinaria_cliente.maquinaria_id')
                            ->get();
        return view('alquiler.show',compact('alquiler','maquinarias' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id!=0) {
            $alquiler=Alquiler::where('id',$id)->get();
            $maquinarias=DB::table('detalle_alquiler_maquinaria_cliente')
                                ->select('maquinarias.*','detalle_alquiler_maquinaria_cliente.id as detalle_id','detalle_alquiler_maquinaria_cliente.*')
                                ->join('maquinarias','maquinarias.id','=','detalle_alquiler_maquinaria_cliente.maquinaria_id')
                                ->get();
            return view('devolucion.create',compact('alquiler','maquinarias' ));
        } else {
            return back()->with('error','No hay alquiler con ese codigo');
        }
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
        $datos=Alquiler::create([
            'estado'=>$requestdata['estado'],
            ]);
        return redirect('alquiler')->with('update', 'Alquiler anulado!.');
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
