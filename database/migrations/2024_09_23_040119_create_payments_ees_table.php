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
        Schema::create('payments_ees', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->unsignedBigInteger('payment_ees_sale_id')->comment('Id assigned to employee sale');
            $table->unsignedBigInteger('payment_ees_cancellation_id')->comment('Id assigned to the employee sale cancellation');
            $table->unsignedBigInteger('payment_ees_rate_id')->comment('Rate id assigned to the product');
            $table->unsignedBigInteger('payment_ees_frequency_id')->comment('Weekly or monthly frequency id');
            $table->string('payment_ees_origin')->comment('Name of the record related to which it belongs');
            $table->timestamp('payment_ees_origin_date')->nullable()->comment('Date related to the origin of the record');
            $table->string('payment_ees_payment_method')->comment('Payment method used (card, transfer)');

            //   Reflection of migration rates
            $table->unsignedBigInteger('payment_ees_status_payed_to_employee')->comment('pending, paid or held payment status');
            $table->unsignedBigInteger('payment_ees_frequency_status_id_employee')->comment('table name frequencies');
            $table->timestamp('payment_ees_effective_date_employee')->nullable()->comment('From when the rate is applicable');
            $table->bigInteger('payment_ees_unit_price_employee')->nullable()->comment('Unit price');
            $table->string('payment_ees_currency_employee', 3)->nullable()->comment('Currency code in USD or MXN');
            $table->bigInteger('payment_ees_goal_employee')->nullable()->comment('Sales or performance goal associated with the rate');
            $table->bigInteger('total_to_pay')->nullable()->comment('total to be paid to the employee');
            $table->timestamps();
            $table->softDeletes();

            //forein keys for employee
            $table->foreign('payment_ees_sale_id')->references('id')->on('sales');
            $table->foreign('payment_ees_cancellation_id')->references('id')->on('cancellations');
            $table->foreign('payment_ees_rate_id')->references('id')->on('rates');
            $table->foreign('payment_ees_frequency_id')->references('id')->on('frequencies');
            $table->foreign('payment_ees_status_payed_to_employee')->references('id')->on('general_statuses');
            $table->foreign('payment_ees_frequency_status_id_employee')->references('id')->on('frequencies');





        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments_ees');
    }
};
