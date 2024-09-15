<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->json('approval_dates')->nullable(); // To store an array of approval dates
            $table->json('approval_ids')->nullable();   // To store an array of approval user IDs
        });
    }
    
    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn(['approval_dates', 'approval_ids']);
        });
    }
};
