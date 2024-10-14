<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToNotificationsTable extends Migration
{
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // User ID
            $table->string('title')->after('user_id'); // Notification title
            $table->text('message')->after('title'); // Notification message
            $table->boolean('is_read')->default(false)->after('message'); // Read status
        });
    }

    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn(['user_id', 'title', 'message', 'is_read']);
        });
    }
}
