<?php

use App\Http\Controllers\BulletinController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
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

//Route::resource('lessons', LessonController::class);

/* User */

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'authentificate'])->name('user.authentificate')->middleware('guest');

Route::get('logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('register', [UserController::class, 'create'])->name('user.create');
Route::post('register', [UserController::class, 'store'])->name('user.store');

/* Home */
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

/* Modules CRUD routes with security */
Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create')->middleware('auth');
Route::post('/modules/store', [ModuleController::class, 'store'])->name('modules.store')->middleware('auth');

Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index')->middleware('auth');
Route::get('/modules/show/{id}', [ModuleController::class, 'show'])->name('modules.show')->middleware('auth');

Route::get('/modules/edit/{id}', [ModuleController::class, 'edit'])->name('modules.edit')->middleware('auth');
Route::put('/modules/update/{id}', [ModuleController::class, 'update'])->name('modules.update')->middleware('auth');

Route::delete('/modules/destroy/{id}', [ModuleController::class, 'destroy'])->name('modules.destroy')->middleware('auth');

/* Courses CRUD routes with security */
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create')->middleware('auth');
Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store')->middleware('auth');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index')->middleware('auth');
Route::get('/courses/show/{id}', [CourseController::class, 'show'])->name('courses.show')->middleware('auth');

Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('courses.edit')->middleware('auth');
Route::put('/courses/update/{id}', [CourseController::class, 'update'])->name('courses.update')->middleware('auth');

Route::delete('/courses/destroy/{id}', [CourseController::class, 'destroy'])->name('courses.destroy')->middleware('auth');

/* Grades CRUD routes with security */
Route::get('/grades/create', [GradeController::class, 'create'])->name('grades.create')->middleware('auth');
Route::post('/grades/store', [GradeController::class, 'store'])->name('grades.store')->middleware('auth');

Route::get('/grades', [GradeController::class, 'index'])->name('grades.index')->middleware('auth');
Route::get('/grades/show/{id}', [GradeController::class, 'show'])->name('grades.show')->middleware('auth');

Route::get('/grades/edit/{id}', [GradeController::class, 'edit'])->name('grades.edit')->middleware('auth');
Route::put('/grades/update/{id}', [GradeController::class, 'update'])->name('grades.update')->middleware('auth');

Route::delete('/grades/destroy/{id}', [GradeController::class, 'destroy'])->name('grades.destroy')->middleware('auth');

/* Lessons CRUD routes with security */
Route::get('/lessons/create', [LessonController::class, 'create'])->name('lessons.create')->middleware('auth');
Route::post('/lessons/store', [LessonController::class, 'store'])->name('lessons.store')->middleware('auth');

Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index')->middleware('auth');
Route::get('/lessons/show/{id}', [LessonController::class, 'show'])->name('lessons.show')->middleware('auth');

Route::get('/lessons/edit/{id}', [LessonController::class, 'edit'])->name('lessons.edit')->middleware('auth');
Route::put('/lessons/update/{id}', [LessonController::class, 'update'])->name('lessons.update')->middleware('auth');

Route::delete('/lessons/destroy/{id}', [LessonController::class, 'destroy'])->name('lessons.destroy')->middleware('auth');

/* Bulletin */
Route::get('bulletin', [BulletinController::class, 'index'])->name('bulletin.index')->middleware('auth');
