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
        Schema::create('ac_chartofacc', function (Blueprint $table) {
            $table->id();
            $table->integer('accountscode');
            $table->integer('companyid')->nullable();
            $table->integer('mainhead_id')->nullable();
            $table->integer('mainheadcode');
            $table->string('accountsheadname');
            $table->string('category');
            $table->decimal('debit')->nullable();
            $table->decimal('credit')->nullable();
            $table->decimal('balance')->nullable();
            $table->smallInteger('obsolete')->nullable();
            $table->decimal('opening_balance_debit')->nullable();
            $table->decimal('opening_balance_credit')->nullable();
            $table->date('opening_date')->nullable();
        });
 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_chartofacc');
    }
};
