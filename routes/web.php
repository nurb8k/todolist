<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['guest']], function() {
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout.post');

    Route::get('/task-list', [TaskController::class, 'list'])->name('tasks.list');
    Route::post('/task-post', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('/task-update/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::post('/task-delete/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
