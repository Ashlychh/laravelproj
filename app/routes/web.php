<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\IclockController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------|
| Web Routes                                                                |
|--------------------------------------------------------------------------|
| Here is where you can register web routes for your application.           |
| These routes are loaded by the RouteServiceProvider and all of them will  |
| be assigned to the "web" middleware group. Make something great!          |
|--------------------------------------------------------------------------|
*/

// Welcome Route (Default Landing Page)
Route::get('/', function () {
    return view('welcome');
}); 

route::get('/dbconn',function (){
    return view("dbconn");
});

// Signup Routes
Route::get('/signup', [SignupController::class, 'showForm'])->name('employee.signup');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');

// Route::post('login', [LoginController::class, 'showLoginForm'])-> name('employee.login');


Route::get('employee/login', [LoginController::class, 'showLoginForm'])->name('employee.login');
Route::post('employee/login', [LoginController::class, 'login'])->name('login.submit');

// Employee Attendance Routes

Route::post('/', [AttendanceController::class, 'index'])->name('index');  // List attendance records
Route::get('create', [AttendanceController::class, 'create'])->name('create');  // Show form to create new attendance
Route::post('/', [AttendanceController::class, 'store'])->name('store');  // Store new attendance
Route::get('{id}/edit', [AttendanceController::class, 'edit'])->name('edit');  // Edit an attendance record
Route::put('{id}', [AttendanceController::class, 'update'])->name('update');  // Update attendance record
Route::delete('{id}', [AttendanceController::class, 'destroy'])->name('destroy');  // Delete an attendance record

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


