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
        Schema::create('publiques', function (Blueprint $table) {
            $table->id();
            $table->string('institution_name')->nullable();
            $table->string('institution_type')->nullable();
            $table->string('country')->nullable();
            $table->string('website')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->string('youth_contact_name')->nullable();
            $table->string('youth_contact_position')->nullable();
            $table->string('youth_contact_email')->nullable();
            $table->text('policy_framework')->nullable();
            $table->text('strategic_priorities')->nullable();
            $table->decimal('annual_budget', 15, 2)->nullable();
            $table->text('flagship_program')->nullable();
            $table->text('target_audience')->nullable();
            $table->text('support_mechanisms')->nullable();
            $table->text('expected_result_1')->nullable();
            $table->text('expected_result_2')->nullable();
            $table->text('expected_result_3')->nullable();
            $table->text('execution_partners')->nullable();
            $table->text('coordination_mechanism')->nullable();
            $table->text('involved_actors')->nullable();
            $table->text('monitoring_approach')->nullable();
            $table->text('technical_assistance')->nullable();
            $table->text('best_practices')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->text('cooperation_opportunities')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publiques');
    }
};
