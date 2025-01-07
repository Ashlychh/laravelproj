<?php 
namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function create()
    {
        return view('employee.attendance.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'employee_id' => 'required|exists:employees,id', // Make sure employee_id exists in employees table
            'date' => 'required|date',
            'check_in' => 'required|date_format:H:i',
            'check_out' => 'required|date_format:H:i|after:check_in', // Ensure check_out is after check_in
        ]);

        // Create a new attendance record
        Attendance::create([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        // Redirect or return response
        return redirect()->route('employee.attendance.index')->with('success', 'Attendance added successfully.');
    }
}
