<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\TransferenciaController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/categorias', function () {    return view('categorias');});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/informacion', [InformacionController::class, 'show'])->name('informacion');


    
Route::middleware('auth')->group(function () {
    Route::get('/transferir', [TransferenciaController::class, 'showForm'])->name('transferir.form');
    Route::post('/transferir', [TransferenciaController::class, 'transferir'])->name('transferir');
});



// Rutas de autenticación (registro e inicio de sesión)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

    Route::get('/onboarding', [OnboardingController::class, 'show'])->name('onboarding.show');
    Route::post('/onboarding', [OnboardingController::class, 'store'])->name('onboarding.store');
});

Auth::routes();