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
        Schema::create('ac_mainhead', function (Blueprint $table) {
            $table->increments('mainhead_id');
            $table->integer('mainheadcode');
            $table->string('mainheadname');
            $table->integer('controlcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_mainhead');
    }
};
