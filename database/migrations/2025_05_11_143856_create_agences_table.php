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
        Schema::create('agences', function (Blueprint $table) {
                $table->id();
                $table->string('nom')->nullable();
                $table->string('logo')->nullable();
                $table->string('type_organisation')->nullable();
                $table->string('pays_representes')->nullable();
                $table->string('couverture_afrique')->nullable();
                $table->string('site_web')->nullable();
                $table->string('email_institutionnel');
                $table->text('bureaux_afrique')->nullable();
                $table->string('contact_jeunesse')->nullable();
                $table->string('cadre_strategique')->nullable();
                $table->text('priorites_thematiques')->nullable();
                $table->decimal('budget', 15, 2)->nullable();
                $table->integer('annee_debut')->nullable();
                $table->integer('annee_fin')->nullable();
                $table->string('programmes_phares')->nullable();
                $table->string('outils_methodologiques')->nullable();
                $table->text('opportunites_financement')->nullable();
                $table->string('type_partenaires')->nullable();
                $table->text('mecanismes_collaboration')->nullable();
                $table->text('domaines_expertise')->nullable();
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
        Schema::dropIfExists('agences');
    }
};
