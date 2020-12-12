<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Cliente;
use App\Models\Detalle_Alquiler_Maquinaria_Cliente;
use App\Models\Maquinaria;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $clientes = Cliente::where('estado',1)->get();
        $vendedores = User::where('estado',1)->get();
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
        /* $date = DateTime::createFromFormat('d/m/Y', $requestdata['fecha']); */
        $datos= Alquiler::create([
            'cliente_id'=>$requestdata['cliente_id'],
            'empleado_id'=>1,
            'monto_total'=>$requestdata['total'],
            'garantia'=>$requestdata['garantia'],
            'fecha_alquiler'=>date('Y-m-d'),
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
