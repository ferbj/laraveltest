<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Employee;
//use PHPUnit\Framework\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\EmployeeService;
use App\Http\Controllers\EmployeesController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test if a user is not logged in
     */
    public function test_if_user_not_logged_in()
    {
        $returnValues = (new EmployeesController)->home();
        $this->assertEmpty($returnValues);

    }

    /**
     * Test check if the data type A is returning from service function.
     */
    public function test_get_employee_type_a_not_empty(){
        $employees = Employee::factory(200)->create([
            'joining_date' => now()->toDateString(),
        ]);
        $resp = (new EmployeeService)->getEmployeesTypeA($employees);
        $this->assertNotEmpty($resp);
    }

    /**
     * Test check if the data type B is returning from service function.
     */
    public function test_get_employee_type_b_not_empty(){
        $employees = Employee::factory(200)->create([
            'joining_date' => now()->toDateString(),
        ]);
        $resp = (new EmployeeService)->getEmployeesTypeB($employees);
        $this->assertNotEmpty($resp);
    }

    /**
     * Test check if the data type C is returning from service function.
     */
    public function test_get_employee_type_c_not_empty(){
        $employees = Employee::factory(200)->create([
            'joining_date' => now()->toDateString(),
        ]);
        $resp = (new EmployeeService)->getEmployeesTypeC($employees);
        $this->assertNotEmpty($resp);
    }
    /*
    * Test if a user is logged and getting data after logged
    */
    public function test_if_user_logged_and_get_data(){
        $user = User::factory()->create([
            'password'=> Hash::make('12345678')
        ]);
        //login user
        $resp = $this->post('login',[
            'email' => $user->email,
            'password' => '12345678'
        ]);
        //if logged check
        $resp->assertRedirect('/home');

        $employees = Employee::factory(200)->create([
            'joining_date' => now()->toDateString(),
        ]);
        $employesTypeA = (new EmployeeService)->getEmployeesTypeA($employees);
        $employesTypeB = (new EmployeeService)->getEmployeesTypeB($employees);
        $employesTypeC = (new EmployeeService)->getEmployeesTypeC($employees);
        $data=[
            'typeA' => $employesTypeA,
            'typeB' => $employesTypeB,
            'typeC' => $employesTypeC,
        ];
        //getting data from dashboard
        $resp = $this->get(route('home'));
        $this->assertEquals(array_keys($data),array_keys($resp['data']));

    }

    public function test_if_data_displayed_correctly(){
        $user = User::factory()->create([
            'password'=> Hash::make('12345678')
        ]);
        //login user
        $resp = $this->post('login',[
            'email' => $user->email,
            'password' => '12345678'
        ]);
        //if logged check
        $resp->assertRedirect('/home');

        $employees = Employee::factory(20)->create([
            'joining_date' => now()->toDateString(),
        ]);
        //calling methods to test
        $employesTypeA = (new EmployeeService)->getEmployeesTypeA($employees);
        $employesTypeB = (new EmployeeService)->getEmployeesTypeB($employees);
        $employesTypeC = (new EmployeeService)->getEmployeesTypeC($employees);

        $emptypedata = [];
        //get Employee from each type
        foreach($employesTypeA as $emptypA){
            $emptypedata['type_a'] = $emptypA['name'];
        }

        foreach($employesTypeB as $emptypB){
            $emptypedata['type_b'] = $emptypB['name'];
        }
        foreach($employesTypeC as $emptypC){
            $emptypedata['type_c'] = $emptypC['name'];
        }



        $resp = $this->get(route('home'));
        $this->assertTrue(collect($resp['data']['typeA'])->contains('name',$emptypedata['type_a']));
        $this->assertTrue(collect($resp['data']['typeB'])->contains('name',$emptypedata['type_b']));
        $this->assertTrue(collect($resp['data']['typeC'])->contains('name',$emptypedata['type_c']));

        $this->assertTrue(collect($employesTypeA)->contains('name',$emptypedata['type_a']));
        $this->assertTrue(collect($employesTypeB)->contains('name',$emptypedata['type_b']));
        $this->assertTrue(collect($employesTypeC)->contains('name',$emptypedata['type_c']));


    }


}
