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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group( [ 'middleware' => [ 'auth' ] ], function() {
    Route::resource('roles', RoleController::class);
    // Route::resource('users', UserController::class);
    Route::resource('tasks', TaskController::class);
    Route::post('tasks/user', [TaskController::class, 'tasksUser']);

    Route::get('users/datatable', [UserController::class, 'datatable']);
    Route::get('users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('users/show/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('users/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');


});