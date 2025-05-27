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
        Schema::create('ac_control', function (Blueprint $table) {
            $table->increments('controlcode'); // Auto-increment primary key with custom name
            $table->string('controlname');
            $table->integer('typecode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_control');
    }
};
