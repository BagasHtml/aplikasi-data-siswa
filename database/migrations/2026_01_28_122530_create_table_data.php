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
        Schema::create('table_data', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->string('nama', 255);
            $table->string('umur', 255);
            $table->string("alamat", 255);
            $table->string('kelas', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_data');
    }
};
