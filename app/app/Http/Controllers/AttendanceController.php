<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AttendanceController extends Controller
{
    // List attendance records
    public function index()
    {
        $attendances = Attendance::all();
        return view('employee.attendance.index', compact('attendances'));
    }

    // Show form to create new attendance
    public function create()
    {
        return view('employee.attendance.add');
    }

    // Store new attendance
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'date' => 'required|date',
            'status' => 'required|string',
        ]);

        Attendance::create([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'status' => $request->status,
        ]);

        return redirect()->route('employee.attendance.index')->with('success', 'Attendance added successfully');
    }

    // Edit attendance record
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('employee.attendance.edit', compact('attendance'));
    }

    // Update attendance record
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required',
            'date' => 'required|date',
            'status' => 'required|string',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('employee.attendance.index')->with('success', 'Attendance updated successfully');
    }

    // Delete an attendance record
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('employee.attendance.index')->with('success', 'Attendance deleted successfully');
    }
}
