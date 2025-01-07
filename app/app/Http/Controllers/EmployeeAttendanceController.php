<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;  // Corrected the namespace (lowercase 'http')
use App\Models\User;          // Fixed the case of 'Models' (should be capital 'M')
use Illuminate\Routing\Controller; // Corrected the base controller class

class EmployeeAttendanceController extends Controller { // Corrected "Controllers" to "Controller"
    
    public function create(){
        return view("employee.create");
    }

    public function store(Request $request){ // Use lowercase 'request' to match the method parameter
        User::create([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        return redirect()->route("employee.create");
    }

    public function show(){
        return view("employee.show");
    }

    public function update(){
        return view("employee.edit");
    }
}
