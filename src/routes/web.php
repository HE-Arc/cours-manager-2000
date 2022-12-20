<?php

use App\Http\Controllers\BulletinController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModuleController;
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

Route::get('/', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [UserController::class, 'authentificate'])->name('user.authentificate')->middleware('guest');

Route::get('logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('register', [UserController::class, 'create'])->name('user.create')->middleware('guest');
Route::post('register', [UserController::class, 'store'])->name('user.store')->middleware('guest');

Route::get('timetable', [UserController::class, 'timetable'])->name('timetable')->middleware('auth')->middleware('student');

/* Home */
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

/* Modules CRUD routes with security */
Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create')->middleware('auth')->middleware('secretary');
Route::post('/modules/store', [ModuleController::class, 'store'])->name('modules.store')->middleware('auth')->middleware('secretary');

Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index')->middleware('auth');
Route::get('/modules/show/{id}', [ModuleController::class, 'show'])->name('modules.show')->middleware('auth');

Route::get('/modules/edit/{id}', [ModuleController::class, 'edit'])->name('modules.edit')->middleware('auth')->middleware('secretary');
Route::put('/modules/update/{id}', [ModuleController::class, 'update'])->name('modules.update')->middleware('auth')->middleware('secretary');

Route::delete('/modules/destroy/{id}', [ModuleController::class, 'destroy'])->name('modules.destroy')->middleware('auth')->middleware('secretary');

Route::get('/modules/subscription', [ModuleController::class, 'subscription'])->name('modules.subscription')->middleware('auth')->middleware('student');
Route::post('/modules/subscribe/{id}', [ModuleController::class, 'subscribe'])->name('modules.subscribe')->middleware('auth')->middleware('student');
Route::post('/modules/unsubscribe/{id}', [ModuleController::class, 'unsubscribe'])->name('modules.unsubscribe')->middleware('auth')->middleware('student');

/* Courses CRUD routes with security */
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create')->middleware('auth')->middleware('secretary');
Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store')->middleware('auth')->middleware('secretary');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index')->middleware('auth')->middleware('secretary');
Route::get('/courses/show/{id}', [CourseController::class, 'show'])->name('courses.show')->middleware('auth');

Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('courses.edit')->middleware('auth')->middleware('secretary');
Route::put('/courses/update/{id}', [CourseController::class, 'update'])->name('courses.update')->middleware('auth')->middleware('secretary');

Route::delete('/courses/destroy/{id}', [CourseController::class, 'destroy'])->name('courses.destroy')->middleware('auth')->middleware('secretary');

/* Grades CRUD routes with security */
Route::get('/grades/create', [GradeController::class, 'create'])->name('grades.create')->middleware('auth')->middleware('student');
Route::post('/grades/store', [GradeController::class, 'store'])->name('grades.store')->middleware('auth')->middleware('student');

Route::get('/grades', [GradeController::class, 'index'])->name('grades.index')->middleware('auth')->middleware('student');
Route::get('/grades/show/{id}', [GradeController::class, 'show'])->name('grades.show')->middleware('auth')->middleware('student');

Route::get('/grades/edit/{id}', [GradeController::class, 'edit'])->name('grades.edit')->middleware('auth')->middleware('student');
Route::put('/grades/update/{id}', [GradeController::class, 'update'])->name('grades.update')->middleware('auth')->middleware('student');

Route::delete('/grades/destroy/{id}', [GradeController::class, 'destroy'])->name('grades.destroy')->middleware('auth')->middleware('student');

/* Lessons CRUD routes with security */
Route::get('/lessons/create', [LessonController::class, 'create'])->name('lessons.create')->middleware('auth')->middleware('secretary');
Route::post('/lessons/store', [LessonController::class, 'store'])->name('lessons.store')->middleware('auth')->middleware('secretary');

Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index')->middleware('auth')->middleware('secretary');
Route::get('/lessons/show/{id}', [LessonController::class, 'show'])->name('lessons.show')->middleware('auth')->middleware('secretary');

Route::get('/lessons/edit/{id}', [LessonController::class, 'edit'])->name('lessons.edit')->middleware('auth')->middleware('secretary');
Route::put('/lessons/update/{id}', [LessonController::class, 'update'])->name('lessons.update')->middleware('auth')->middleware('secretary');

Route::delete('/lessons/destroy/{id}', [LessonController::class, 'destroy'])->name('lessons.destroy')->middleware('auth')->middleware('secretary');

/* Bulletin */
Route::get('bulletin', [BulletinController::class, 'index'])->name('bulletin.index')->middleware('auth')->middleware('student');
