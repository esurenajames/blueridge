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

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/forms', function () {
    return view('forms');
})->name('forms');

Route::get('/quotation', function () {
    return view('quotation');
})->name('quotation');

Route::get('/view-all', function () {
    return view('view-all');
})->name('view-all');

Route::get('/forgot', function () {
    return view('forgot-password');
})->name('forgot');

Route::get('/verification', function () {
    return view('verification-code');
})->name('verification');

Route::get('/reset', function () {
    return view('reset-password');
})->name('reset');

Route::get('/notifications', function () {
    return view('notifications');
})->name('notifications');

Route::get('/summary', function () {
    return view('summary');
})->name('summary');

Route::get('/request', function () {
    return view('request');
})->name('request');

Route::get('/purchase-request', function () {
    return view('purchase-request');
})->name('purchase-request');


