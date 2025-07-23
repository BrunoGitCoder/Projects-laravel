<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Login
Route::get('/login', [UserController::class,'showLogin'])->name('login');
Route::post('/login', [UserController::class,'login']);

//Register
Route::get('/register', [UserController::class,'showRegister'])->name('register');
Route::post('/register', [UserController::class,'register']);

//Logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//Protected routes
Route::middleware('auth')->group(function() {
    //Root path
    Route::get('/', function() {
        return redirect()->route('projects.index');
    });
    
    //Projects
    Route::resource('projects', ProjectController::class);

    //Tasks
    Route::resource('tasks', TaskController::class);
});