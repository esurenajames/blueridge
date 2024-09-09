<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\ProfileSettings;
use App\Http\Controllers\ExpenseTableController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RequestTableController;
use App\Http\Controllers\RequestDetailsController;

Route::middleware(['auth', \App\Http\Middleware\CheckRoles::class . ':1'])->group(function () {

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/', function () {
    return view('main');
})->name('');

Route::get('/forms', function () {
    return view('forms');
})->name('forms');

Route::get('/quotation', function () {
    return view('quotation');
})->name('quotation');

Route::get('/quotation-approval', function () {
    return view('quotation-approval');
})->name('quotation-approval');

Route::get('/view-all', function () {
    return view('view-all');
})->name('view-all');

Route::get('/decline', function () {
    return view('decline');
})->name('decline');

Route::get('/details', function () {
    return view('details');
})->name('details');

Route::get('/details-3', function () {
    return view('details-3');
})->name('details-3');

Route::get('/details-4', function () {
    return view('details-4');
})->name('details-4');

Route::get('/details-5', function () {
    return view('details-5');
})->name('details-5');

Route::get('/notifications', function () {
    return view('notifications');
})->name('notifications');

Route::get('/summary', function () {
    return view('summary');
})->name('summary');

Route::get('/request', function () {
    return view('request');
})->name('request');

Route::get('/request-table', function () {
    return view('request-table');
})->name('request-table');

Route::get('/request-table', [RequestTableController::class, 'index'])->name('request-table');
Route::get('/requests', [RequestTableController::class, 'index'])->name('requests.index');
Route::get('/api/requests/{id}', [RequestTableController::class, 'getRequestDetails']);
Route::post('/update-request', [RequestTableController::class, 'updateRequest']);
Route::delete('/requests/{id}', [RequestTableController::class, 'deleteRequest'])->name('requests.delete');




Route::get('/request-approval', function () {
    return view('request-approval');
})->name('request-approval');

Route::get('/purchase-request', function () {
    return view('purchase-request');
})->name('purchase-request');

Route::get('/purchase-order', function () {
    return view('purchase-order');
})->name('purchase-order');

Route::get('/expense-table', function () {
    return view('expense-table');
})->name('expense-table');

Route::get('/expense-table', [ExpenseTableController::class, 'index'])->name('expense-table');
Route::get('/expenses', [ExpenseTableController::class, 'index'])->name('expense.index');
Route::put('/requests/{id}', [RequestTableController::class, 'update'])->name('requests.update');

Route::get('/approval-management', function () {
    return view('/approval-management');
})->name('/approval-management');

Route::get('/sample', function () {
    return view('sample');
})->name('sample');

Route::get('/main', function () {
    return view('main');
})->name('main');

Route::get('/main-secretary', function () {
    return view('main-secretary');
})->name('main-secretary');

Route::get('/main-kapitan', function () {
    return view('main-kapitan');
})->name('main-kapitan');

Route::post('/submit-request', [RequestController::class, 'submit'])->name('request.submit');
Route::get('/view-all', [RequestController::class, 'viewAll'])->name('view-all');
Route::get('/details-2/{id}', [RequestController::class, 'showDetails'])->name('details-2');

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

    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect()->route('main');
        } else {
            return view('login');
        }
    })->name('login');

    Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::post('/update-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/settings', [ProfileController::class, 'edit'])->name('settings');
    Route::post('/register', [RegistrationController::class, 'register'])->name('register');
    Route::post('/Login', [LoginController::class, 'login'])->name('Login'); // Changed to lowercase 'login'
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
}); 



