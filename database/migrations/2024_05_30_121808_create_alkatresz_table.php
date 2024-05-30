<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alkatreszs', function (Blueprint $table) {
            $table->id();
            $table->string('nev',100);
            $table->integer('ar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alkatreszs');
    }
};
