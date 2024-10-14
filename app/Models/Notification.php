<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint; // Add this line for Blueprint
use Illuminate\Support\Facades\Schema;  // Add this line for Schema

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',     // Add user_id here
        'title',
        'message',
        'is_read',
    ];

    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // User to notify
            $table->unsignedBigInteger('request_id'); // Request related to the notification
            $table->string('message'); // Notification message
            $table->boolean('is_read')->default(false); // Mark if notification is read
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
        });
    }

    private function createNotifications($requestData)
    {
        // Get requestor ID and collaborators
        $userIds = [$requestData->requestor_id]; // Start with the requestor ID
        if ($requestData->collaborators) {
            $collaborators = json_decode($requestData->collaborators, true);
            $userIds = array_merge($userIds, $collaborators); // Merge with collaborators
        }

        // Notification message
        $message = 'Your request "' . $requestData->request_name . '" has been approved.';

        // Create notifications for each user
        foreach ($userIds as $userId) {
            Notification::create([
                'user_id' => $userId,
                'title' => 'Request Approved',
                'message' => $message,
                'is_read' => false,
            ]);
        }
    }
}
