<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Rutas de registro
// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);

// // Rutas de inicio de sesión
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);

// // Ruta para cerrar sesión
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OnboardingController;
Auth::routes();

// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\ContactController;
// use App\Http\Controllers\OnboardingController;

// Ruta de bienvenida
Route::get('/', [HomeController::class, 'index'])->name('home');

// Autenticación

// // Rutas protegidas por autenticación
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
//     Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
//     Route::get('/onboarding', [OnboardingController::class, 'show'])->name('onboarding.show');
//     Route::post('/onboarding', [OnboardingController::class, 'store'])->name('onboarding.store');
// });

// Ruta de inicio
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas de autenticación (registro e inicio de sesión)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

    // Rutas de contactos
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

    // Rutas de onboarding
    Route::get('/onboarding', [OnboardingController::class, 'show'])->name('onboarding.show');
    Route::post('/onboarding', [OnboardingController::class, 'store'])->name('onboarding.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
