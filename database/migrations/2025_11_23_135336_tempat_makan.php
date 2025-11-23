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
        Schema::create('tempat_makan', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama_tempat');
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->string('alamat');
            $table->text('jam_operasional')->nullable();

        });


        DB::statement('
        CREATE EXTENSION IF NOT EXISTS postgis');


        DB::statement('
        ALTER TABLE tempat_makan
        ADD COLUMN geom geometry(Point, 4326);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempat_makan');
    }
};
