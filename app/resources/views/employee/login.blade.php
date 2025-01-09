<form method="POST" action="{{ route('login.submit') }}">
   
@extends('layouts.app') <!-- You can use your main layout file -->

@section('content')
    @csrf
<h1> LOG IN YOUR ACCOUNT</h1>
    <!-- Email Input -->
   
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control" required>
        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
    </div>


    <button type="submit" class="btn btn-primary">Log In</button>


  
</form>
</div>
</form>
@endsection