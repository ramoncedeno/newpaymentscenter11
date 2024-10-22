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
        Schema::create('products', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('product_name')->comment('Name assigned to the product');
            $table->string('product_code_id')->comment('Code name assigned to the product');
            $table->decimal('product_pricing', 18, 4)->comment('Product price');
            $table->timestamps();// Add created_at and updated_at
            $table->softDeletes();// Add created_at and updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
