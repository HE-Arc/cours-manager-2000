<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

/* Modules */

Route::resource('modules', ModuleController::class);

// Route::get('/', [ModuleController::class, 'index'])->name('module.index');
// Route::get('/', [ModuleController::class, 'modules'])->name('module.create');
// Route::get('/', [ModuleController::class, 'modules'])->name('module.edit');
// Route::get('/', [ModuleController::class, 'modules'])->name('module.show');
