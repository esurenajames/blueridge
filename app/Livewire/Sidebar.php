<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class Sidebar extends Component
{
    public function isActiveRoute($route)
    {
        return Route::currentRouteName() === $route;
    }

    public function render()
    {
        return view('livewire.sidebar');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
