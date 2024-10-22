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
        Schema::create('sales', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->unsignedBigInteger('sale_customer_id')->comment('Customer ID');
            $table->unsignedBigInteger('sale_employee_sale_id')->comment('Sales employee ID');
            $table->unsignedBigInteger('sale_employee_activation_id')->comment('Activation employee ID');
            $table->unsignedBigInteger('sale_trade_id')->comment('Trade ID');
            $table->unsignedBigInteger('sale_product_id')->comment('Product ID');
            $table->unsignedBigInteger('sale_status_sale_id')->comment('Sale status ID');
            $table->timestamp('sale_status_date')->nullable()->comment('Sale status date');
            $table->string('sale_origin')->comment('Sale origin');
            $table->timestamp('sale_origin_date')->nullable()->comment('Sale origin date');
            $table->timestamps();
            $table->softDeletes();

            //Forein keys
            $table->foreign('sale_customer_id')->references('id')->on('customers');
            $table->foreign('sale_employee_sale_id')->references('id')->on('sales');
            $table->foreign('sale_employee_activation_id')->references('id')->on('employees');
            $table->foreign('sale_trade_id')->references('id')->on('trades');
            $table->foreign('sale_product_id')->references('id')->on('products');
            $table->foreign('sale_status_sale_id')->references('id')->on('general_statuses');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
