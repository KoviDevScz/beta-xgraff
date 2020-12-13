<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
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
        $productos=[];
        $alquiler=[];
        if($request->get('busqueda')){
            $alquiler = Alquiler::where("id", "LIKE", "%{$request->get('busqueda')}%")
                ->paginate(5);

            return view('devolucion.create')->with('buscar', $alquiler);
        }
        /* $id=$request->get('buscar');
            $alquiler=DB::table('alquileres')
            ->select('alquileres.*','detalle_alquiler_maquinaria_cliente.id as dal_id')
            ->join('detalle_alquiler_maquinaria_cliente','detalle_alquiler_maquinaria_cliente.alquiler_id','=','alquileres.id')
            ->where('alquileres.id','=',$id)
            ->get();
        $productos= DB::table('alquileres')
                    ->select('alquileres.*','detalle_alquiler_maquinaria_cliente.id as dal_id')
                    ->join('detalle_alquiler_maquinaria_cliente','detalle_alquiler_maquinaria_cliente.alquiler_id','=','alquileres.id')
                    ->get(); */
        return view('devolucion.create',compact('productos','alquiler'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
