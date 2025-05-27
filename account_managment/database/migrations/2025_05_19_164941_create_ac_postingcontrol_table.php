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
        Schema::create('ac_postingcontrol', function (Blueprint $table) {
            $table->id();
            $table->integer('saleshead')->nullable();
            $table->integer('salesreturnhead')->nullable();
            $table->integer('salesdiscounthead')->nullable();
            $table->integer('salescommissionhead')->nullable();
            $table->integer('salescommission_expense')->nullable();
            $table->integer('rmpurchasehead')->nullable();
            $table->integer('rmpurchasereturnhead')->nullable();
            $table->integer('rmpurchasediscounthead')->nullable();
            $table->integer('rminventoryhead')->nullable();
            $table->integer('fgpurchasehead')->nullable();
            $table->integer('fgpurchasereturnhead')->nullable();
            $table->integer('fgpurchasediscounthead')->nullable();
            $table->integer('fginventoryhead')->nullable();
            $table->integer('accountsreceivablehead')->nullable();
            $table->integer('accountspayablehead')->nullable();
            $table->integer('cashaccounthead')->nullable();
            $table->integer('bankaccounthead')->nullable();
            $table->integer('workinprocessinventoryhead')->nullable();
            $table->integer('servicemainhead')->nullable();
            $table->integer('defaultbranch')->nullable();
            $table->integer('cost_of_sales')->nullable();
            $table->integer('advance_to_vendor')->nullable();
            $table->integer('advance_from_customer')->nullable();
            $table->integer('pp_claim_debit_head')->nullable();
            $table->integer('pp_claim_credit_head')->nullable();
            $table->integer('credit_note_debit_head')->nullable();
            $table->integer('credit_note_credit_head')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_postingcontrol');
    }
};
