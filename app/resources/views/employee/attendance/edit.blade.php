
@extends('layouts.view')

@section('content')
<div class="container">
    <h2>Edit Attendance</h2>

    <form action="{{ route('employee.attendance.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="employee_id">Employee ID</label>
            <input type="text" name="employee_id" id="employee_id" class="form-control" value="{{ old('employee_id', $attendance->employee_id) }}" required>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $attendance->date) }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="present" {{ $attendance->status == 'present' ? 'selected' : '' }}>Present</option>
                <option value="absent" {{ $attendance->status == 'absent' ? 'selected' : '' }}>Absent</option>
                <option value="leave" {{ $attendance->status == 'leave' ? 'selected' : '' }}>Leave</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Attendance</button>
    </form>
</div>
@endsection
