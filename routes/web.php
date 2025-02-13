<?php

use App\Http\Controllers\TutorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Home route
Route::get('/', [PostingController::class, 'applyFilters'])->name('postings.index'); 
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Register route
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Profile routes
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

// Posting routes
Route::get('/postings', [PostingController::class, 'applyFilters'])->name('postings.index'); // List all postings
Route::get('/postings/{id}', [PostingController::class, 'userIndex'])->name('postings.user'); // View a single posting
Route::get('/postings', [PostingController::class, 'create'])->name('postings.create'); // Show form to create a new posting
Route::post('/postings', [PostingController::class, 'store'])->name('postings.store'); // Store a new posting
Route::get('/postings/{id}/edit', [PostingController::class, 'edit'])->name('postings.edit'); // Show form to edit a posting
Route::put('/postings/{id}', [PostingController::class, 'update'])->name('postings.update'); // Update a posting
Route::delete('/postings/{id}', [PostingController::class, 'destroy'])->name('postings.destroy'); // Delete a posting

// Tutor route
Route::get('/tutor/{id}', [TutorController::class, 'show'])->name('tutor.show');
Route::put('/tutor/{tutor}', [TutorController::class, 'update'])->name('tutor.update');
Route::post('/profile/{user}/update', [TutorController::class, 'update'])->name('profile.update');

// Authentication routes
Auth::routes();

//Custom main page route
Route::get('/main_page', function () {
    return view('home');
})->name('main_page');

// Login route
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Add a middleware-protected route for the dashboard
//Route::get('/dashboard', [LoginController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/dashboard', function () {    
    return view('layouts.dashboard');})->name('dashboard');

// Logout route
Route::post('/logout', function() {
    Auth::logout();
    return redirect('/');
})->name('logout');


