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
        Schema::create('table_nilai', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->string('nama', 50);
            $table->string('mata_pelajaran', 100);
            $table->integer('nilai');
            $table->float('rata_rata');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_nilai');
    }
};
