<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->unsignedBigInteger('rate_product_id')->comment('Product associated with the rate');
            $table->unsignedBigInteger('rate_role_id')->comment('Role associated with the rate');
            $table->unsignedBigInteger('rate_trade_category_id')->comment('');
            $table->unsignedBigInteger('rate_frequency_status_id')->comment('Rate recurrence');
            $table->bigInteger('rate_unit_price')->nullable()->comment('Unit price');
            $table->string('rate_currency', 3)->comment('Currency code in USD or MXN');
            $table->bigInteger('rate_goal')->comment('Sales or performance goal associated with the rate');
            $table->timestamp('rate_effective_date')->nullable()->comment('From when the rate is applicable');
            $table->timestamps();
            $table->softDeletes();

            //foreign keys

            $table->foreign('rate_product_id')->references('id')->on('products');
            $table->foreign('rate_role_id')->references('id')->on('employees_roles');
            $table->foreign('rate_trade_category_id')->references('id')->on('trades_categories');
            $table->foreign('rate_frequency_status_id')->references('id')->on('frequencies');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
