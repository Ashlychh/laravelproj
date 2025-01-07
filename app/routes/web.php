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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    return view('employee.create');
})->name('employee.attendance.create');

Route::post('/create', function () {
    // Handle form submission
})->name('employee.attendance.create');

Route::get('/edit', function () {
    return view('employee.attendance.create');
})->name('employee.update');

Route::post('/edit', function () {
    // Handle form submission
})->name('employee.update');


use App\Http\Controllers\AttendanceController;

Route::get('employee/attendance/create', [AttendanceController::class, 'create'])->name('employee.attendance.create');
Route::post('employee/attendance', [AttendanceController::class, 'store'])->name('employee.attendance.store');
// Route::get('employee/attendance', [AttendanceController::class, 'show'])->name('employee.attendance.index');
// Route::post(uri: 'employee/attendance/index', [AttendanceController::class, 'show'])->name('employee.attendance.index');


Route::get('employee/attendance/index', function () {
    // Handle form submission
})->name('employee.attendance.index');


Route::post('employee/attendance/index', function () {
    // Handle form submission
})->name('employee.attendance.index');
