
@extends('layouts.view')

@section('content')
    <div class="container">
        <h2>Add Device</h2>
     
            <form method="post" action="{{ route('add/new') }}">
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

