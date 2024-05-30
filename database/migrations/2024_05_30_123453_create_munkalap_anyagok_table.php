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
        Schema::create('munkalap_anyagoks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('munkalap_id')->constrained('munkalaps')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('anyag_id')->constrained('anyags')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('mennyiseg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('munkalap_anyagoks');
    }
};
