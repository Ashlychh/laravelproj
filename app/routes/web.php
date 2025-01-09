<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\IclockController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------|
| Web Routes                                                                |
|--------------------------------------------------------------------------|
| Here is where you can register web routes for your application.           |
| These routes are loaded by the RouteServiceProvider and all of them will  |
| be assigned to the "web" middleware group. Make something great!          |
|--------------------------------------------------------------------------|
*/
route::get('/dbconn',function (){
    return view("dbconn");
});
use App\Http\Controllers\SignupController;

Route::get('/signup', [SignupController::class, 'showForm'])->name('employee.signup');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');
Route::get('login', [SignupController::class, 'login'])->name('employee.login');  // Show login form
Route::post('login', [SignupController::class, 'login'])->name('employee.login');  // Show login form

// Route::post('logout', [AuthController::class, 'logout'])->name('logout');    // Handle logout (uncomment if you need it)



// Employee Attendance Routes
// Route::prefix('employee/attendance')->name('employee.attendance.')->group(function() {
    Route::get('/', [AttendanceController::class, 'index'])->name('index');      // List attendance records
    Route::get('create', [AttendanceController::class, 'create'])->name('create'); // Show form to create new attendance
    Route::post('/', [AttendanceController::class, 'store'])->name('store');     // Store new attendance
    Route::get('{id}/edit', [AttendanceController::class, 'edit'])->name('edit'); // Edit an attendance record
    Route::put('{id}', [AttendanceController::class, 'update'])->name('update');  // Update attendance record (uncomment if needed)
    Route::delete('{id}', [AttendanceController::class, 'destroy'])->name('destroy'); // Delete an attendance record (uncomment if needed)
// });




// Device Routes
Route::prefix('devices')->name('devices.')->group(function() {
    Route::get('/', [DeviceController::class, 'index'])->name('index');  // List devices
    Route::get('device-log', [DeviceController::class, 'deviceLog'])->name('deviceLog');  // View device logs
    Route::get('finger-log', [DeviceController::class, 'fingerLog'])->name('fingerLog');  // View finger logs
    Route::get('attendance', [DeviceController::class, 'attendance'])->name('attendance');  // View attendance data
});


// iClock Routes for Device Communication
Route::prefix('iclock')->name('iclock.')->group(function() {
    Route::get('cdata', [IclockController::class, 'handshake'])->name('handshake');  // Handshake with the device
    Route::post('cdata', [IclockController::class, 'receiveRecords'])->name('receiveRecords');  // Receive records from the device
    Route::get('test', [IclockController::class, 'test'])->name('test');  // Test connection
    Route::get('getrequest', [IclockController::class, 'getrequest'])->name('getrequest');  // Handle request from the device
});



// Welcome Route (Default Landing Page)
Route::get('/', function () {
    return view('welcome');
});

