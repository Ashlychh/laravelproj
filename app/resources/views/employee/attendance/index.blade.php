<!-- resources/views/employee/attendance/index.blade.php -->
@extends('layouts.view')

@section('content')
<div class="container">
    <h2>Attendance Records</h2>
    <a href="{{ route('employee.attendance.add') }}" class="btn btn-primary">Add Attendance</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Employee ID</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $attendance->employee_id }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->status }}</td>
                    <td>
                        <a href="{{ route('employee.attendance.edit', $attendance->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('destroy', $attendance->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
