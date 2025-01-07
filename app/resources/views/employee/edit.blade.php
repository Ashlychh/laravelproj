@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Employee Attendance</h2>
        <form method="post" action="{{ route('absensi_sholat.update', $absensiSholat->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="time">Time</label>
                <input type="datetime-local" name="time" class="form-control" id="time" value="{{ $absensiSholat->time }}">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" id="date" value="{{ $absensiSholat->date }}">
            </div>
            <div class="form-group">
                <label for="attendance">Attendance</label>
                <input type="number" name="attendance" class="form-control" id="attendance" value="{{ $absensiSholat->attendance }}">
            </div>
            <div class="form-group">
                <label for="devices">Device</label>
                <input type="number" name="devices" class="form-control" id="devices" value="{{ $absensiSholat->devices }}">
            </div>
            <div class="form-group">
                <label for="employee">Employee NIS</label>
                <input type="text" name="employee" class="form-control" id="employee" value="{{ $absensiSholat->employee}}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
