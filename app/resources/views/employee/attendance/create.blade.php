<!-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Employee Attendance</h2>
        <form method="post" action="{{ route('employee.attendance.store') }}">
            @csrf
            <div class="form-group">
                <label for="employee_id">Employee ID</label>
                <input type="number" name="employee_id" class="form-control" id="employee_id" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" id="date" required>
            </div>
            <div class="form-group">
                <label for="check_in">Check In</label>
                <input type="time" name="check_in" class="form-control" id="check_in" required>
            </div>
            <div class="form-group">
                <label for="check_out">Check Out</label>
                <input type="time" name="check_out" class="form-control" id="check_out" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Attendance</button>
        </form>
    </div>
@endsection -->


@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Device</h2>
        <!-- <form method="post" action="{{ route('devices.store') }}"> -->
            <form method="post" action="{{ route('employee.attendance.create') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="serialNum">Serial Number</label>
                <input type="text" name="serialNum" class="form-control" id="serialNum" placeholder="Serial Number">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" id="location" placeholder="Location">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection

