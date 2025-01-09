<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Show the form to add attendance
    public function create()
    {
        $employees = Employee::all();  // Assuming you have an Employee model
        return view('attendance.add', compact('employees'));
    }

    // Store the attendance record in the database
    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id', // Ensure the employee exists
            'attendance_date' => 'required|date',
            'status' => 'required|in:Present,Absent,Leave', // Validate the status
        ]);

        // Create the attendance record
        Attendance::create($validatedData);

        // Redirect back with a success message
        return redirect()->route('attendance.create')->with('success', 'Attendance added successfully!');
    }
}
