@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Employee Attendance Details</h2>
        <p>Time: {{ $employee->time }}</p>
        <p>Date: {{ $employee->date }}</p>
        <p>Check In: {{ $employee->check_in}}</p>
        <p>Check Out: {{ $employee->check_out }}</p>
        <p>Employee ID: {{ $employee->employee_id }}</p>
        <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('employee.destroy', $employee->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee attendance?')">Delete</button>
        </form>
    </div>
@endsection
