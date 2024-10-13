<?php

namespace App\Livewire;

use App\Models\Notification;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $user;
    public $notifications = [];
    public $unreadCount = 0; // Define the unreadCount property

    public function mount()
    {
        $this->user = Auth::user();
        $this->getNotifications(); // Fetch notifications during mount
        $this->unreadCount = $this->countUnreadNotifications(); // Set unread count
    }

    public function render()
    {
        return view('livewire.navbar', [
            'user' => $this->user,
            'notifications' => $this->notifications, // Pass notifications to the view
            'unreadCount' => $this->unreadCount, // Pass unread count to the view
        ]);
    }

    public function getNotifications()
    {
        $userId = auth()->id();
        $this->notifications = Notification::where('user_id', $userId)
                                    ->get(); // Get all notifications (including read)
    }

    public function countUnreadNotifications()
    {
        return Notification::where('user_id', auth()->id())
                          ->where('is_read', false)
                          ->count();
    }

    public function markNotificationsAsRead()
    {
        $userId = auth()->user()->id;

        // Mark all notifications for the authenticated user as read
        Notification::where('user_id', $userId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        // Refresh notifications and unread count
        $this->getNotifications(); 
        $this->unreadCount = $this->countUnreadNotifications();
    }

    public function updated($propertyName)
    {
        // This method is called when any property is updated.
        if ($propertyName === 'notifications') {
            $this->markNotificationsAsRead(); // Mark as read if notifications are updated
        }
    }

    public function viewAll()
    {
        $this->markNotificationsAsRead(); // Mark notifications as read when viewing all
    }
}
