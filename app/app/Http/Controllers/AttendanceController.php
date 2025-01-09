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
        // Fetch data for the DataTable
        $attendances = Attendance::query();

        // Return DataTable response
        if (request()->ajax()) {
            return DataTables::of($attendances)
                ->addColumn('action', function($row) {
                    return '<a href="'.route('employee.attendance.edit', $row->id).'" class="btn btn-primary btn-sm">Edit</a> 
                            <form action="'.route('employee.attendance.destroy', $row->id).'" method="POST" style="display:inline;">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>';
                })
                ->rawColumns(['action'])  // Allow raw HTML in the action column
                ->make(true);
        }

        return view('employee.attendance.index'); // Return the Blade view
    }
    public function create()
    {
        return view('employee.attendance.add');
    }

    // Show form to create new attendance
   
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
        $attendances = Attendance::findOrFail($id);
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

        $attendances = Attendance::findOrFail($id);
        $attendances->update($request->all());

        return redirect()->route('employee.attendance.index')->with('success', 'Attendance updated successfully');
    }

    // Delete an attendance record
    public function destroy($id)
    {
        $attendances = Attendance::findOrFail($id);
        $attendances->delete();

        return redirect()->route('employee.attendance.index')->with('success', 'Attendance deleted successfully');
    }
}
