@extends('layouts.view')

@section('content')
    <div class="container">
        <h2>Edit Attendance</h2>
        <form method="POST" action="{{ route('{id}/update', $attendance->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="employee_id">Employee ID</label>
                <input type="number" name="employee_id" class="form-control" id="employee_id" value="{{ $attendance->employee_id }}" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" id="date" value="{{ $attendance->date }}" required>
            </div>
            <div class="form-group">
                <label for="check_in">Check In</label>
                <input type="time" name="check_in" class="form-control" id="check_in" value="{{ $attendance->check_in }}" required>
            </div>
            <div class="form-group">
                <label for="check_out">Check Out</label>
                <input type="time" name="check_out" class="form-control" id="check_out" value="{{ $attendance->check_out }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update Attendance</button>
        </form>
    </div>
@endsection
