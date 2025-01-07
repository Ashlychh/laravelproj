    <!-- @extends('layouts.app')

    @section('content') -->
    

    <div class="container">
        <h2>Add Employee Attendance</h2>
        <form method="post" action="{{ route('employee.create') }}">
            @csrf
            <div class="form-group">
                <label for="employee_id">Employee ID</label>
                <input type="number" name="employee_id" class="form-control" id="employee_id">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" id="date">
            </div>
            <div class="form-group">
                <label for="check_in">Check In</label>
                <input type="time" name="check_in" class="form-control" id="check_in">
            </div>
            <div class="form-group">
                <label for="check_out">Check Out</label>
                <input type="time" name="check_out" class="form-control" id="check_out">
            </div>
            <button type="submit" class="btn btn-primary">Save Attendance</button>
        </form>
    </div>