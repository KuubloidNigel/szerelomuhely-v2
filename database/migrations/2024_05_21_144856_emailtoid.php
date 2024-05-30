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
        Schema::table('users', function (Blueprint $table) { 
            $table->dropColumn('email');            // Drop the existing 'email' column
            $table->string('azonosito', 6);         // Add the new 'azonosito' column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('azonosito');        // Drop the 'azonosito' column
            $table->string('email')->unique();      // Restore the 'email' column with unique constraint
        });
    }
};
