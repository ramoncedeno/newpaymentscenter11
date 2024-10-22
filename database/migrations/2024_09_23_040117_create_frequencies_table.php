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
        Schema::create('frequencies', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('frequency_name')->comment('Name of the time period: weekly, biweekly, monthly, quarterly, etc.');
            $table->integer('frequency_day')->comment('days elapsed in each period');
            $table->string('frequency_alert_n1')->comment('Increase from lowest to highest. Success,Warning,Danger,Dark');
            $table->string('frequency_alert_n2')->comment('Increase from lowest to highest. Success,Warning,Danger,Dark');
            $table->string('frequency_alert_n3')->comment('Increase from lowest to highest. Success,Warning,Danger,Dark');
            $table->string('frequency_alert_n4')->comment('Increase from lowest to highest. Success,Warning,Danger,Dark');
            $table->string('frequency_description')->comment('Description');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frequencies');
    }
};
