<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/', [StudentController::class, 'index'])->name('home');

Route::resource('students', StudentController::class);


// Route::get('/', function () {
//     return view('welcome');
// });
