<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AttendanceController extends Controller
{
    // Show the form to add attendance
    public function create()
    {
        $employees = Employee::all();  // Assuming you have an Employee model
        return view('add/employee', compact('employee'));
    }

        // Show the list of attendance records
        public function index(Request $request)
        {
            // Retrieve attendance records, you can add pagination as well
            $attendances = Attendance::all();
            return view('employee.attendance.index', compact('attendances')); // Returns a view with the attendance list
        }
    
      
        // Store a new attendance record
        public function store(Request $request)
        {
            // Validate incoming request data
            $validator = Validator::make($request->all(), [
                'employee_id' => 'required|integer',
                'date' => 'required|date',
                'status' => 'required|string',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            // Create a new attendance record
            Attendance::create([
                'employee_id' => $request->employee_id,
                'date' => $request->date,
                'status' => $request->status,
            ]);
    
            // Redirect back with success message
            return redirect()->route('employee.attendance.index')->with('success', 'Attendance record created successfully.');
        }
    
        // Show form to edit an attendance record
        public function edit($id)
        {
            // Find the attendance record by ID
            $attendance = Attendance::findOrFail($id);
            return view('employee.attendance.edit', compact('attendance')); // Pass the attendance record to the view
        }
    
        // Update the specified attendance record
        public function update(Request $request, $id)
        {
            // Validate incoming request data
            $validator = Validator::make($request->all(), [
                'employee_id' => 'required|integer',
                'date' => 'required|date',
                'status' => 'required|string',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            // Find the attendance record and update it
            $attendance = Attendance::findOrFail($id);
            $attendance->update([
                'employee_id' => $request->employee_id,
                'date' => $request->date,
                'status' => $request->status,
            ]);
    
            // Redirect back with success message
            return redirect()->route('employee.attendance.index')->with('success', 'Attendance record updated successfully.');
        }
    
        // Delete the specified attendance record
        public function destroy($id)
        {
            // Find and delete the attendance record
            $attendance = Attendance::findOrFail($id);
            $attendance->delete();
    
            // Redirect back with success message
            return redirect()->route('employee.attendance.index')->with('success', 'Attendance record deleted successfully.');
        }
    }
    