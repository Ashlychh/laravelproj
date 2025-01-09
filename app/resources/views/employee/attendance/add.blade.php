
@extends('layouts.view')

@section('content')
<div class="container">
    <h2>Create New Attendance</h2>

    <form action="{{ route('employee.attendance.index') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="employee_id">Employee ID</label>
            <input type="text" name="employee_id" id="employee_id" class="form-control" value="{{ old('employee_id') }}" required>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="present">Present</option>
                <option value="absent">Absent</option>
                <option value="leave">Leave</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save Attendance</button>
    </form>
</div>
@endsection
