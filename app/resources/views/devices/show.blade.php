@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Device Details</h2>
        <p>Name: {{ $device->name }}</p>
        <p>Serial Number: {{ $device->serialNum }}</p>
        <p>Location: {{ $device->location }}</p>
        <p>Online: {{ $device->online }}</p>
        <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('devices.destroy', $device->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this device?')">Delete</button>
        </form>
    </div>
@endsection
