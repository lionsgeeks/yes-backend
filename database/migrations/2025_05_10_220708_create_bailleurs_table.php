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
        Schema::create('bailleurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('logo_path')->nullable();
            $table->string('type_institution');
            $table->string('pays_origine');
            $table->string('couverture_geographique');
            $table->string('site_web')->nullable();
            $table->boolean('twitter')->default(false);
            $table->boolean('linkedin')->default(false);
            $table->string('twitter_url2')->nullable();
            $table->string('linkedin_url2')->nullable();
            $table->string('email_contact');
            $table->string('telephone');
            $table->string('representation_afrique')->nullable();
            $table->string('contact_responsable');
            $table->text('priorites_thematiques');
            $table->string('modalites_soutien');
            $table->decimal('financement_min')->nullable();
            $table->decimal('financement_max')->nullable();
            $table->decimal('budget_annuel')->nullable();
            $table->text('criteres_eligibilite');
            $table->string('projets_phares');
            $table->text('approche_impact');
            $table->text('partenaires_actuels');
            $table->text('procedure_soumission');
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bailleurs');
    }
};
