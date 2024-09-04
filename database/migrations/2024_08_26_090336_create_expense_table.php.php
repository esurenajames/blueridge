<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expense_table', function (Blueprint $table) {
            $table->id();
            $table->string('object_of_expenditure');
            $table->decimal('proposed_budget', 15, 2);
            $table->decimal('current_expenses', 15, 2)->default(0);
            $table->decimal('ytd', 15, 2)->default(0);
            $table->decimal('balance', 15, 2)->default(0);

            // Monthly expenses
            $table->decimal('jan', 15, 2)->default(0);
            $table->decimal('feb', 15, 2)->default(0);
            $table->decimal('mar', 15, 2)->default(0);
            $table->decimal('apr', 15, 2)->default(0);
            $table->decimal('may', 15, 2)->default(0);
            $table->decimal('jun', 15, 2)->default(0);
            $table->decimal('jul', 15, 2)->default(0);
            $table->decimal('aug', 15, 2)->default(0);
            $table->decimal('sept', 15, 2)->default(0);
            $table->decimal('oct', 15, 2)->default(0);
            $table->decimal('nov', 15, 2)->default(0);
            $table->decimal('dec', 15, 2)->default(0);
            
            // Adding section_id column
            $table->unsignedTinyInteger('section_id');
            
            $table->timestamps();
        });

        // Add the check constraint using a raw SQL statement
        DB::statement("ALTER TABLE expense_table ADD CONSTRAINT check_section_id CHECK (section_id IN (1, 2, 3))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_table');
    }
};
