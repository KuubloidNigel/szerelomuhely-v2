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
        Schema::create('gepjarmus', function (Blueprint $table) {
            $table->string('rendszam',7)->primary();
            $table->string('gyartmany', 30);
            $table->string('tipus', 30);
            $table->foreignId('tulaj_id')->constrained('tulajdonos')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gepjarmus');
    }
};
