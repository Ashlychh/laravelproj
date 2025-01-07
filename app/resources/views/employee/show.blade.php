@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Employee Attendance Details</h2>
        <p>Time: {{ $absensiSholat->time }}</p>
        <p>Date: {{ $absensiSholat->date }}</p>
        <p>Prayer Schedule: {{ $absensiSholat->attendance}}</p>
        <p>Device: {{ $absensiSholat->devices }}</p>
        <p>Employee NIS: {{ $absensiSholat->employee_nis }}</p>
        <a href="{{ route('absensi_sholat.edit', $absensiSholat->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('absensi_sholat.destroy', $absensiSholat->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this prayer attendance?')">Delete</button>
        </form>
    </div>
@endsection
