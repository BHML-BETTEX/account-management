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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->integer('other_id')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('address')->nullable();
            $table->string('district')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('state')->nullable();
            $table->integer('region_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();

            // Contact person info
            $table->string('contract_person_name')->nullable();
            $table->string('contract_person_designation')->nullable();
            $table->string('contact_person_photo')->nullable();
            $table->string('mobile')->nullable();
            $table->string('customer_code')->nullable();
            $table->string('email')->nullable();
            $table->string('note')->nullable();
            $table->string('obsolete')->nullable();

            // Addresses
            $table->string('billing_address')->nullable();
            $table->string('delevery_address')->nullable();

            // More contact details
            $table->string('contract_person_phone')->nullable();
            $table->string('contract_person_mobile')->nullable();
            $table->string('contract_person_email')->nullable();

            // Employee and sales info
            $table->string('employee_id')->nullable();
            $table->string('ic_no')->nullable();
            $table->integer('salesman_id')->nullable();
            $table->integer('virtual_id')->nullable();
            $table->string('salesman_incharge_1')->nullable();
            $table->string('salesman_incharge_2')->nullable();
            $table->string('paycommissionfor_1')->nullable();

            // Customer metadata
            $table->string('certificate_text')->nullable();
            $table->string('current_status')->nullable();
            $table->integer('customer_type_ci')->nullable();
            $table->integer('customer_type_celcom')->nullable();
            $table->integer('my_reseller_id')->nullable();
            $table->string('territory_name')->nullable();
            $table->integer('price_group_name')->nullable();

            // Financial fields (consider changing to decimal if needed)
            $table->string('opening_balance')->nullable();
            $table->string('propritor_nid')->nullable();
            $table->string('trade_licence')->nullable(); // removed duplicate
            $table->string('security_deposite_amount')->nullable();

            // Multiple contact persons
            $table->string('contract_person_name_1')->nullable();
            $table->string('contract_person_name_2')->nullable();
            $table->string('contract_person_mobile_1')->nullable();
            $table->string('contract_person_mobile_2')->nullable();
            $table->string('contract_person_phone_1')->nullable();
            $table->string('contract_person_phone_2')->nullable();
            $table->string('contract_person_designation_1')->nullable();
            $table->string('contract_person_designation_2')->nullable();

            // Bank info
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('bank_address')->nullable();

            // Document uploads
            $table->string('doc_propitor_nid')->nullable();
            $table->string('doc_agrement_copy')->nullable();
            $table->string('doc_trade_copy')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
