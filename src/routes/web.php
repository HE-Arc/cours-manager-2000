<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [UserController::class, 'login'])->name('user.login');

/* Modules */
Route::resource('modules', ModuleController::class);

/* Modules */
Route::resource('courses', CourseController::class);

/* Grades */
Route::resource('grades', GradeController::class);

/* User */
Route::get('login', [UserController::class, 'login'])->name('user.login');
Route::post('login', [UserController::class, 'authentificate'])->name('user.authentificate');

Route::get('register', [UserController::class, 'create'])->name('user.create');
Route::post('register', [UserController::class, 'store'])->name('user.store');
