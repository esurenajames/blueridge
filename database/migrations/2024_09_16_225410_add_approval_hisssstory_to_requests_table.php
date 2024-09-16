<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->json('approval_dates')->nullable(); // To store an array of approval dates
            $table->json('approval_ids')->nullable();   // To store an array of approval user IDs
            $table->json('approval_status')->nullable(); // Add this line to add the approval_status column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn(['approval_dates', 'approval_ids', 'approval_status']);
        });
    }
};
