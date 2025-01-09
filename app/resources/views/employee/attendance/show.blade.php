@extends('layouts.view')

@section('content')
    <div class="container">
        <h2>Employee Attendance Details</h2>
        <p>Time: {{ $employee->time }}</p>
        <p>Date: {{ $employee->date }}</p>
        <p>Employee Id: {{ $employee->employee_id }}</p>
        <p>Check In:{{ $employee->check_in }}</p>
        <p>Chech Out: {{ $employee->chech_out }}</p>
        <a href="{{ route('{id}/edit', $employee->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('{id}/delete', $employee->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee record?')">Delete</button>
        </form>
    </div>
@endsection
