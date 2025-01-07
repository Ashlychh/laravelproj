@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add employee Attendance</h2>
        <form method="post" action="{{ route('absensi_sholat.store') }}">
            @csrf
            <div class="form-group">
                <label for="time">Time</label>
                <input type="datetime-local" name="time" class="form-control" id="time">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" id="date">
            </div>
            <div class="form-group">
                <label for="">Check In</label>
                <input type="number" name="prayer_schedule_id" class="form-control" id="prayer_schedule_id">
            </div>
            <div class="form-group">
                <label for="id_devices">Check Out</label>
                <input type="number" name="id_devices" class="form-control" id="id_devices">
            </div>
            <div class="form-group">
                <label for="nis_santri">NIS Santri</label>
                <input type="text" name="nis_santri" class="form-control" id="nis_santri">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
