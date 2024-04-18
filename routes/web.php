<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/create-account', function () {
    return view('create-account');
})->name('create-account');

Route::get('/main', function () {
    return view('main');
})->name('main');