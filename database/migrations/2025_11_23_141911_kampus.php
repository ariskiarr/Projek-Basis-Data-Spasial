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
        Schema::create('kampus', function (Blueprint $table) {
            $table->id('id');
            $table->string('alamat')->nullable();

        });

        DB::statement('
        CREATE EXTENSION IF NOT EXISTS postgis');


        DB::statement('
        ALTER TABLE kampus
        ADD COLUMN geom geometry(Point, 4326);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kampus');
    }
};
