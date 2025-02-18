<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;


Route::view('/','welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

// questions routes

// Display all clients
Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');

// Show form to create a new client
Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');

// Store a new client
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');

// Show a single client
Route::get('/questions/{id}', [QuestionController::class, 'show'])->name('questions.show');

// Show edit form
Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');

// Update client data
Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');

// Delete client
Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');


// authentification stuff
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
