<?php

namespace App\Livewire;

use App\Models\Notification;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $user;
    public $notifications = [];
    public $unreadCount = 0;
    public $dropdownVisible = false; 

    public function mount()
    {
        $this->user = Auth::user();
        $this->getNotifications();
        $this->unreadCount = $this->countUnreadNotifications();
    }

    public function render()
    {
        return view('livewire.navbar', [
            'user' => $this->user,
            'notifications' => $this->notifications,
            'unreadCount' => $this->unreadCount,
        ]);
    }

    public function getNotifications()
    {
        $userId = auth()->id();
        $this->notifications = Notification::where('user_id', $userId)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
    }

    public function countUnreadNotifications()
    {
        return Notification::where('user_id', auth()->id())
                          ->where('is_read', false)
                          ->count();
    }

    public function markNotificationsAsRead()
    {
        $userId = auth()->id();
        Notification::where('user_id', $userId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $this->getNotifications();
        $this->unreadCount = $this->countUnreadNotifications();
    }

    public function toggleDropdownAndMarkAsRead()
    {
        $this->markNotificationsAsRead(); // Mark notifications as read
        $this->dropdownVisible = !$this->dropdownVisible; // Toggle the dropdown visibility
    }
}
