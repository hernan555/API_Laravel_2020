<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seeEmployee=Employee::all();
        if($seeEmployee->isEmpty()){
            print_r('No hay Empleados Cargados');}
        else{
            echo json_encode($seeEmployee);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "Hello Store\n";
        $newEmployee=new Employee();
        $newEmployee->nombre=$request->nombre;
        $newEmployee->puesto=$request->puesto;
        $newEmployee->descripcion=$request->descripcion;
        $newEmployee->sueldo=$request->sueldo;
        $newEmployee->save();
        echo json_encode($newEmployee);
        //print_r($request->all());
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $Employee_id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request,$Employee_id)
    {
        $updEmployee=Employee::findOrFail($Employee_id);
        $updEmployee->nombre=$request->nombre;
        $updEmployee->puesto=$request->puesto;
        $updEmployee->descripcion=$request->descripcion;
        $updEmployee->sueldo=$request->sueldo;
        $updEmployee->save();
        echo json_encode($updEmployee);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $Employee_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Employee_id)
    {
        $delete_Employee=Employee::findOrFail($Employee_id);
        $delete_Employee->delete();
    }
}
