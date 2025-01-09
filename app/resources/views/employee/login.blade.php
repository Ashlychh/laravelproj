<form method="POST" action="{{ route('login.submit') }}">
    @csrf

    <!-- Email Input -->
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <!-- Password Input -->
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <!-- Remember Me Checkbox -->
    <div>
        <label>
            <input type="checkbox" name="remember"> Remember me
        </label>
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit">Login</button>
    </div>
</form>
