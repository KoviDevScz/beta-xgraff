<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalRequest;
use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $personals=Personal::paginate(5);
       return view('personal.index',compact('personals'));
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
    public function store(PersonalRequest $request)
    {
        $requestdata=$request->except('_token');
        $personal=new Personal;

            $personal->nombre=$requestdata['nombre'];
            $personal->ci=$requestdata['ci'];
            $personal->telf=$requestdata['telf'];
            $personal->direccion=$requestdata['direccion'];

            if ($files = $request->file('foto')) {
                $destinationPath = 'public/img/personal/';
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $personal->foto=$profileImage;
            }
        $personal->save();
        return redirect('personal')->with('success', 'personal registrado exitosamente!');
      
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
    public function update(PersonalRequest $request,$id )
    {
        $requestdata=$request->except('_token');
        Personal::where('id',$id)->update([
            'nombre'=>$requestdata['nombre'],
            'ci'=>$requestdata['ci'],
            'direccion'=>$requestdata['direccion'],
            'estado'=>$requestdata['estado']
           

            ]);
        return redirect('personal')->with('update', 'personal modificado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Personal::where('id',$id)->delete();
        return back()->with('delete', 'personal  eliminado exitosamente!');
    }
}
