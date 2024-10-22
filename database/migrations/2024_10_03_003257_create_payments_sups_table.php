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
        Schema::create('payments_sups', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->unsignedBigInteger('payment_sups_sale_id')->comment('id assigned to the sale');
            $table->unsignedBigInteger('payment_sups_cancellation_id')->comment('id assigned to the cancellation');
            $table->unsignedBigInteger('payment_sups_rate_id')->comment('id assigned to the product rate');
            $table->unsignedBigInteger('payment_sups_frequency_id')->comment('Weekly or monthly frequency id');
            $table->string('payment_sups_origin')->comment('Name of the record related to which it belongs');
            $table->timestamp('payment_sups_origin_date')->nullable()->comment('Date related to the origin of the record');
            $table->string('payment_sups_payment_method')->comment('payment method used (card, transfer)');


            // attributes related to the type of employee
            $table->unsignedBigInteger('payment_sups_payed_status_id')->comment('pending, paid or held payment status');
            $table->unsignedBigInteger('payment_sups_frequency_status_id')->comment('table name frequencies');
            $table->timestamp('payment_sups_effective_date')->nullable()->comment('From when the rate is applicable');
            $table->bigInteger('payment_sups_unit_price')->nullable()->comment('Unit price');
            $table->string('payment_sups_currency', 3)->nullable()->comment('Currency code in USD or MXN');
            $table->bigInteger('payment_sups_goal')->nullable()->comment('Sales or performance goal associated with the rate');
            $table->bigInteger('total_to_pay')->nullable()->comment('total to be paid to the employee');
            $table->timestamps();
            $table->softDeletes();


            //forein keys for supervisor
            $table->foreign('payment_sups_sale_id')->references('id')->on('sales');
            $table->foreign('payment_sups_cancellation_id')->references('id')->on('cancellations');
            $table->foreign('payment_sups_rate_id')->references('id')->on('rates');
            $table->foreign('payment_sups_frequency_id')->references('id')->on('frequencies');
            $table->foreign('payment_sups_payed_status_id')->references('id')->on('general_statuses');
            $table->foreign('payment_sups_frequency_status_id')->references('id')->on('frequencies');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments_sups');
    }
};
