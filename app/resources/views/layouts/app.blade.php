<!-- resources/views/attendance/add.blade.php -->
@extends('layouts.app') <!-- Extend your main layout -->

@section('content')
<div class="container">
    <h2>Add Attendance</h2>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="employee_id">Employee:</label>
            <select name="employee_id" id="employee_id" class="form-control" required>
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
            @error('employee_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="attendance_date">Date:</label>
            <input type="date" name="attendance_date" id="attendance_date" class="form-control" value="{{ old('attendance_date', \Carbon\Carbon::today()->toDateString()) }}" required>
            @error('attendance_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Present" {{ old('status') == 'Present' ? 'selected' : '' }}>Present</option>
                <option value="Absent" {{ old('status') == 'Absent' ? 'selected' : '' }}>Absent</option>
                <option value="Leave" {{ old('status') == 'Leave' ? 'selected' : '' }}>Leave</option>
            </select>
            @error('status')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Attendance</button>
    </form>
</div>
@endsection
