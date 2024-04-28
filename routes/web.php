<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;

Route::middleware(['auth', \App\Http\Middleware\CheckRoles::class . ':1'])->group(function () {
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

Route::get('/sample', function () {
    return view('/sample');
})->name('/sample');

Route::get('/main', function () {
    return view('main');
})->name('main');

});

Route::middleware('web')->group(function () {
    // Redirect authenticated users to the main page if they try to access forgot, verification, reset, or create-account routes
    Route::get('/forgot', function () {
        if (Auth::check()) {
            return redirect()->route('main');
        } else {
            return view('forgot-password');
        }
    })->name('forgot');

    Route::get('/verification', function () {
        if (Auth::check()) {
            return redirect()->route('main');
        } else {
            return view('verification-code');
        }
    })->name('verification');

    Route::get('/reset', function () {
        if (Auth::check()) {
            return redirect()->route('main');
        } else {
            return view('reset-password');
        }
    })->name('reset');

    Route::get('/create-account', function () {
        if (Auth::check()) {
            return redirect()->route('main');
        } else {
            return view('create-account');
        }
    })->name('create-account');

    Route::get('/', function () {
        if (Auth::check()) {
            return redirect()->route('main');
        } else {
            return view('login');
        }
    })->name('login');

    Route::post('/register', [RegistrationController::class, 'register'])->name('register');
    Route::post('/Login', [LoginController::class, 'login'])->name('Login'); // Changed to lowercase 'login'
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
}); 

