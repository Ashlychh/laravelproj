<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\IclockController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('signup', [AuthController::class, 'create'])->name('employee.signup');  // Show signup form
Route::post('signup', [AuthController::class, 'store'])->name('signup.store');     // Handle signup form submission

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');       // Show login form
Route::post('login', [AuthController::class, 'login'])->name('login.store');        // Handle login form submission


Route::prefix('employee/attendance')->name('employee.attendance.')->group(function() {
    Route::post('/', [AttendanceController::class, 'index'])->name('index');
    Route::get('create', [AttendanceController::class, 'create'])->name('create');
    Route::post('/', [AttendanceController::class, 'store'])->name('store');
    Route::get('{id}/edit', [AttendanceController::class, 'edit'])->name('edit');
    // Route::put('{id}', [AttendanceController::class, 'update'])->name('update');
    // Route::delete('{id}', [AttendanceController::class, 'destroy'])->name('destroy');
});


// Route::post('logout', [AuthController::class, 'logout'])->name('logout');           // Handle logout


//device

Route::get('device', [DeviceController::class,'Index'])->name('devices.index');
Route::get('devices-log', [DeviceController::class,'DeviceLog'])->name ('devices.DeviceLog');
Route::get('finger-log', [DeviceController::class, 'FingerLog'])->name('devices.FingerLog');
Route::get('attendance', [DeviceController::class, 'Attendance'])->name('devices.Attendance');


//leanne

Route::get('/', function () {
    return view('welcome');
});

// handshake
Route::get('/iclock/cdata', [iclockController::class, 'handshake']);

// request dari device
Route::post('/iclock/cdata', [iclockController::class, 'receiveRecords']);

Route::get('/iclock/test', [iclockController::class, 'test']);
Route::get('/iclock/getrequest', [iclockController::class, 'getrequest']);


// Route::post('/logIn', function () {
//     // Handle form submission
// })->name('employee.attendance.create');

// Route::get('/edit', function () {
//     return view('employee.attendance.create');
// })->name('employee.attendance.update');

// Route::post('/edit', function () {
//     // Handle form submission
// })->name('employee.attendance.update');


// use App\Http\Controllers\AttendanceController;

// Route::get('employee/attendance/create', [AttendanceController::class, 'create'])->name('employee.attendance.create');
// Route::post('employee/attendance', [AttendanceController::class, 'store'])->name('employee.attendance.store');
// // Route::get('employee/attendance', [AttendanceController::class, 'show'])->name('employee.attendance.index');
// // Route::post(uri: 'employee/attendance/index', [AttendanceController::class, 'show'])->name('employee.attendance.index');


// Route::get('employee/attendance/index', function () {
//     // Handle form submission
// })->name('employee.attendance.index');


// Route::post('employee/attendance/index', function () {
//     // Handle form submission
// })->name('employee.attendance.index');



