@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Device</h2>
        <form method="post" action="{{ route('devices.update', $device->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $device->name }}">
            </div>
            <div class="form-group">
                <label for="serialnum">Serial Number</label>
                <input type="text" name="serialnum" class="form-control" id="serialnum" value="{{ $device->serialnum }}">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" id="location" value="{{ $device->location }}">
            </div>
            <div class="form-group">
                <label for="online">Online</label>
                <input type="text" name="online" class="form-control" id="online" value="{{ $device->online }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
