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
        Schema::create('formulaires', function (Blueprint $table) {
            $table->id();
            $table->string('name_organization')->nullable();
            $table->string('name_representative')->nullable();
            $table->string('position_representative')->nullable();
            $table->string('phone_representative')->nullable();
            $table->string('email_representative')->nullable();
            $table->string('linkedin_representative')->nullable();
            $table->string('name_tenderer')->nullable();
            $table->string('position_tenderer')->nullable();
            $table->string('phone_tenderer')->nullable();
            $table->string('email_tenderer')->nullable();
            $table->string('linkedin_tenderer')->nullable();
            $table->string('years_existence')->nullable();
            $table->string('country_registration')->nullable();
            $table->text('legal_statutes')->nullable();
            $table->text('presentation')->nullable();
            $table->text('internal_regulations')->nullable();
            $table->string('num_employees')->nullable();
            $table->string('num_volunteers')->nullable();
            $table->text('beneficiaries')->nullable();
            $table->string('country_intervention')->nullable();
            $table->string('area_intervention')->nullable();
            $table->text('project_description')->nullable();
            $table->text('funding_requirements')->nullable();
            $table->text('approached_funders')->nullable();
            $table->text('neet_project_example')->nullable();
            $table->text('project_reach')->nullable();
            $table->text('project_impact')->nullable();
            $table->string('project_duration')->nullable();
            $table->string('project_area')->nullable();
            $table->text('project_evaluation')->nullable();
            $table->text('other_projects')->nullable();
            $table->text('sources_funding')->nullable();
            $table->text('themes_intervention')->nullable();
            $table->text('intervention_themes')->nullable();
            $table->text('partners')->nullable();
            $table->text('project_financing')->nullable();
            $table->boolean('is_invited')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulaires');
    }
};
