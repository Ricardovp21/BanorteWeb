<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('index');
});

Route::get('/categorias', function () {
    return view('categorias');
});
