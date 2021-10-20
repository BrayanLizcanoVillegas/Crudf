<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empelados']=Empleados::paginate(5);

        return view('empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosEmpleados=request()->all();

        $datosEmpleados=request()->except('_token');

        if($request->hasFile('Foto')){
            $datosEmpleados['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Empleados::insert($datosEmpleados);
        return redirect('empleados');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $empleado=Empleados::findorFail($id);
        return view('empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpleados=request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $empleado=Empleados::findorFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $datosEmpleados['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Empleados::where('id',"=",$id)->update($datosEmpleados);
        $empleado=Empleados::findorFail($id);
        return redirect('empleados');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado=Empleados::findorFail($id);
        if(Storage::delete('public/'.$empleado->Foto)){
            Empleados::destroy($id);
        }
        return redirect('empleados');
    }
}
