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
        Schema::create('ac_transactiondetail', function (Blueprint $table) {
            $table->id();
            $table->integer('trandetailid');
            $table->unsignedInteger('voucherno')->index();
            $table->integer('accountscode');
            $table->decimal('debit')->default(0);
            $table->decimal('credit')->default(0);
            $table->string('typeofcheq')->nullable();
            $table->date('dateofmaturity')->nullable();
            $table->date('dateofissue')->nullable();
            $table->string('bankname')->nullable();
            $table->string('naration')->nullable();
            $table->integer('cost_center_id')->nullable();
            $table->integer('emp_id')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('entry_type')->nullable();
            $table->timestamps();

            $table->foreign('voucherno')->references('voucherno')->on('ac_transactionmain')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_transactiondetail');
    }
};
