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
        Schema::create('table_absensi', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->string('nama', 50);
            $table->string('kelas', 40);
            $table->time('waktu_kehadiran');
            $table->date('tanggal_kehadiran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_absensi');
    }
};
