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
        Schema::create('table_login', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->string('email', 40)->unique();
            $table->string('username', 60)->unique();
            $table->string('password', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_login');
    }
};
