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
})->name('employee.create');

Route::post('/create', function () {
    // Handle form submission
})->name('employee.create');

Route::get('/edit', function () {
    return view('employee.create');
})->name('employee.update');

Route::post('/edit', function () {
    // Handle form submission
})->name('employee.update');
