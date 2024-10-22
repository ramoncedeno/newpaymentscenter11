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
        Schema::create('general_statuses', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('general_status_name')->comment('Name of the general state');
            $table->boolean('general_status_is_for_employees_table')->comment('Status referring to the employees table');
            $table->boolean('general_status_is_for_customers_table')->comment('Status referring to the customer table');
            $table->boolean('general_status_is_for_sales_table')->comment('Status referring to the sales table');
            $table->boolean('general_status_is_for_cancellations_table')->comment('Status referring to the cancellations table');
            $table->boolean('general_status_is_for_payments_ees')->comment('Status referring to the employees pay table');
            $table->boolean('general_status_is_for_payments_sups_table')->comment('Status referring to the supervisory pay table');
            $table->boolean('general_status_is_for_rate')->comment('Monthly or quarterly frequency');
            $table->text('general_status_description')->comment('Status description');
            $table->timestamps();// Add created_at and updated_at
            $table->softDeletes(); // Add deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_statuses');
    }

};
