<?php

use Illuminate\Support\Facades\Route;

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

// use App\Http\Controllers\DeviceController;
// use App\Http\Controllers\IclockController;

// Route::get('device', [DeviceController::class,'Index'])->name('devices.index');
// Route::get('devices-log', [DeviceController::class,'DeviceLog'])->name ('devices.DeviceLog');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/logIn', function () {
    return view('employee.login');
})->name('employee.login');

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


use App\Http\Controllers\AttendanceController;

Route::prefix('employee/attendance')->name('employee.attendance.')->group(function() {
    Route::post('/', [AttendanceController::class, 'index'])->name('index');
    Route::get('create', [AttendanceController::class, 'create'])->name('create');
    Route::post('/', [AttendanceController::class, 'store'])->name('store');
    Route::get('{id}/edit', [AttendanceController::class, 'edit'])->name('edit');
    // Route::put('{id}', [AttendanceController::class, 'update'])->name('update');
    // Route::delete('{id}', [AttendanceController::class, 'destroy'])->name('destroy');
});

