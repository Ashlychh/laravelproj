<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <!-- Add your preferred CSS files here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> <!-- Custom Styles -->
</head>
<body>

    <div class="container-fluid">
        <!-- Header Section -->
        <div class="row bg-primary text-white py-3 mb-4">
            <div class="col text-center">
                <h1>Attendance Management System</h1>
                <p>Welcome to the Attendance Dashboard</p>
            </div>
        </div>

        <!-- Main Dashboard -->
        <div class="row">
            <!-- Left Sidebar (Optional) -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        Quick Links
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('students.index') }}">Students</a></li>
                            <li class="list-group-item"><a href="{{ route('attendance.index') }}">Attendance Records</a></li>
                            <li class="list-group-item"><a href="{{ route('reports.index') }}">Reports</a></li>
                            <li class="list-group-item"><a href="{{ route('settings.index') }}">Settings</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card text-white bg-info">
                            <div class="card-header">Total Students</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $totalStudents }}</h5>
                                <p class="card-text">The total number of students in the system.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-white bg-warning">
                            <div class="card-header">Total Attendance Records</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $totalAttendanceRecords }}</h5>
                                <p class="card-text">The total number of attendance records tracke
