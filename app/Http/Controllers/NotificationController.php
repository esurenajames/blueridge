<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification; // Assuming you have a Notification model
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // Show notifications
    public function index()
    {
        $notifications = Notification::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('notifications', compact('notifications'));
    }
}
