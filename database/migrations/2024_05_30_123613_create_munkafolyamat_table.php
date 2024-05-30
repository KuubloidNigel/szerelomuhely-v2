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
        Schema::create('munkafolyamats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('munkalap_id')->constrained('munkalaps')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('munkafolyamatok_id')->constrained('munkafolyamatoks')->onUpdate('cascade')->onDelete('cascade');
            $table->string('idotartam',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('munkafolyamats');
    }
};
