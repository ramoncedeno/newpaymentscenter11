<?php

use Egulias\EmailValidator\Parser\Comment;
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
        Schema::create('cancellations', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->unsignedBigInteger('cancellation_sale_id')->comment('Sale ID');
            $table->string('cancellation_employee_cancellation')->comment('Employee who performed the cancellation');
            $table->unsignedBigInteger('cancellation_cancellation_status_id')->comment('Cancellation status ID');
            $table->timestamp('cancellation_cancellation_status_date')->nullable()->comment('Date of cancellation status');
            $table->string('cancellation_cancellation_reason')->comment('Reason for cancellation');
            $table->string('cancellation_origin')->comment('Cancellation origin');
            $table->timestamp('cancellation_origin_date')->nullable()->comment('Cancellation origin date');
            $table->timestamps();
            $table->softDeletes();

            //Forein keys'

            $table->foreign('cancellation_sale_id')->references('id')->on('sales');
            $table->foreign('cancellation_cancellation_status_id')->references('id')->on('general_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancellations');
    }
};
