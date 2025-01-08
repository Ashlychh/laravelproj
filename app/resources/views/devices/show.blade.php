@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Device Details</h2>
        <p>Name: {{ $device->nama }}</p>
        <p>Serial Number: {{ $device->no_sn }}</p>
        <p>Location: {{ $device->lokasi }}</p>
        <p>Online: {{ $device->online }}</p>
        <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('devices.destroy', $device->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this device?')">Delete</button>
        </form>
    </div>
@endsection
