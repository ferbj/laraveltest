<?php
namespace App\Http\Services;

class EmployeeService{

    public static function getEmployeesTypeA($employees){
           return $employees->where('salary','<',60000);
    }

    public static function getEmployeesTypeB($employees){
           return $employees->where('salary','>',60000)->where('salary','<',100000);

    }

    public static function getEmployeesTypeC($employees){
           return $employees->where('salary','<',100000);
    }

}
