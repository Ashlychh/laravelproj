<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Display the list of attendances
    public function index()
    {
        // Retrieve all attendance records
        $attendances = Attendance::all();
        
        // Return the view with attendances
        return view('employee.attendance.index', compact('attendances'));
    }

    // Show the form for creating new attendance
    public function create()
    {
        return view('employee.attendance.create');
    }

    // Store a new attendance record
    public function store(Request $request)
    {
        // Validate and store the attendance
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'check_in' => 'required|date_format:H:i',
            'check_out' => 'required|date_format:H:i|after:check_in',
        ]);

        Attendance::create([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        return redirect()->route('employee.attendance.index')->with('success', 'Attendance added successfully.');
    }

    // Show the form for editing the attendance record
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('employee.attendance.edit', compact('attendance'));
    }

    // Update an attendance record
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'check_in' => 'required|date_format:H:i',
            'check_out' => 'required|date_format:H:i|after:check_in',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        return redirect()->route('employee.attendance.index')->with('success', 'Attendance updated successfully.');
    }

    // Delete an attendance record
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('employee.attendance.index')->with('success', 'Attendance deleted successfully.');
    }
}
