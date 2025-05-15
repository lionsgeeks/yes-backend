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
        Schema::create('academiques', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('logo_path')->nullable();
            $table->string('type_institution');
            $table->string('pays');
            $table->string('site_web')->nullable();
            $table->string('departement')->nullable();
            $table->string('email');
            $table->string('telephone');
            $table->string('contact_nom')->nullable();
            $table->string('contact_fonction')->nullable();
            $table->string('contact_email')->nullable();
            $table->text('axes_recherche')->nullable();
            $table->text('methodologies')->nullable();
            $table->json('zones_geographiques')->nullable();
            $table->text('programmes_formation')->nullable();
            $table->json('public_cible')->nullable();
            $table->json('modalites')->nullable();
            $table->string('certifications')->nullable();
            $table->text('partenaires_recherche')->nullable();
            $table->json('ressources_disponibles')->nullable();
            $table->text('expertise')->nullable();
            $table->text('opportunites_collaboration')->nullable();
            $table->text('conferences')->nullable();
            $table->text('ateliers')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->string('publications')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academiques');
    }
};
