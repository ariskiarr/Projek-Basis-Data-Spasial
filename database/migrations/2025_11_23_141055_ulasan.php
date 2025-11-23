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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('tempat_id')->constrained('tempat_makan');
            $table->string('sumber')->nullable();
            $table->string('penulis')->nullable();
            $table->text('ulasan')->nullable();
            $table->decimal('rating',3,2)->nullable();
            $table->timestamp('tanggal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
