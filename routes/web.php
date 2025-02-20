<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;



// static pages
Route::view('/','home.welcome');
Route::view('/register','home.register')->name('register.form');
Route::view('/login','home.login')->name('login.form');

// login and register , logout
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// dashboard page
Route::get('/dashboard',  [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::view('/profile','dashboard.profile')->name('profile');

Route::middleware(['auth'])->group(function () {
     Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
     Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
     Route::post('/profile/picture', [ProfileController::class, 'updatePicture'])->name('profile.update-picture');
 });
// questions routes
Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
// Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('/questions/{id}', [QuestionController::class, 'show'])->name('questions.show');
Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');
Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');

