<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS (You can also use a CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS (Optional) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"> Attendance</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employee.attendance.create') }}">Add Attendance</a>
                    </li>
                    <!-- Add more links as needed -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        @yield('content')  <!-- This is where content from child views will be inserted -->
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3 mt-5">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} Attendance System</p>
        </div>
    </footer>

    <!-- Bootstrap JS (You can also use a CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
