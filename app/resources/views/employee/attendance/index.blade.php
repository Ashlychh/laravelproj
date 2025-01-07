@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Employee Attendance List</h2>

        <!-- Flash message for success -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Attendance Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employee ID</th>
                    <th>Date</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $attendance->employee_id }}</td>
                        <td>{{ $attendance->date }}</td>
                        <td>{{ $attendance->check_in }}</td>
                        <td>{{ $attendance->check_out }}</td>
                        <td>
                            <a href="{{ route('employee.attendance.edit', $attendance->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('employee.attendance.destroy', $attendance->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Link to Add Attendance -->
        <a href="{{ route('employee.attendance.create') }}" class="btn btn-primary mt-3">Add Attendance</a>
    </div>
@endsection
