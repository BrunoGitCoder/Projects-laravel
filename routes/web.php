<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

//Login
Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login']);

//Register
Route::get('/register', [AuthController::class,'showRegister'])->name('register');
Route::post('/register', [AuthController::class,'register']);

//Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Protected routes
Route::middleware('auth')->group(function() {
    //Root path
    Route::get('/', function() {
        return redirect()->route('projects.index');
    });
    
    //Projects CRUD
    Route::resource('projects', ProjectController::class);

    //Tasks CRUD
    Route::resource('tasks', TaskController::class);
});