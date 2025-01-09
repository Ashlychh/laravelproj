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
    <style>
        
        body {
            background-color: #f8f9fa;
            color: #333;
           
        }
        
        .navbar {
            background-color: #534666; 
         
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .navbar-toggler-icon {
            background-color: #534666;
        }

        .navbar-nav .nav-link:hover {
            color: #f8f9fa !important;
            background-color: #534666;
        }

        .footer {
            background-color: #534666;
            color: white;
        }

        .footer p {
            margin: 0;
        }

        .container {
            margin-top: 50px;
        }

        /* Custom Button Color */
        .btn-primary {
            background-color: #138086;
            ;
            border-color: #138086;
            ;
        }

        .btn-primary:hover {
            background-color:#138086;
            border-color: #138086;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">


            <a class="navbar-brand" >Attendance</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                   
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
    <footer class="footer py-3 mt-5">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} Attendance System</p>
        </div>
    </footer>

    <!-- Bootstrap JS (You can also use a CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
