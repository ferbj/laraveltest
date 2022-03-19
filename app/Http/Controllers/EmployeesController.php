<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Services\EmployeeService;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('index');
    }

    public function home(){
        try {

                $data = [];
            if(auth()->check()){
            $employees = Employee::get();
                if(empty($employees)){
                    return [];
                }else{
                //employees with salary less than 60 k. Type A
                $employeeTypeA = EmployeeService::getEmployeesTypeA($employees);
                //employees with salary less than 80 k. and less than 100k.  Type B
                $employeeTypeB = EmployeeService::getEmployeesTypeB($employees);
                //employees with salary less than 80 k. and less than 100k.  Type C
                $employeeTypeC = EmployeeService::getEmployeesTypeC($employees);
                $data = ['typeA'=> $employeeTypeA,'typeB'=>$employeeTypeB,'typeC'=>$employeeTypeC];

            }
            return view('home')->with('data',$data);
            }

        } catch (Exception $e) {

        }

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
