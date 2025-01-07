<?php 

// namespace App\Http\Controllers;

// use Illuminate\http\Request;
// use App\models\User;
// use Illuminate\Routing\ControllerDispatcher;

// class EmployeeAttendanceController extends Controllers{
//     public function create(){
//         return view("employee.create");
//     }
//     public function store(Request $Request){
//          User::create([
//             'employee_id'=> $request -> employee_id,
//             'date' => $request -> date,
//             'check_in' => $request -> check_in,
//             'check_out' => $request -> check_out,
//         ]);

//         return redirect()->route ("employee.create");
//     }
      
    
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;  // Correct namespace
use App\Models\User;          // Correct namespace for the User model
use Illuminate\Routing\Controller;

class EmployeeAttendanceController extends Controller // Use "Controller" here (singular)
{
    public function create(){
        return view("employee.create");
    }

    public function store(Request $request)  // Use consistent capitalization for $request
    {
        // Store the attendance record
        User::create([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        // Redirect back to the create view
        return redirect()->route("employee.create");
    }
}
