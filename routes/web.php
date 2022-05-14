<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


//Add Controllers
use App\http\Controllers\HomeController;
use App\http\Controllers\RoleController;
use App\http\Controllers\UserController;
use App\http\Controllers\TaskController;


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
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group( [ 'middleware' => [ 'auth' ] ], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('tasks', TaskController::class);

});