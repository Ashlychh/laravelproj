@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Employee Attendance List</h2>
        {{-- <a href="{{ route('absensi_sholat.create') }}" class="btn btn-primary mb-3">Add Prayer Attendance</a> --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Employee NIS</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">Attendance</th>
                    <th scope="col">Device</th>
                    {{-- <th scope="col">Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($absensiSholat as $attendance)
                <tr>
                    <td>{{ $attendance->employee_nis }}</td>
                    <td>{{ $attendance->time }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->attendance}}</td>
                    <td>{{ $attendance->devices}}</td>
                    {{-- <td>
                        <a href="{{ route('absensi_sholat.show', $attendance->id) }}" class="btn btn-info btn-sm">Details</a>
                        <a href="{{ route('absensi_sholat.edit', $attendance->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('absensi_sholat.destroy', $attendance->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this prayer attendance?')">Delete</button>
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
