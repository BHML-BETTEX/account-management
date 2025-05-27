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
        Schema::create('ac_transactionmain', function (Blueprint $table) {
            $table->id();
            $table->integer('selfid');
            $table->integer('companyid')->nullable();
            $table->integer('trcode')->nullable();
            $table->unsignedInteger('voucherno')->unique();
            $table->integer('vouchertype')->nullable();
            $table->integer('partycode')->nullable();
            $table->integer('partytype')->nullable();
            $table->string('manualvoucherno')->nullable();
            $table->date('dateoftransaction');
            $table->string('particulars');
            $table->string('loginid')->nullable();
            $table->integer('posted')->nullable();
            $table->string('voucher_file_name')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_transactionmain');
    }
};
